<?php 

namespace core;
use library\triangle;

class model
{
	public $db;

	public function __construct()
	{
		$this->db = new triangle;
	}
}

