<?php
/**
 * Description of CustomerDAO
 *
 * Customer DAO for accessing data in the customer table.
 * @author kheron
 */

namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IModel;
use App\models\interfaces\ILogging;
use \PDO;

class CustomerDAO extends BaseDAO implements IDAO {
    
    public function __construct( PDO $db, IModel $model, ILogging $log ) {        
        $this->setDB($db);
        $this->setModel($model);
        $this->setLog($log);
    }
          
    public function idExist($id) {
        
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM customers WHERE CustomerID = :customerid");
         
        if ( $stmt->execute(array(':customerid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
    
    public function read($id) {
         
         $model = clone $this->getModel();
         
         $db = $this->getDB();
         
         $stmt = $db->prepare("SELECT * FROM customers WHERE CustomerID = :customerid");
         
         if ( $stmt->execute(array(':customerid' => $id)) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             $model->reset()->map($results);
         }
         
         return $model;
    }
    
    
    public function create(IModel $model) {
                 
         $db = $this->getDB();
         
         $binds = array( ":customername" => $model->getCustomerName(),
                        ":description" => $model->getDescription(),
                        ":active" => $model->getActive()
                    );
                         
         if ( !$this->idExist($model->getCustomerID()) ) {
             
             $stmt = $db->prepare("INSERT INTO customers SET CustomerName = :customername, Description = :description ,active = :active");
             
             if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
             }
         }
                  
         
         return false;
    }
    
    
     public function update(IModel $model) {
                 
         $db = $this->getDB();
         
         $binds = array( ":customername" => $model->getCustomerName(),
                        ":description" => $model->getDescription(),
                        ":active" => $model->getActive(),
                        ":customerid" => $model->getCustomerID()
                    );
         
         if ( $this->idExist($model->getCustomerID() ) ) {
            
             $stmt = $db->prepare("UPDATE customers SET customername = :customername, description = :description, active = :active WHERE customerid = :customerid");
         
             if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
             } else {
                 $error = implode(",", $db->errorInfo());
                 $this->getLog()->logError($error);
             }
             
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
    
    public function getAllRows() {
       $db = $this->getDB();
       $values = array();
       
        $stmt = $db->prepare("SELECT * FROM customers");
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = clone $this->getModel();
               $model->reset()->map($value);
               $values[] = $model;
            }
        }
        
        $stmt->closeCursor();
         return $values;
    }
     
    
     
}
