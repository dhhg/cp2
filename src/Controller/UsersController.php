<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['home']);
	}


	public function isAuthorized($user)
	{
		if(isset($user['role']) and $user['role'] === 'user')
		{
			if(in_array($this->request->action,['home', 'index', 'add', 'view', 'edit', 'delete', 'search', 'logout']))
			{
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

	public function login()
	{
		if($this->request->is('post'))
		{
			$user = $this->Auth->identify();

			if($user)
			{
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Flash->error('Los datos son invalidos, por favor intentelo nuevamente',['key' => 'auth']);
			}

			if($this->Auth->user())
			{
				return $this->redirect((['controller' => 'Users', 'action' => 'home']));
			}
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	
	public function home()
	{
		$this->render();
	}

	public function index()
	{

		$query = $this->Users->find('all')->where(['activo' => 1]);
		$user = $this->paginate($query,['limit' => 10 ]);
		//$users = $this->paginate($this->Users,['limit' => 10 ]);
		$this->set('user',$user);

	}

	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user',$user);
	}

	public function add()
	{
		$user = $this->Users->newEntity();

		if($this->request->is('post'))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);

			$user->activo=1;


			if($this->Users->save($user))
			{
				$this->Flash->success('El usuario ha sido creado correctamente');
				return $this->redirect(['controller'=> 'Users', 'action' => 'view', $user->id]);
			}
			else
			{
				$this->Flash->error('No se puede crear el usuario. Por favor intente de nuevo');
			}

		}

		$this->set(compact('user'));
	}

	public function edit($id)
	{
		$user = $this->Users->get($id);

		if($this->request->is(['patch','post','put']))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);
					

			if($this->Users->save($user))
			{
				$this->Flash->success("El usuario ha sido modificado");
				return $this->redirect(['controller'=> 'Users', 'action' => 'view', $user->id]);
			}
			else
			{
				$this->Flash->error('El usuario no pudo ser actualizado. Por favor intentelo de nuevo');
			}
		}

		$this->set(compact('user'));
	}

	public function delete($id)
	{
		$user = $this->Users->get($id);
		if($this->request->is(['patch','post','put']))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);
			$user->activo=0;

			if($this->Users->save($user))
			{
				$this->Flash->success("El usuario ha sido eliminado");
				return $this->redirect(['action' => 'index']);
			}
			else
			{
				$this->Flash->error('El usuario no pudo ser eleminado. Por favor intentelo de nuevo');
			}
		}
		$this->set(compact('user'));
	}

	public function search()
	{
		//$this->autoRender = false;
		if($this->request->is('post'))
		{	
				
			$valor = $this->request->data['dato'];

			///$this->Flash->success('el valor buscado es '.$valor);

			$query = $this->Users->find('all')
				->where(['nombre like' => '%'.$valor.'%'])
				->orWhere(['appaterno like' => '%'.$valor.'%'])
				->orWhere(['apmaterno like' => '%'.$valor.'%'])
				->orWhere(['email like' => '%'.$valor.'%'])
				->andWhere(['activo' => 1]);

			$user = $this->paginate($query,['limit' => 10 ]);
			$this->set('user',$user);
				
		}
		else
		{
			$query = $this->Users->find('all')
					->where(['activo' => 1]);

			$user = $this->paginate($query,['limit' => 10 ]);
			$this->set('user',$user);
		}
	}

}
