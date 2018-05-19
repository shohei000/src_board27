<?php
class PostsController extends AppController{

	public $helpers = array('Html', 'Form');

	public function index(){
		$this->set('posts', $this->Post->find('all'));
		$this->set('title_for_layout', 'スレット一覧');
	}

	public function view($id = null){
		$this->set('bg_gray', 'bg-gray');
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
		$this->set('com_input',true);
	}

	public function add(){
		$this->set('title_for_layout', 'スレを追加');
		if($this->request->is('post')){
			if($this->Post->save($this->request->data)){
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('ng');
			}
		}
	}

	public function edit($id = null){
		$this->Post->id = $id;
		if($this->request->is('get')){
			$this->request->data = $this->Post->read();
		}else{
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash('ok');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('ng');
			}
		}
	}

	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->request->is('ajax')){
			if($this->Post->delete($id)){
				$this->autoRender = false;
				$this->autoLayout = false;
				$response = array('id' => $id);
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
		}
		$this->redirect(array('action' => 'index'));
	}

}