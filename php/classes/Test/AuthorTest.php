<?php
namespace CFiniello\ObjectOriented\Test;

use CFiniello\ObjectOriented\{Author};

//TODO remember to add this to my Test class!!!!
//Hack!!! - added so this class could see DataDesignTest
require_once(dirname(__DIR__) . "/Test/DataDesignTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoload.php");

// grab the uuid generator
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

class AuthorTest extends DataDesignTest {

	private $VALID_ACTIVATION_TOKEN;	//this will be done in the setup.
	private $VALID_AVATAR_URL = "https://avatar.org";
	private $VALID_AUTHOR_EMAIL = "cfiniello@cnm.edu";
	private $VALID_AUTHOR_HASH;	//this will be done in the setup.
	private $VALID_USERNAME = "cfiniello";

	public function setUp() : void {
		parent::setUp();

		$password = "my_super_secret_password";
		$this->VALID_AUTHOR_HASH = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 45]);
		$this->VALID_ACTIVATION_TOKEN = bin2hex(random_bytes(16));
	}

	public function testInsertValidAuthor() : void {

	}

	public function testUpdateValidAuthor() : void {

	}

	public function testDeleteValidAuthor() : void {

	}

	public function testGetValidAuthorByAuthorId() : void {

	}

	public function testGetValidAuthors() : void {

	}



}