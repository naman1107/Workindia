<?php

class Post{
private $conn;

public $ID;
public $User;

public $quer;
public $stmt;
public $note;
public $password;

public function __construct(){
    $this->conn =  new mysqli("localhost", "root", "", "notes");
    
}


public function create_update(){
    
    $quer="insert into user values ('','$this->User','$this->password')";
    if(mysqli_query($this->conn,$quer)){
        $arr=array(
            'status'=>"account created"
        );
        echo (json_encode($arr));
    }else{
        echo json_encode("Fail");
    }

}
public function auth(){
    
    $quer="select ID from user where User='$this->User' && Password='$this->password'";
    if(mysqli_query($this->conn,$quer)){
        $row=mysqli_query($this->conn,$quer);
        $result=mysqli_fetch_assoc($row);
        $arr=array(
            'status'=>"success",
            'userId'=>$result['ID']
        );
        echo (json_encode($arr));
    }else{
        echo json_encode("Fail");
    }

}
public function create_note(){
    $key=md5('secretkey');
    
$ciphering = "AES-128-CTR"; 
$iv = '1234567891011121';
$options=0;
    
    $note1=openssl_encrypt( $this->note, $ciphering, $key,
                        $options = 0, $iv  );
    
    $quer="insert into notes values('$this->ID','$note1','$key','$iv')";
    if(mysqli_query($this->conn,$quer)){
  
        $arr=array(
            'status'=>"success",
            
        );
        echo (json_encode($arr));
    }else{
        echo json_encode("Fail");
    }

}
public function read_note(){
    $quer="select *from notes where ID='$this->ID'";
    

   
    if(mysqli_query($this->conn,$quer)){
        $result=mysqli_query($this->conn,$quer);
        $arr=array();
        while($row=mysqli_fetch_assoc($result)){
                
    $ciphering = "AES-128-CTR"; 
   
    $options=0;
            $key=$row['Skey'];
            $IV=$row['IV'];
            $note=$row['notes'];
            $onote=openssl_decrypt ($note, $ciphering,  
        $key, $options, $IV);
        $post_item = array(
            'note' => $onote);
            array_push($arr,$post_item);
        }
        
        echo (json_encode($arr));
    }else{
        echo json_encode("Fail");
    }

}
}
?>