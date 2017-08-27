<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tipos Controller
 *
 * @property \App\Model\Table\TiposTable $Tipos
 *
 * @method \App\Model\Entity\Tipo[] paginate($object = null, array $settings = [])
 */
class TiposController extends AppController
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
        
        $query = $this->Tipos->find('all')->where(['tipos.activo' => 1]);
        $tipos = $this->paginate($query); //$this->Tipos

        $this->set(compact('tipos'));
        //$this->set('_serialize', ['tipos']);

        /*$query = $this->Tipos->find('all')->where(['tipos.activo' => 1]);
        $tipo = $this->paginate($query,['limit' => 10 ]);
        $this->set('tipo', $tipo);*/

    }

    /**
     * View method
     *
     * @param string|null $id Tipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipo = $this->Tipos->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('tipo', $tipo);
        $this->set('_serialize', ['tipo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipo = $this->Tipos->newEntity();
        if ($this->request->is('post')) 
        {
            $tipo = $this->Tipos->patchEntity($tipo, $this->request->getData());
            $tipo->activo = 1;
            if ($this->Tipos->save($tipo)) {
                $this->Flash->success('Se ha grabado el tipo');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo grabar el tipo, intentelo de nuevo por favor');
        }
        $this->set(compact('tipo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipo = $this->Tipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipo = $this->Tipos->patchEntity($tipo, $this->request->getData());
            if ($this->Tipos->save($tipo)) {
                $this->Flash->success('Los cambios se han grabado');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo grabar los cambios, intentelo de nuevo');
        }
        $users = $this->Tipos->Users->find('list', ['limit' => 200]);
        $this->set(compact('tipo', 'users'));
        $this->set('_serialize', ['tipo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $tipo = $this->Tipos->get($id);
        if($this->request->is(['patch','post','put']))
        {
            $tipo = $this->Tipos->patchEntity($tipo,$this->request->data);
            $tipo->activo=0;

            if($this->Tipos->save($tipo))
            {
                $this->Flash->success("El tipo ha sido eliminado");
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El tipo no pudo ser eleminado. Por favor intentelo de nuevo');
            }
        }
        $this->set(compact('tipo'));
    }

    public function search()
    {
        if($this->request->is('post'))
        {   
                
            $valor = $this->request->data['dato'];

            ///$this->Flash->success('el valor buscado es '.$valor);

            $query = $this->Tipos->find('all')
                ->where(['tipos.nombre like' => '%'.$valor.'%'])
                ->andWhere(['tipos.activo' => 1]);

            $this->paginate = [
            'contain' => ['Users']
            ];
            
            $tipo = $this->paginate($query,['limit' => 10 ]);
            $this->set('tipo',$tipo);
                
        }
        else
        {

            $this->paginate = [
            'contain' => ['Users']
            ];
            
            $query = $this->Tipos->find('all')
                    ->where(['tipos.activo' => 1]);

            $tipo = $this->paginate($query,['limit' => 10 ]);
            $this->set(compact('tipo',$tipo));
        }
    }
}
