<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css"
              href="main.css" />
    </head>
    <body>
        <div id="page">
            <div id="header"><h1>Customer Page</h1></div>
        <div id="main">
        <a href="index">Home</a>
        <?php
        // put your code here
        
        
         if ( isset($scope->view['updated']) ) {
            if( $scope->view['updated'] ) {        
                 echo 'Project Updated';
            } else {
                 echo 'Project NOT Updated';
            }                 
        }
        
            $projectid = $scope->view['model']->getProjectID();
            $projectname = $scope->view['model']->getProjectName();
            $projecthours = $scope->view['model']->getProjectHours();
            $active = $scope->view['model']->getActive();
            $customerid = $scope->view['model']->getcustomerid();
        ?>
        
        <h3>Add Project</h3>
        <form action="#" method="post">
            <label>Project:</label>            
            <input type="text" name="projectname" value="<?php echo $projectname; ?>" placeholder="" />
            <br /><br />
            <label>Project Hours:</label>            
            <input type="text" name="projecthours" value="<?php echo $projecthours; ?>" placeholder="" />
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
             <input type="hidden"  name="projectid" value="<?php echo $projectid; ?>" />
            <input type="hidden" name="action" value="update" />
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
