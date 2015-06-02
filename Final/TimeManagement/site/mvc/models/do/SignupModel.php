<?php
namespace App\models\services;

//Signup model for logging user information into the signup database
class SignupModel extends BaseModel{
    
    private $id;
    private $email;
    private $password;
    private $created;
    private $active;
       
    function getId() {
        return $this->id;
    }
//get email
    function getEmail() {
        return $this->email;
    }
//get password
    function getPassword() {
        return $this->password;
    }
//get created
    function getCreated() {
        return $this->created;
    }
//get active
    function getActive() {
        return $this->active;
    }
//set id
    function setId($id) {
        $this->id = $id;
    }
//set email
    function setEmail($email) {
        $this->email = $email;
    }
//set password
    function setPassword($password) {
        $this->password = $password;
    }
//set created
    function setCreated($created) {
        $this->created = $created;
    }
//set active
    function setActive($active) {
        $this->active = $active;
    }
//set mapping
    public function map(array $values) {
        
        foreach ($values as $key => $value) {
           $method = 'set' . $key;
            if ( method_exists($this, $method) ) {
                $this->$method($value);
            }       
        } 
        return $this;
    }
//set reset
    public function reset() {
        
        $class_methods = get_class_methods($this);

        foreach ($class_methods as $method_name) {
           if ( strrpos($method_name, 'set', -strlen($method_name)) !== FALSE ) {
               $this->$method_name('');
           }
            
        } 
         return $this;
    }

}
