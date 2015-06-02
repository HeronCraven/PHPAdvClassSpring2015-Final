<?php
/**
 * Description of SignupDAO
 *
 * Project DAO stores data in the projects database from the project model class.
 * Projects are linked to the customer table by the customer ID.
 * @author HERON_CRAVEN
 */

namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IModel;
use App\models\interfaces\ILogging;
use \PDO;


class ProjectDAO extends BaseDAO implements IDAO {
        
     public function __construct( PDO $db, IModel $model, ILogging $log ) {        
        $this->setDB($db);
        $this->setModel($model);
        $this->setLog($log);
    }
    
    
    public function idExist($id) {
                
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT projectid FROM projects WHERE projectid = :projectid");
        
        if ( $stmt->execute(array(':projectid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
    
    public function read($id) {
         
         $model = clone $this->getModel();
         
         $db = $this->getDB();
         
         $stmt = $db->prepare("SELECT projects.projectid, projects.projectname, projects.projecthours, projects.customerid, customers.customername, customers.active as customeractive, projects.logged, projects.lastupdated, projects.active"
                 . " FROM projects LEFT JOIN customers on projects.customerid = customers.customerid WHERE projectid = :projectid");
         
        if ( $stmt->execute(array(':projectid' => $id)) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             $model->map($results);
        }
         
        return $model;
    }
    
    
    public function create(IModel $model) {
                 
         $db = $this->getDB();
         
         $binds = array( ":projectname" => $model->getProjectName(),
                         ":projecthours" => $model->getProjectHours(),
                         ":active" => $model->getActive(),
                         ":customerid" => $model->getCustomerID()             
                    );
                         
         if ( !$this->idExist($model->getProjectID()) ) {
             
             $stmt = $db->prepare("INSERT INTO projects SET projectname = :projectname, projecthours = :projecthours, customerid = :customerid, active = :active, logged = now(), lastupdated = now()");
             
             if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
             }
         }
                  
         
         return false;
    }
    
    
     public function update(IModel $model) {
                 
         $db = $this->getDB();
         
        $binds = array( ":projectname" => $model->getProjectName(),
                         ":projecthours" => $model->getProjectHours(),
                         ":active" => $model->getActive(),
                         ":customerid" => $model->getCustomerID(),
                         ":projectid" => $model->getProjectID()   
                    );
         
           //var_dump($binds);
           //var_dump($this->idExist($model->getProjectID()));
           
         if ( $this->idExist($model->getProjectID()) ) {
            
             //var_dump($model->getProjectID());
             
             $stmt = $db->prepare("UPDATE projects SET projectname = :projectname, projecthours = :projecthours, customerid = :customerid, active = :active, lastupdated = now() WHERE projectid = :projectid");
         
             if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
             } else {
                 $error = implode(",", $db->errorInfo());
                 $this->getLog()->logError($error);
             }
             
         } 
         
         return false;
    }
    //delete by ID
    public function delete($id) {
          
        $db = $this->getDB();         
        $stmt = $db->prepare("Delete FROM projects WHERE projectid = :projectid");

        if ( $stmt->execute(array(':projectid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        } else {
            $error = implode(",", $db->errorInfo());
            $this->getLog()->logError($error);
        }
         
         return false;
    }
    
    
    //Get all rows from projects database
    public function getAllRows() {
       $db = $this->getDB();
       $values = array();
       
       $stmt = $db->prepare("SELECT projects.projectid, projects.projectname, projects.projecthours, projects.customerid, customers.customername, customers.active as customeractive, projects.logged, projects.lastupdated, projects.active"
                 . " FROM projects LEFT JOIN customers on projects.customerid = customers.customerid");
        
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
