<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Domicilios Controller
 *
 * @property \App\Model\Table\DomiciliosTable $Domicilios
 *
 * @method \App\Model\Entity\Domicilio[] paginate($object = null, array $settings = [])
 */
class DomiciliosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Users']
        ];

        $domicilios = $this->paginate($this->Domicilios);
                           //->where('clientes.activo' => 1);

        $this->set(compact('domicilios'));
        //$this->set('_serialize', ['domicilios']);
    }

    /**
     * View method
     *
     * @param string|null $id Domicilio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $domicilio = $this->Domicilios->get($id, [
            'contain' => ['Clientes', 'Users']
        ]);

        $this->set('domicilio', $domicilio);
        $this->set('_serialize', ['domicilio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $domicilio = $this->Domicilios->newEntity();
        if ($this->request->is('post')) {
            $domicilio = $this->Domicilios->patchEntity($domicilio, $this->request->getData());
            if ($this->Domicilios->save($domicilio)) {
                $this->Flash->success(__('The domicilio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domicilio could not be saved. Please, try again.'));
        }


        $clientes = $this->Domicilios->Clientes->find('list', ['keyField' => 'id', 'valueField' => 'nombre' , 'limit' => 200]);
        $users = $this->Domicilios->Users->find('list', ['limit' => 200]);
        $this->set(compact('domicilio', 'clientes', 'users'));
        $this->set('_serialize', ['domicilio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Domicilio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $domicilio = $this->Domicilios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $domicilio = $this->Domicilios->patchEntity($domicilio, $this->request->getData());
            if ($this->Domicilios->save($domicilio)) {
                $this->Flash->success(__('The domicilio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domicilio could not be saved. Please, try again.'));
        }
        $clientes = $this->Domicilios->Clientes->find('list', ['limit' => 200]);
        $users = $this->Domicilios->Users->find('list', ['limit' => 200]);
        $this->set(compact('domicilio', 'clientes', 'users'));
        $this->set('_serialize', ['domicilio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Domicilio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $domicilio = $this->Domicilios->get($id);
        if ($this->Domicilios->delete($domicilio)) {
            $this->Flash->success(__('The domicilio has been deleted.'));
        } else {
            $this->Flash->error(__('The domicilio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
