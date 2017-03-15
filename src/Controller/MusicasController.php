<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Musicas Controller
 *
 * @property \App\Model\Table\MusicasTable $Musicas
 */
class MusicasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $musicas = $this->paginate($this->Musicas);

        $this->set(compact('musicas'));
        $this->set('_serialize', ['musicas']);
    }

    /**
     * View method
     *
     * @param string|null $id Musica id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $musica = $this->Musicas->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('musica', $musica);
        $this->set('_serialize', ['musica']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $musica = $this->Musicas->newEntity();
        if ($this->request->is('post')) {
            $musica = $this->Musicas->patchEntity($musica, $this->request->getData());
            if ($this->Musicas->save($musica)) {
                $this->Flash->success(__('The musica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The musica could not be saved. Please, try again.'));
        }
        $usuarios = $this->Musicas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('musica', 'usuarios'));
        $this->set('_serialize', ['musica']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Musica id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $musica = $this->Musicas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $musica = $this->Musicas->patchEntity($musica, $this->request->getData());
            if ($this->Musicas->save($musica)) {
                $this->Flash->success(__('The musica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The musica could not be saved. Please, try again.'));
        }
        $usuarios = $this->Musicas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('musica', 'usuarios'));
        $this->set('_serialize', ['musica']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Musica id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $musica = $this->Musicas->get($id);
        if ($this->Musicas->delete($musica)) {
            $this->Flash->success(__('The musica has been deleted.'));
        } else {
            $this->Flash->error(__('The musica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
