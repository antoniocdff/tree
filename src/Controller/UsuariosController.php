<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;
use Cake\Event\Event;
/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'tree']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') == 'tree') {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete', 'view'])) {
            $userId = (int)$this->request->getParam('pass.0');
            if ($userId == $user['id']) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index()
    {
        $this->paginate = [ ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

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
            $filho = $this->Usuarios->get($filho->id);
           array_push($filhos, $filho);
        }

        foreach ($usuario->maefilhos as $filho) {
            $filho = $this->Usuarios->get($filho->id);
            array_push($filhos, $filho);
        }

        $this->set(compact('usuario'));
        $this->set(compact('filhos'));
        $this->set('_serialize', ['usuario', 'filhos']);
    }

    public function login()
    {
        if($this->Auth->user()) {
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('post')) {
            if (Validation::email($this->request->data['username'])) {
                $this->request->data['email'] = $this->request->data['username'];
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
            }
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
