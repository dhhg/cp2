<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[] paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];

        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('cliente', $cliente);
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();

        if ($this->request->is('post')) 
        {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            $cliente->activo=1;
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success('Se ha guardado los datos del cliente');

                return $this->redirect(['controller' => 'Domicilios','action' => 'add/'.$cliente->id]);
            }
            $this->Flash->error('No se ha guardado los datos del cliente');
        }
        $this->set(compact('cliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Clentes->get($id);
        if($this->request->is(['patch','post','put']))
        {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            $cliente->activo=0;

            if($this->Clientes->save($cliente))
            {
                $this->Flash->success("El cliente ha sido eliminado");
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El cliente no pudo ser eleminado. Por favor intentelo de nuevo');
            }
        }
        $this->set(compact('cliente'));
    }
}
