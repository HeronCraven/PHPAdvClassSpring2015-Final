<?php
/**
 * Description of CustomerDAO
 *
 * Customer DAO for accessing data in the customer table from 
 * the model passed through.
 * @author kheron
 */

namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IModel;
use App\models\interfaces\ILogging;
use \PDO;

class LoginDAO extends BaseDAO implements IDAO {
    
    //private $DB = null;
    //private $model = null;

    public function __construct( PDO $db, IModel $model, ILogging $log ) {        
        $this->setDB($db);
        $this->setModel($model);
        $this->setLog($log);
    }
    
//    private function setDB( PDO $DB) {        
//        $this->DB = $DB;
//    }
//    
//    private function getDB() {
//        return $this->DB;
//    }
//    
//    private function getModel() {
//        return $this->model;
//    }
//
//    private function setModel($model) {
//        $this->model = $model;
//    }
     public function read($id) {
         
         $model = clone $this->getModel();
         
//         $db = $this->getDB();
//         
//         $stmt = $db->prepare("SELECT * FROM customers WHERE CustomerID = :customerid");
//         
//         if ( $stmt->execute(array(':customerid' => $id)) && $stmt->rowCount() > 0 ) {
//             $results = $stmt->fetch(PDO::FETCH_ASSOC);
//             $model->reset()->map($results);
//         }
         
         return $model;
    }
    public function login(IModel $model) {
         
        $email = $model->getEmail();
        $password = $model->getPassword();
        $db = $this->getDB();

        $stmt = $db->prepare("SELECT * FROM signup WHERE email = :email");

        if ( $stmt->execute(array(':email' => $email)) && $stmt->rowCount() > 0 ) {            
            $results = $stmt->fetch(PDO::FETCH_ASSOC);            
            return password_verify($password, $results['password']);            
        }
         
        return false;
    }
    
    
    public function create(IModel $model) {        
        $db = $this->getDB();
        
        $binds = array( ":email" => $model->getEmail(),
                        ":password" => password_hash($model->getPassword(), PASSWORD_DEFAULT)
                    );
        
                    
        $stmt = $db->prepare("INSERT INTO signup SET email = :email, password = :password, created = now()");
         
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            return true;
        }
         
         return false;
    }
    
    
    public function update(IModel $model) {
          
        $db = $this->getDB();
        $binds = array( ":id" => $model->getId(),
                        ":email" => $model->getEmail(),
                        ":password" => password_hash($model->getPassword(), PASSWORD_DEFAULT),
                        ":active" => $model->getActive()
                    );

        $stmt = $db->prepare("UPDATE signup SET email = :email, password = :password, active = :active WHERE id = :id");

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
      public function delete($id) {
          
        $db = $this->getDB();         
        $stmt = $db->prepare("Delete FROM customers WHERE customerid = :customerid");

        if ( $stmt->execute(array(':customerid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        } else {
            $error = implode(",", $db->errorInfo());
            $this->getLog()->logError($error);
        }
         
         return false;
    }      
}
