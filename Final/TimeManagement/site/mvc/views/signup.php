
<!DOCTYPE html>
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
        
        if ( $scope->util->isPostRequest() ) {
             
            if ( isset($scope->view['errors']) ) {
               //print_r($scope->view['errors']);
            }

            if ( isset($scope->view['saved']) && $scope->view['saved'] ) {
                 echo '<center style="color:green;">Signup Complete</center>';
            } else {

                //var_dump(isset($scope->view['saved']));
                echo '<center style="color:green;">Signup Failed</center>';
            }
            
        }
        
        $email = $scope->view['model']->getEmail();
        $password = $scope->view['model']->getPassword();    
        $active = $scope->view['model']->getActive();
        
        ?>
        
        <h1>Signup</h1>
        <form action="#" method="POST" id="customer_form">
            
            Email : <input type="email" name="email" value="<?php echo $email; ?>" placeholder=" Please Enter a valid Email"/> <br />
            <br />
            Password : <input type="password" name="password" value="<?php echo$password; ?>" /> <br /> 
            <br />
            <input type="hidden" max="1" min="0" name="Active" value="1" />
            <input type="hidden" name="action" value="create" />
            <input type="submit" value="Signup" />
            
        </form>
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
