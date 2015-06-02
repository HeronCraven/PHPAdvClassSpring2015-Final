<?php

/**
 * Description of Customer Model
 * 
 * This model stores customer information in the customers database.
 *
 * @author HERON_CRAVEN
 */

namespace App\models\services;


class CustomerModel extends BaseModel {
    
    private $customerid;
    private $customername;
    private $description;
    private $active;
    
    function getCustomerID() {
        return $this->customerid;
    }

    function getCustomerName() {
        return $this->customername;
    }
    
    function getDescription() {
        return $this->description;
    }

    function getActive() {
        return $this->active;
    }

    function setCustomerid($customerid) {
        $this->customerid = $customerid;
    }

    function setCustomerName($customername) {
        $this->customername = $customername;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }

    function setActive($active) {
        $this->active = $active;
    }


}
