
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
                    var_dump(isset($scope->view['login']));
                    echo 'Login Failed';
                }
            }
        ?>
         <h1>Login</h1>
        <form action="#" method="POST">
            
            Email : <input type="email" name="email" value="" /> <br />
            Password : <input type="password" name="password" value="" /> <br /> 
            <br />
            <input type="hidden" name="action" value="login" />
            <input type="submit" value="login" />
            
        </form>
    </body>
</html>
