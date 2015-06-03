
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

                if ( isset($scope->view['login']) && $scope->view['login'] ) {
                     echo 'Login Complete';
                     $scope->util->setLoggedin(true);
                     $scope->util->redirect('index');
                } else {
                    echo 'Login Failed';
                } 
            }
            
            $email = $scope->view['model']->getEmail();
            $password = $scope->view['model']->getPassword();
            
        ?>
         <h1>Login</h1>
        <form action="#" method="POST" id="customer_form">
            
            Email : <input type="email" name="email" value="<?php echo $email; ?>" /> <br /><br />
            Password : <input type="password" name="password" value="<?php echo $password; ?>" /> <br /> 
            <br />
            <input type="hidden" name="action" value="login" />
            <input type="submit" value="Login" />
            
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
