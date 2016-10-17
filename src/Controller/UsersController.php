<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add']);
	}
	public function isAuthorized($user)
	{
		if(isset($user['role']) and $user['role'] ==='user')
		{
			if(in_array($this->request->action,['home','logout','view']))
			{
				return true;
			}
			return parent::isAuthorized($user);
		}
		elseif(isset($user['role']) and $user['role'] ==='admin')
		{
			if(in_array($this->request->action,['home','add','index','logout','view']))
			{
				return true;
			}
			return parent::isAuthorized($user);

		}
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
				$this->Flash->error("Usuario y/o contraseña incorrectos.", ['key' => 'auth']);
			}
		}
		if($this->Auth->user())
		{
			return $this->redirect(["controller"=>"Users","action"=>"home"]);
		}
	}
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set("users",$users);

	}
	public function home()
	{

		$this->render();
	}
	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set("user",$user);
	}
	public function add()
	{
		$user = $this->Users->newEntity();
		$this->set("user",$user);
		if($this->request->is("post"))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);
			$user->active = 1;
			$user->role = 'user';
			if($this->Users->save($user))
			{
				$this->Flash->success("El usuario ha sido creado.");
				return $this->redirect(["controller"=>"Users","action"=>"login"]);
			}
			else
			{
				$this->Flash->error("No se pudo crear el usuario. Por favor, intente nuevamente.");
			}
		}
		$this->set(compact("user"));
	}
	public function edit($id=null)
	{
		$user = $this->Users->get($id);
		$this->set(compact('user'));
		if($this->request->is(['patch','post','put']))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success("El usuario ha sido modificado");
				return $this->redirect(["action" => "index"]);
			}
			else{
				$this->Flash->error("El usuario no pudo ser modificado. Por favor intente nuevamente.");
			}
		}
	}

	public function delete ($id = null)
	{
		if($this->request->allowMethod(["post","delete"]))
		{
			$user = $this->Users->get($id);
			if($this->Users->delete($user))
			{
				$this->Flash->success("El usuario ha sido eliminado");
			}
			else
			{
				$this->Flash->error("El usuario no pudo ser eliminado. Por favor intente nuevamente.");

			}
			return $this->redirect(["action" => "index"]);
		}
	}
}
