<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
/*    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add','logout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
	$users = $this->Users->find('all');
        $this->set([
            'users' => $users,
            '_serialize' => ['users']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $user = $this->Users->get($id);
	$this->set([
		'user' =>$user,
		'_serialize' => ['user']
       ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity($this->request->data);
        
            if ($this->Users->save($user)) {
                $message = 'saved';
            } else {
                $message = 'Error';
            }
        $this->set([
            'message' => $message,
            'user' => $user,
            '_serialize' => ['message', 'user']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id)
    {
        $recipe = $this->Recipes->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }*/

    
   public function login()
    {
	if($this->Auth->user()){
	$this->set([
            'message' => 'Login success!!!',
            '_serialize' => ['message']
        ]);
	}

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->set([
            	 'user' => $this->Auth->setUser(),
            	 '_serialize' => ['user']
        	]);
	     }else{
		$this->set([
                  'message' => 'Long username or Password',
                  '_serialize' => ['message']
             ]);
	     }
        }
    }

    public function logout()
    {
        if ($this->Auth->logout()){
	    $this->set([
                'message' => 'Logout Success',
                '_serialize' => ['message']
        ]);
	}
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
