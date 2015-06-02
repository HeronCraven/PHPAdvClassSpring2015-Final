
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            //$util = new Util();
//            if ( $scope->util->isPostRequest() )
//            
//            if ( $util->isPostRequest() ) {
//                //$db = new DB($dbConfig); 
//               // $model = new SignupModel();
//                //$signupDao = new SignupDAO($db->getDB(), $model);            
//
//                //$model->map(filter_input_array(INPUT_POST));
//                                
//                if ( $signupDao->create($model) ) {
//                    echo '<h2>Signup complete</h2>';
//                } else {
//                    echo '<h2>Signup Failed</h2>';
//                }
//            }
            
            if ( $scope->util->isPostRequest() ) {
             
             if ( isset($scope->view['errors']) ) {
                print_r($scope->view['errors']);
             }

            $model = $scope->view['model'];
            $model->map(filter_input_array(INPUT_POST));
            var_dump($model);
            var_dump($scope->view['Signup']);
            
            if( $scope->view['saved'] ) {        
                 echo 'Signup complete';
            } else {
                 echo 'Signup Failed';
            }                 
        }
            
        //$email = $scope->view['model']->getEmail();
        
        $email = $scope->view['model']->getEmail();
        $password = $scope->view['model']->getPassword();    
        ?>
        
        <h1>Signup</h1>
        <form action="#" method="POST">
            
            Email : <input type="email" name="email" value="<?php echo $email; ?>" placeholder=" Please Enter a valid Email"/> <br />
            Password : <input type="password" name="password" value="<?php echo$password; ?>" /> <br /> 
            <br />
            <input type="submit" value="Signup" />
            
        </form>
        
        
    </body>
</html>
