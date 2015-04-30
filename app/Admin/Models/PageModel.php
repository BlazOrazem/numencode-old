<?php namespace App\Admin\Models;

use App\Core\Model;

class PageModel extends Model {
	
	/**
	 * Authenticate and set login session for manager
	 *
	 */
	public function auth()
	{
		$data = DB::getRow('SELECT id, role FROM manager WHERE login = :login AND password = :password', array('login' => $_POST['login'], 'password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)));

		if(isset($data) && $data['id'] > 0){
			// Login successfull
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			Session::set('manager_id', $data['id']);
			return true;
		} else {
			// Login error
			return false;
		}
	}
	
}
