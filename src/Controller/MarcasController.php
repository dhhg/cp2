<?php
namespace App\Controller; 

use App\Controller\AppController;

/**
 * Marcas Controller
 *
 * @property \App\Model\Table\MarcasTable $Marcas
 *
 * @method \App\Model\Entity\Marca[] paginate($object = null, array $settings = [])
 */
class MarcasController extends AppController
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
        //$marcas = $this->paginate($this->Marcas);

        $query = $this->Marcas->find('all')->where(['marcas.activo' => 1]);
        $marcas = $this->paginate($query);

        $this->set(compact('marcas'));
        //$this->set('_serialize', ['marcas']);
    }

    /**
     * View method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marca = $this->Marcas->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('marca', $marca);
        $this->set('_serialize', ['marca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marca = $this->Marcas->newEntity();
        if ($this->request->is('post')) 
        {
            $marca = $this->Marcas->patchEntity($marca, $this->request->getData());
            $marca->activo = 1;
            if ($this->Marcas->save($marca)) {
                $this->Flash->success('Se ha grabado el marca');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo grabar el marca, intentelo de nuevo por favor');
        }
        $this->set(compact('marca', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marca = $this->Marcas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marca = $this->Marcas->patchEntity($marca, $this->request->getData());
            if ($this->Marcas->save($marca)) {
                $this->Flash->success('Los cambios se han grabado');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo grabar los cambios, intentelo de nuevo');
        }
        $users = $this->Marcas->Users->find('list', ['limit' => 200]);
        $this->set(compact('marca', 'users'));
        $this->set('_serialize', ['marca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $marca = $this->Marcas->get($id);
        if($this->request->is(['patch','post','put']))
        {
            $marca = $this->Marcas->patchEntity($marca,$this->request->data);
            $marca->activo=0;

            if($this->Marcas->save($marca))
            {
                $this->Flash->success("El marca ha sido eliminado");
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El marca no pudo ser eleminado. Por favor intentelo de nuevo');
            }
        }
        $this->set(compact('marca'));
    }
}
