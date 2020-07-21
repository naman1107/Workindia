<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include_once('../../../Model/post.php');


$post=new Post();
$post->ID=isset($_GET['user'])?$_GET['user']: die();

$post->read_note()




?>