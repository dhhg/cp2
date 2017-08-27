<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 *
 * @method \App\Model\Entity\Modelo[] paginate($object = null, array $settings = [])
 */
class ModelosController extends AppController
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

        $query = $this->Modelos->find('all')->where(['modelos.activo' => 1]);
        $modelos = $this->paginate($query); //$this->modelos

        $this->set(compact('modelos'));

        $modelos = $this->paginate($this->Modelos);

        $this->set(compact('modelos'));
    }

    /**
     * View method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('modelo', $modelo);
        $this->set('_serialize', ['modelo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelo = $this->Modelos->newEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            $modelo->activo = 1;
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success('Se ha grabado el modelo');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo grabar el modelo, por favor intentelo nuevamente');
        }
        $users = $this->Modelos->Users->find('list', ['limit' => 200]);
        $this->set(compact('modelo', 'users'));
        $this->set('_serialize', ['modelo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success('Se han guardado los cambios en el modelo');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar los cambios en el modelo, por favor intentalo nuevamente');
        }
        $users = $this->Modelos->Users->find('list', ['limit' => 200]);
        $this->set(compact('modelo', 'users'));
        $this->set('_serialize', ['modelo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $modelo = $this->Modelos->get($id);
        if($this->request->is(['patch','post','put']))
        {
            $modelo = $this->Modelos->patchEntity($modelo,$this->request->data);
            $modelo->activo=0;

            if($this->Modelos->save($modelo))
            {
                $this->Flash->success("El modelo ha sido eliminado");
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El modelo no pudo ser eleminado. Por favor intentelo de nuevo');
            }
        }
        $this->set(compact('modelo'));
    }

    public function search()
    {
        if($this->request->is('post'))
        {   
                
            $valor = $this->request->data['dato'];

            ///$this->Flash->success('el valor buscado es '.$valor);

            $query = $this->Modelos->find('all')
                ->where(['modelos.nombre like' => '%'.$valor.'%'])
                ->andWhere(['modelos.activo' => 1]);

            $this->paginate = [
            'contain' => ['Users']
            ];
            
            $modelo = $this->paginate($query,['limit' => 10 ]);
            $this->set('modelo',$modelo);
                
        }
        else
        {

            $this->paginate = [
            'contain' => ['Users']
            ];
            
            $query = $this->Modelos->find('all')
                    ->where(['modelos.activo' => 1]);

            $modelo = $this->paginate($query,['limit' => 10 ]);
            $this->set(compact('modelo',$modelo));
        }
    }
}
