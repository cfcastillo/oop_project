<?php
require_once(dirname(__DIR__, 1) . "/classes/Author.php");
require_once(dirname(__DIR__, 1) . "/lib/uuid.php");

// The pdo object has been created for you.
require_once("/etc/apache2/capstone-mysql/Secrets.php");
$secrets =  new Secrets("/etc/apache2/capstone-mysql/cohort28/cfiniello.ini");
//$pdo = $secrets->getPdoObject();
use CFiniello\ObjectOriented\Author;

//this simulates the front end of a web site. This would actually come from HTML, Javascript, etc.
$authorId = generateUuidV4(); // "006fb097-31bf-4ead-95a6-717c46e1c7f6";

var_dump($authorId);

$authorActivationCode = "006fb09731bf4ead95a6717c46e1c7f6";
$authorAvatarUrl = "https://avatar.org";
$authorEmail = "myfakeemail@somewhere.com";
$password = "my-super-secure-password";
$authorHash = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 45]);
$authorUsername = "thenewusername3";

//has static declaration so can be called without instantiating Author object.
//$saved_author = Author::getAuthorByAuthorId($pdo, $authorId);

//creating the author object here.
//runs the __construct
//runs individual functions.
//$author =  new Author($authorId, $authorActivationCode, $authorAvatarUrl, $authorEmail, $authorHash, $authorUsername);
//$author->insert($pdo);
//$author->update($pdo);
//$author->delete($pdo);

//$saved_author = $author->getAuthorByAuthorId($pdo, $authorId);
//$my_data = $author->getAllAuthors($pdo);

//var_dump($author->jsonSerialize());
//var_dump($author);
