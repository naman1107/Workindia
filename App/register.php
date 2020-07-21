<?php
header("Access-Control-Allow-Origin*");
header("Content-type:application/json");
header("Access-Control-Allow-Method:POST");
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Method,Authorization');
include_once('../Model/post.php');
$post=new Post();
$result=json_decode(file_get_contents("php://input"));
$post->User=$result->User;
$post->password=$result->Password;
$post->create_update();


?>