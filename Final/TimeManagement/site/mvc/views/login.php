
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
                     //$scope->util->setLoggedin(true);
                     //$scope->util->redirect('is-logged-in.php');
                } else {
                    //var_dump(isset($scope->view['login']));
                    echo 'Login Failed';
                }
            }
        ?>
         <h1>Login</h1>
        <form action="#" method="POST" id="customer_form">
            
            Email : <input type="email" name="email" value="" /> <br /><br />
            Password : <input type="password" name="password" value="" /> <br /> 
            <br />
            <input type="hidden" name="action" value="login" />
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
