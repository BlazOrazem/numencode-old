<?php namespace App\Admin\Controllers;

class HomeController extends AdminController {
	
//	function __construct()
//	{
//		parent::__construct();
//	}
	
	/**
	 * Authenticate manager, on success redirect to Admin dashboard
	 *
	 */
	public function index()
	{
        diebug('To je Admin.');
		// Authenticate manager
//		\libs\Auth::authManager();
		
		// Redirect to dashboard
//		redirect(DASH);
	}
	
	/**
	 * Display login template
	 *
	 */
	public function login()
	{
		// Echo Hash::create('sha256','q1w2', HASH_PASSWORD_KEY);
		$this->view->display('admin/login.tpl');
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
//			require APPROOT . 'Controllers/error.php';
			Error::index('Neveljavno uporabniško ime ali geslo.', ADMINURL, 5);
			exit();
		}
	}
	
}