<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="index">Home</a>
        <?php
        // put your code here
        
       
         if ( $scope->util->isPostRequest() ) {
             
             if ( isset($scope->view['errors']) ) {
                print_r($scope->view['errors']);
             }
             
             if ( isset($scope->view['saved']) && $scope->view['saved'] ) {
                  echo 'Customer Added';
             }
             
             if ( isset($scope->view['deleted']) && $scope->view['deleted'] ) {
                  echo 'Customer deleted';
             }
             
         }
        
         $customerName = $scope->view['model']->getCustomerName();
         $description = $scope->view['model']->getDescription();
         $active = $scope->view['model']->getActive();
        
        ?>
        
        
         <h3>Add Customer</h3>
        <form action="#" method="post">
            <label>Customer Name:</label> 
            <input type="text" name="customername" value="<?php echo $customerName; ?>" placeholder="" />
            <input type="text" name="description" value="<?php echo $description; ?>" placeholder="" />
            <input type="number" max="1" min="0" name="Active" value="<?php echo $active; ?>" />
            <input type="hidden" name="action" value="create" />
            <input type="submit" value="Submit" />
        </form>
         <br />
         <br />
         
        <form action="#" method="post">
            <input type="hidden" name="action" value="add" />
            <input type="submit" value="ADD Page" /> 
        </form>
         <?php
         
        
          if ( count($scope->view['Customers']) <= 0 ) {
            echo '<p>No Data</p>';
        } else {
            
            
             echo '<table border="1" cellpadding="5"><tr><th>Email Type</th><th>Active</th><th></th><th></th><th></th></tr>';
             foreach ($scope->view['EmailTypes'] as $value) {
                echo '<tr>';
                echo '<td>', $value->getCustomerName(),'</td>';
                echo '<td>', $value->getDescription(),'</td>';
                echo '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="customerid" value="',$value->getCustomerID(),'" /><input type="hidden" name="action" value="edit" /><input type="submit" value="EDIT" /> </form></td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="customerid" value="',$value->getCustomerID(),'" /><input type="hidden" name="action" value="delete" /><input type="submit" value="DELETE" /> </form></td>';
                echo '</tr>' ;
            }
            echo '</table>';
            
        }
         
         
         
         
         
         ?>
    </body>
</html>
