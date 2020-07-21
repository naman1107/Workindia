<?php
header("Access-Control-Allow-Origin*");
header("Content-type:application/json");
header("Access-Control-Allow-Method:POST");
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Method,Authorization');

include_once('../../Model/post.php');
$post=new Post();
$post->ID=isset($_GET['user'])?$_GET['user']:die();
$result=json_decode(file_get_contents("php://input"));
$post->note=$result->note;


$post->create_note();
?>