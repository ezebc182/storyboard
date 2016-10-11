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
	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set("users",$users);

	}
	public function view($value)
	{
		echo 'Detalle de usuario: '.$value;
		exit();
	}
	public function add()
	{
		$user = $this->Users->newEntity();
		$this->set("user",$user);
		if($this->request->is("post"))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);
			if($this->Users->save($user))
			{
				$this->Flash->success("El usuario ha sido creado.");
				return $this->redirect(["controller"=>"Users","action"=>"index"]);
			}
			else
			{
				$this->Flash->error("No se pudo crear el usuario. Por favor, intente nuevamente.");
			}
		}
		$this->set(compact("user"));
	}
}
