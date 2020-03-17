<?php
//require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once(dirname(__DIR__, 1) . "/classes/Author.php");
//require_once("uuid.php");


// The pdo object has been created for you.
//$secrets =  new \Secrets("/etc/apache2/capstone-mysql/assessment.ini");
//$pdo = $secrets->getPdoObject();


$authorId = "b1d2d31bd17e474c9f6ccb9ddbc22793"; //generateUuidV4();
$authorActivationCode = "the_activation_code";
$authorAvatarUrl = "https://avatar.org";
$authorEmail = "theemail@email.net";
$authorHash = "a_super_secure_hash";
$authorUsername = "theusername";
$author = new \cfiniello\ObjectOrientedDesign\Author($authorId, $authorActivationCode, $authorAvatarUrl, $authorEmail, $authorHash, $authorUsername);
//$author->insert($pdo);
var_dump($author);
