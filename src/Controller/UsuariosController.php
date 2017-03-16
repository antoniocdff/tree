<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [ ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $usuarios = $this->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'usuarios'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $usuario = $this->Usuarios->patchEntity($usuario, $data);
            if ($this->Usuarios->save($usuario)) {

                if (is_uploaded_file($data['image']['tmp_name']))
                {
                    move_uploaded_file(
                        $this->request->data['image']['tmp_name'],
                        WWW_ROOT + '/Usuarios/'. $this->request->data['image']['name']
                    );

                    $imagem = TableRegistry::get('Images');
                    $avatar = $imagem->newEntity();
                    $avatar->field_index = 0;
                    $avatar->model = "Usuarios";
                    $avatar->foreing_key = $usuario->id;
                    $avatar->field = "image";
                    $avatar->filename = $data['image']['name'];
                    $avatar->size = $data['image']['size'];
                    $avatar->mime = $data['image']['type'];
                    if ($imagem->save($avatar)) {
                        $this->Flash->success(__('The usuario has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The user\'s avatar could not be saved. Please, try again.'));
                    }
                }
                
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $usuarios = $this->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'usuarios'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * View tree method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function tree($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Paifilhos', 'Maefilhos', 'Albuns', 'Musicas']
        ]);

        if($usuario->pai_id) {
            $usuario->pai = $this->Usuarios->get($usuario->pai_id);
        }
        if($usuario->mae_id) {
            $usuario->mae = $this->Usuarios->get($usuario->mae_id);
        }
        if($usuario->conjuge_id) {
            $usuario->conjuge = $this->Usuarios->get($usuario->conjuge_id);
        }

        $filhos = [];
        foreach ($usuario->paifilhos as $filho) {
           array_push($filhos, $filho);
        }

        foreach ($usuario->maefilhos as $filho) {
            array_push($filhos, $filho);
        }

        $this->set(compact('usuario'));
        $this->set(compact('filhos'));
        $this->set('_serialize', ['usuario', 'filhos']);
    }
}
