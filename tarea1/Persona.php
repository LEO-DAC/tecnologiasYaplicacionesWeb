<?php
class Persona{
   public  $name; 
   public $email;
   public $gender;
   public $comment;
   public $website;
/*
public function __construct(){
    $name =""; 
     $email = "";
     $gender = "";
     $comment = "";
     $website = "";
}
*/

/*
   public function __construct($name,$email,$gender,$comment,$website){
     $this->name=$name; 
     $this->email=$email;
     $this->gender=$gender;
     $this->$comment=$comment;
     $this->$website=$website;
   }
*/
   function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //función toString para obtener la cadena con los atributos
  function toString(){
    echo "<h2>Your Input:</h2>";
    echo $this->name;
    echo "<br>";
    echo $this->email;
    echo "<br>";
    echo $this->website;
    echo "<br>";
    echo $this->comment;
    echo "<br>";
    echo $this->gender;
  }

  // funciones get para obtener el valos de los atributos
  function getName(){
      return $name;
  }
  function getEmail(){
      return $email;
  }
  function getGender(){
      return $gender;
  }
  function getComment(){
      return $comment;
  }
  function getWebsite(){
      return $website;
  }

  //funciones set para cambiar el valor de los atributos
  function setName($name){
    $this->name= $name;
}
function setEmail($email){
     $this->$email=$email;
}
function setGender($gender){
    $this->gender=$gender;
}
function setComment($comment){
    $this->comment=$comment;
}
function setWebsite($website){
    $this->website=$website;
}



}

?>