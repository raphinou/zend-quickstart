<?php

class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }


    public function preDispatch() {
	   $action = $this->getRequest()->getActionName();
	   
	   if ($action=='indexalias')
	   {
		   error_log($action);
		   $this->_forward('index');
		   return;
	   }
    }


  public function postDispatch()
    {
        $response = $this->getResponse();
        $view = new Zend_View();
        $view->setBasePath(APPLICATION_PATH.'/views');
        $response->append('footer', $view->render('footer.phtml'));
    }




    public function indexAction()
    {
        $guestbook = new Application_Model_GuestbookMapper();
                $this->view->entries = $guestbook->fetchAll();
    }

    public function signAction()
    {
       $request = $this->getRequest();
        $form    = new Application_Form_Guestbook();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Guestbook($form->getValues());
                $mapper  = new Application_Model_GuestbookMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }


}



