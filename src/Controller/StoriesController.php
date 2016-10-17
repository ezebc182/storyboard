<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stories Controller
 *
 * @property \App\Model\Table\StoriesTable $Stories
 */
class StoriesController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] ==='user')
        {
            if(in_array($this->request->action,['add','index']))
            {
                return true;
            }
            if(in_array($this->request->action, ['edit','delete']))
            {
                $id = $this->request->params["pass"][0];
                $story = $this->Stories->get($id);
                if($story->user_id == $this->Auth->user("id"))
                {
                    return true;
                }
               
            }
            return parent::isAuthorized($user);
        }
        elseif(isset($user['role']) and $user['role'] ==='admin')
        {
            if(in_array($this->request->action,['add','index','delete','edit']))
            {
                return true;
            }
            return parent::isAuthorized($user);

        }

        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user("id")],
            'order' => ['id' => 'desc']
        ];
        $stories = $this->paginate($this->Stories);

        $this->set(compact('stories'));
        $this->set('_serialize', ['stories']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $story = $this->Stories->newEntity();
        if ($this->request->is('post')) {
            $story = $this->Stories->patchEntity($story, $this->request->data);
            $story->user_id = $this->Auth->user("id");
            if ($this->Stories->save($story)) {
                $this->Flash->success(__('La historia ha sido creada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La historia no pudo ser creada. Por favor, intente nuevamente.'));
            }
        }
        $this->set(compact('story'));
        $this->set('_serialize', ['story']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Story id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $story = $this->Stories->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $story = $this->Stories->patchEntity($story, $this->request->data);
            $story->user_id = $this->Auth->user("id");
            if ($this->Stories->save($story)) {
                $this->Flash->success(__('La historia ha sido modificada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La historia no pudo ser actualizada. Por favor, intente nuevamente.'));
            }
        }
        $this->set(compact('story'));
        $this->set('_serialize', ['story']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Story id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $story = $this->Stories->get($id);
        if ($this->Stories->delete($story)) {
            $this->Flash->success(__('La historia ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La historia no pudo ser eliminada. Por favor, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
