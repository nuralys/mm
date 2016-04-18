<?php

class UsersController extends AppController{


	public function login(){
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Session->setFlash('Неверный логин или пароль.', 'default', array(), 'bad');
	    }
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

}