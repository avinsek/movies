<?php

require_once('db.conf');

class baza extends mysqli
{
	public function __construct()
	{
		parent::__construct(DB_HOST, DB_USER, DB_PASS);
		$this->set_charset('utf8');
		$this->select_db('kolekcija');
	}
}
?>
