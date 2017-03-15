<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Albuns Controller
 *
 * @property \App\Model\Table\AlbunsTable $Albuns
 */
class AlbunsController extends AppController
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
        $albuns = $this->paginate($this->Albuns);

        $this->set(compact('albuns'));
        $this->set('_serialize', ['albuns']);
    }

    /**
     * View method
     *
     * @param string|null $id Albun id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $albun = $this->Albuns->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('albun', $albun);
        $this->set('_serialize', ['albun']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $albun = $this->Albuns->newEntity();
        if ($this->request->is('post')) {
            $albun = $this->Albuns->patchEntity($albun, $this->request->getData());
            if ($this->Albuns->save($albun)) {
                $this->Flash->success(__('The albun has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The albun could not be saved. Please, try again.'));
        }
        $usuarios = $this->Albuns->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('albun', 'usuarios'));
        $this->set('_serialize', ['albun']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Albun id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $albun = $this->Albuns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $albun = $this->Albuns->patchEntity($albun, $this->request->getData());
            if ($this->Albuns->save($albun)) {
                $this->Flash->success(__('The albun has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The albun could not be saved. Please, try again.'));
        }
        $usuarios = $this->Albuns->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('albun', 'usuarios'));
        $this->set('_serialize', ['albun']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Albun id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $albun = $this->Albuns->get($id);
        if ($this->Albuns->delete($albun)) {
            $this->Flash->success(__('The albun has been deleted.'));
        } else {
            $this->Flash->error(__('The albun could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
