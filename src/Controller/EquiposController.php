<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Equipos Controller
 *
 * @property \App\Model\Table\EquiposTable $Equipos
 *
 * @method \App\Model\Entity\Equipo[] paginate($object = null, array $settings = [])
 */
class EquiposController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
        ];
        $equipos = $this->paginate($this->Equipos);

        $this->set(compact('equipos'));
        $this->set('_serialize', ['equipos']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
        ]);

        $this->set('equipo', $equipo);
        $this->set('_serialize', ['equipo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipo = $this->Equipos->newEntity();
        if ($this->request->is('post')) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            $equipo->activo = 1;

            if ($this->Equipos->save($equipo)) {
                $this->Flash->success('Los datos del equipo, ha sido registrado');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo registrar el equipo, por favor intentelo de nuevo');
        }
        $tipos = $this->Equipos->Tipos->find('list', ['keyField' => 'id', 'valueField' => 'nombre' ,'limit' => 200]);
        $modelos = $this->Equipos->Modelos->find('list', ['keyField' => 'id', 'valueField' => 'nombre' ,'limit' => 200]);
        $marcas = $this->Equipos->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nombre' ,'limit' => 200]);
        $users = $this->Equipos->Users->find('list', ['limit' => 200]);
        $this->set(compact('equipo', 'tipos', 'modelos', 'marcas', 'users'));
        $this->set('_serialize', ['equipo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success('Se han guardado los cambios en el equipo');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar los cambios en el equipo');
        }
        /*$tipos = $this->Equipos->Tipos->find('list', ['id' => 'nombretipos','limit' => 200])
                                        ->where(['activo' => 1]);
        $modelos = $this->Equipos->Modelos->find('list', ['limit' => 200]);
        $marcas = $this->Equipos->Marcas->find('list', ['limit' => 200]);*/
         $tipos = $this->Equipos->Tipos->find('list', ['keyField' => 'id', 'valueField' => 'nombre' ,'limit' => 200]);
        $modelos = $this->Equipos->Modelos->find('list', ['keyField' => 'id', 'valueField' => 'nombre' ,'limit' => 200]);
        $marcas = $this->Equipos->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nombre' ,'limit' => 200]);
        $users = $this->Equipos->Users->find('list', ['limit' => 200]);
        $this->set(compact('equipo', 'tipos', 'modelos', 'marcas', 'users'));
        $this->set('_serialize', ['equipo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $equipo = $this->Equipos->get($id);
        if($this->request->is(['patch','post','put']))
        {
            $equipo = $this->Equipos->patchEntity($equipo,$this->request->data);
            $equipo->activo=0;

            if($this->Equipos->save($equipo))
            {
                $this->Flash->success("El equipo ha sido eliminado");
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El equipo no pudo ser eleminado. Por favor intentelo de nuevo');
            }
        }
        $this->set(compact('equipo'));
    }

    public function search()
    {
        if($this->request->is('post'))
        {   

            $tipo = $this->request->data['tipo'];

            if($tipo == 0) //buscar por tipo
            {    
                        $valor = $this->request->data['dato'];
            
                        ///$this->Flash->success('el valor buscado es '.$valor);
            
                        $query = $this->Equipos->find('all')
                            ->where(['tipos.nombre like' => '%'.$valor.'%'])
                            ->andWhere(['equipos.activo' => 1]);
            
                        $this->paginate = [
                        'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
                        ];
                        
                        $equipo = $this->paginate($query,['limit' => 10 ]);
                        $this->set('equipo',$equipo);
            }

            if($tipo == 1) // buscar por modelo
            {    
                        $valor = $this->request->data['dato'];
            
                        ///$this->Flash->success('el valor buscado es '.$valor);
            
                        $query = $this->Equipos->find('all')
                            ->where(['modelos.nombre like' => '%'.$valor.'%'])
                            ->andWhere(['equipos.activo' => 1]);
            
                        $this->paginate = [
                        'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
                        ];
                        
                        $equipo = $this->paginate($query,['limit' => 10 ]);
                        $this->set('equipo',$equipo);
            }

            if($tipo == 2) //buscar por marca
            {    
                        $valor = $this->request->data['dato'];
            
                        ///$this->Flash->success('el valor buscado es '.$valor);
            
                        $query = $this->Equipos->find('all')
                            ->where(['marcas.nombre like' => '%'.$valor.'%'])
                            ->andWhere(['equipos.activo' => 1]);
            
                        $this->paginate = [
                        'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
                        ];
                        
                        $equipo = $this->paginate($query,['limit' => 10 ]);
                        $this->set('equipo',$equipo);
            }

            if($tipo == 3) // buscar por serie o tag
            {    
                        $valor = $this->request->data['dato'];
            
                        ///$this->Flash->success('el valor buscado es '.$valor);
            
                        $query = $this->Equipos->find('all')
                            ->where(['equipos.serie like' => '%'.$valor.'%'])
                            ->andWhere(['equipos.activo' => 1]);
            
                        $this->paginate = [
                        'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
                        ];
                        
                        $equipo = $this->paginate($query,['limit' => 10 ]);
                        $this->set('equipo',$equipo);
            }               
        }
        else
        {

            $this->paginate = [
            'contain' => ['Tipos', 'Modelos', 'Marcas', 'Users']
            ];
            
            $query = $this->Equipos->find('all')
                    ->where(['equipos.activo' => 1]);

            $equipo = $this->paginate($query,['limit' => 10 ]);
            $this->set(compact('equipo',$equipo));
        }
    }
}
