<?php

class SoccerDbApplication extends Application
{
	protected $login_action = array('account', 'signin');

	public function getRootDir()
	{
		return dirname(__FILE__);
	}

	protected function registerRoutes()
	{
		return array(
			'/'
				=> array('controller' => 'view', 'action' => 'index'),
			'/admin/signup'
				=> array('controller' => 'account', 'action' => 'signup'),
			'admin'
				=> array('controller' => 'account', 'action' => 'index'),
			'admin/:action'
			 	=> array('controller' => 'account'),
		);
	}

	protected function configure()
	{
		$this->db_manager->connect('master', array(
			'dsn' => 'mysql:dbname=soccerdb;host=localhost;charset=utf8',
			'user' => 'root',
			'password' => 'root',
			));
	}
}