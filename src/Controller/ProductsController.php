<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

	//Authorized user
/*   public function isAuthorized($user){
	if ($this->action === 'add') {
            return true;
        }
		
	        if (in_array($this->action, array('edit', 'delete'))) {
            $producId = $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($productId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       
        $products = $this->Products->find('all');
        $this->set([
            'products' => $products,
            '_serialize'=> ['products']
       ]);
    }

    

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $product = $this->Products->get($id);
        $this->set([
            'product' => $product,
            '_serialize' => ['product']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
//	$this->request->data['Post']['user_id'] = $this->Auth->user('id');
        $product = $this->Products->newEntity($this->request->data);
        
            if ($this->Products->save($product)) {
                $message = 'Product saved';
            } else {
                $message = 'Error';
            }
        
        $this->set([
		'message' => $message,
		'product' => $product,
		'_serialize'=> ['message','product']
	]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id)
    {
        $product = $this->Products->get($id);
        if ($this->request->is(['post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
          'message' => $message,
          '_serialize'=>  ['message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
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
