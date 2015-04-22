<?php namespace App\admin\controllers;

class Admin {
	
//	function __construct()
//	{
//		parent::__construct();
//	}
	
	/**
	 * Authenticate manager, on success redirect to admin dashboard
	 *
	 */
	public function index()
	{
        diebug('To je admin.');
		// Authenticate manager
//		\libs\Auth::authManager();
		
		// Redirect to dashboard
//		redirect(DASH);
	}
	
	/**
	 * Display login template
	 *
	 */
	function login()
	{
		// Echo Hash::create('sha256','q1w2', HASH_PASSWORD_KEY);
		$this->view->tpl('login.tpl', 'admex');
	}
	
	/**
	 * Logout from administration
	 *
	 */
	function logout()
	{
		Session::destroy();
		$this->view->assign('logout', true);
		$this->view->tpl('login.tpl', 'admex');
		exit;
	}
	
	/**
	 * Authenticate manager
	 *
	 */
	function auth()
	{
		if ($this->model->auth()) {
			redirect(ADMINURL);
		} else {
//			require APPROOT . 'controllers/error.php';
			Error::index('Neveljavno uporabniško ime ali geslo.', ADMINURL, 5);
			exit();
		}
	}
	
}