<?php

/**
 * Description of Project Model
 * 
 * This model stores project information for the specified customer.
 *
 * @author KHERON
 */

namespace App\models\services;


class ProjectModel extends BaseModel {
    
    private $projectid;
    private $projectName;
    private $projectHours;
    
    private $customerid;
    private $customerName;
    private $customeractive;
    
    private $logged;
    private $lastupdated;
    private $active;
    
    function getProjectID() {
        return $this->projectid;
    }

    function getProjectName() {
        return $this->projectName;
    }

    function getProjectHours() {
        return $this->projectHours;
    }
    
     function getCustomerID() {
        return $this->customerid;
    }

    function getCustomerActive() {
        return $this->customeractive;
    }
    
    function getCustomerName() {
        return $this->customerName;
    }

    function getLogged() {
        return $this->logged;
    }

    function getLastupdated() {
        return $this->lastupdated;
    }

    function getActive() {
        return $this->active;
    }

    function setProjectID($projectid) {
        $this->projectid = $projectid;
    }

    function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    function setprojectHours($projectHours) {
        $this->projectHours = $projectHours;
    }

    function setCustomerID($customerid) {
        $this->customerid = $customerid;
    }
    
    function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    function setCustomerActive($customeractive) {
        $this->customeractive = $customeractive;
    }
    
    function setLogged($logged) {
        $this->logged = $logged;
    }

    function setLastupdated($lastupdated) {
        $this->lastupdated = $lastupdated;
    }

    function setActive($active) {
        $this->active = $active;
    }
    
}
