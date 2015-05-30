<?php
/**
 * Description of EmailService
 *
 * @author KHERON
 */

namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IService;
use App\models\interfaces\IModel;

class ProjectService implements IService {
    
    protected $projectDAO;
    protected $customerService;
    protected $validator;
    protected $model;
                
    function getValidator() {
        return $this->validator;
    }

    function setValidator($validator) {
        $this->validator = $validator;
    }                
     
    function getProjectDAO() {
        return $this->projectDAO;
    }

    function setProjectDAO(IDAO $DAO) {
        $this->projectDAO = $DAO;
    }
    
    function getCustomerService() {
        return $this->CustomerService;
    }

    function setCustomerService(IService $service) {
        $this->customerService = $service;
    }
    
    
    function getModel() {
        return $this->model;
    }

    function setModel(IModel $model) {
        $this->model = $model;
    }

        public function __construct( IDAO $projectDAO, IService $cutomerService, IService $validator, IModel $model  ) {
        $this->setProjectDAO($projectDAO);
        $this->setCustomerService($cutomerService);
        $this->setValidator($validator);
        $this->setModel($model);
    }
    
    
    public function getAllCustomers() {       
        return $this->getCustomerService()->getAllRows();   
        
    }
    
     public function getAllProjects() {       
        return $this->getProjectDAO()->getAllRows();   
        
    }
    
    public function create(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getProjectDAO()->create($model);
        }
        return false;
    }
    
    
    public function validate( IModel $model ) {
        $errors = array();
        
        /*
        if ( !$this->getCustomerService()->idExist($model->getCustomerID()) ) {
            $errors[] = 'Email Type is invalid';
        }
       */
        
        /*
        if ( !$this->getValidator()->emailIsValid($model->getEmail()) ) {
            $errors[] = 'Email is invalid';
        }
               
        if ( !$this->getValidator()->activeIsValid($model->getActive()) ) {
            $errors[] = 'Email active is invalid';
        }
         * *
         */
       
        
        return $errors;
    }
    
    
    public function read($id) {
        return $this->getProjectDAO()->read($id);
    }
    
    public function delete($id) {
        return $this->getProjectDAO()->delete($id);
    }
    
    
     public function update(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getProjectDAO()->update($model);
        }
        return false;
    }
    
    
     public function getNewProjectModel() {
        return clone $this->getModel();
    }
    
    
}
