<?php
/**
* Application level Controller
*
* This file is application-wide controller file. You can put all
* application-wide controller-related methods here.
*
* PHP 5
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link http://cakephp.org CakePHP(tm) Project
* @package Cake.Controller
* @since CakePHP(tm) v 0.2.9
* @license MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

App::uses('Controller', 'Controller');

/**
* This is a placeholder class.
* Create the same file in app/Controller/AppController.php
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @package Cake.Controller
* @link http://book.cakephp.org/view/957/The-App-Controller
*/
class AppController extends Controller {
    // These components are included in every controller.
    public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'pages', 'action'=>'display'),
            'logoutRedirect'=>array('controller'=>'pages', 'action'=>'display'),
            'authError'=>"You can't access that page",
            'authorize'=>array('Controller')
        )
    );
    
    //public $helpers = array('Access');
    
    // default isauthorized() function.  Authorizes only the admin to view pages.
    public function isAuthorized($user) {
        if ($user['role'] == 'admin') {
            return true; // every action request authorized
	}
        return false;
    }
    
    
    public function beforeFilter() {
        // Authorization functionality
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());  
/* attempt to get the current user to the model for the behavior to document the source */
/*
        if( !empty( $this->data ) && empty( $this->data[$this->Auth->userModel] ) ) {
			$this->data[$this->Auth->userModel] = $this->current_user();
		}      
*/
    }
}