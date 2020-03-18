<?php
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once(dirname(__DIR__, 1) . "/classes/Author.php");
//require_once("uuid.php");

// The pdo object has been created for you.
$secrets =  new \Secrets("/etc/apache2/capstone-mysql/cohort28/cfiniello.ini");
$pdo = $secrets->getPdoObject();

$authorId = "006fb097-31bf-4ead-95a6-717c46e1c7f6"; //generateUuidV4();
$authorActivationCode = "the_activation_code";
$authorAvatarUrl = "https://avatar.org";
$authorEmail = "thenewemail@email.net";
$authorHash = "a_super_secure_hash";
$authorUsername = "theusername";
$author = new \cfiniello\oop_project\Author($authorId, $authorActivationCode, $authorAvatarUrl, $authorEmail, $authorHash, $authorUsername);
//$author->insert($pdo);
//$author->update($pdo);
//$author->delete($pdo);
//$saved_author = $author->getAuthorByAuthorId($pdo, $authorId);
var_dump($author);
//var_dump($saved_author);