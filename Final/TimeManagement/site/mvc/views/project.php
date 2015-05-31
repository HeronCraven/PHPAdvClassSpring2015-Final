<!DOCTYPE html>
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
                  echo 'Project Added';
             }
             
             if ( isset($scope->view['deleted']) && $scope->view['deleted'] ) {
                  echo 'Project deleted';
             }
             
         }
         
         //var_dump($scope->view);
        
            $projectName = $scope->view['model']->getProjectName();
            $projecthours= $scope->view['model']->getProjectHours();
            $active = $scope->view['model']->getActive();
            $customerid = $scope->view['model']->getCustomerID();
            
        ?>
        
        <h3>Add Customer</h3>
        <form action="#" method="post">
            <label>Project Name:</label>            
            <input type="text" name="projectName" value="<?php echo $projectName; ?>" placeholder="" />
            <br /><br />
            <label>Project Hours:</label>            
            <input type="number" max="8" min="0"  name="projecthours" value="<?php echo $projecthours; ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
            
            <br /><br />
            <label>Customer Name:</label>
            <select name="customerid">
            <?php 
                foreach ($scope->view['customers'] as $value) {
                    if ( $value->getCustomerID() == $customerid ) {
                        echo '<option value="',$value->getCustomerID(),'" selected="selected">',$value->getCustomerName(),'</option>';  
                    } else {
                        echo '<option value="',$value->getCustomerID(),'">',$value->getCustomerName(),'</option>';
                    }
                }
            ?>
            </select>
            
             <br /><br />
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
         
          if ( count($scope->view['projects']) <= 0 ) {
                echo '<p>No Data</p>';
            } else {
                echo '<table border="1" cellpadding="5"><tr><th>Project</th><th>Project Hours</th><th>Customer Name</th><th>Last updated</th><th>Logged</th><th>Active</th><th></th><th></th></tr>'; 
                 foreach ($scope->view['projects'] as $value) {
                    echo '<tr><td>',$value->getProjectName(),'</td><td>',$value->getProjectHours(),'</td><td>',$value->getCustomerName(),'</td><td>',date("F j, Y g:i(s) a", strtotime($value->getLastupdated())),'</td><td>',date("F j, Y g:i(s) a", strtotime($value->getLogged())),'</td>';
                    echo  '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td>';
                    echo '<td><form action="#" method="post"><input type="hidden"  name="projectid" value="',$value->getProjectID(),'" /><input type="hidden" name="action" value="edit" /><input type="submit" value="EDIT" /> </form></td>';
                    echo '<td><form action="#" method="post"><input type="hidden"  name="projectid" value="',$value->getProjectID(),'" /><input type="hidden" name="action" value="delete" /><input type="submit" value="DELETE" /> </form></td>';
               
                    echo '</tr>' ;
                }
                echo '</table>';
            }
         ?>
          
    </body>
</html>
