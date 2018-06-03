<?php
class CommentsController extends AppController{

	public $helpers = array('Html', 'Form', 'Session');

	public function add(){
		if($this->request->is('post')){
			if($this->Comment->save($this->request->data)){
				if($this->Session->read('username') == ''){
					$this->Session->write('username', $this->request->data['Comment']['commenter']);
				}
				$this->redirect(array('controller' => 'posts', 'action' => 'view', $this->data['Comment'][('post_id')]));
			}else{
				$this->Session->setFlash('コメントできませんでした。');
			}
		}
	}
	
	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->request->is('ajax')){
			if($this->Comment->delete($id)){
				$this->autoRender = false;
				$this->autoLayout = false;
				$response = array('id' => $id);
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
		}
		$this->redirect(array('controller' => 'index', 'action' => 'index'));
	}

	public function actionIncrement($id){
		if($this->request->is('ajax')){
			$this->autoRender = false;
			$this->autoLayout = false;

			$this->Comment->id = $id;
			// $CommentAll = $this->Comment->find('all');
			// $response = $CommentAll[$id - 1]['Comment']['action'] + 1;

			$response = $this->request->data['actionNum']+1;

			$this->Comment->saveField('action',$response);
			$this->header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
	}


	

}