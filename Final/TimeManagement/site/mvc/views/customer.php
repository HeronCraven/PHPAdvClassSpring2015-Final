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
        <link rel="stylesheet" type="text/css"
              href="main.css" 
              >
    </head>
    <body>
        <div id="page">
            <div id="header"><h1>Customer Page</h1></div>
        <div id="main">
        <a href="index">Home</a>
        <?php
        // put your code here

         if ( $scope->util->isPostRequest() ) {
             
             
             
             if ( isset($scope->view['errors']) ) {
                //print_r($scope->view['errors']);
             }
             
             if ( isset($scope->view['saved']) && $scope->view['saved'] ) {
                  echo '<center style="color:green;">Customer Added</center>';
             }
             
             if ( isset($scope->view['deleted']) && $scope->view['deleted'] ) {
                  echo '<center style="color:red;">Customer Deleted</center>';
             }
             
         }
        
         $customerName = $scope->view['model']->getCustomerName();
         $description = $scope->view['model']->getDescription();
         $active = $scope->view['model']->getActive();
        
        ?>
        
        
         <h3>Add Customer</h3>
        <form action="#" method="post" id="customer_form">
            <label>Customer Name:</label> 
            <input type="text" name="customername" value="<?php echo $customerName; ?>" placeholder="" />
            <label>Description:</label> 
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
            
            
             echo '<table border="1" cellpadding="5"><tr><th>Customer Name</th><th>Active</th><th></th><th></th></tr>';
             foreach ($scope->view['Customers'] as $value) {
                echo '<tr>';
                echo '<td>', $value->getCustomerName(),'</td>';
                echo '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="customerid" value="',$value->getCustomerID(),'" /><input type="hidden" name="action" value="edit" /><input type="submit" value="EDIT" /> </form></td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="customerid" value="',$value->getCustomerID(),'" /><input type="hidden" name="action" value="delete" /><input type="submit" value="DELETE" /> </form></td>';
                echo '</tr>' ;
            }
            echo '</table>';
            
        }

         ?>
        </div>
        
        <div id="footer">
            <center>
                <h3>
                Jarrod Craven <br /><br />
                Korey Heron <br />
                </h3>
            </center>
        </div>
        </div>
    </body>
</html>
