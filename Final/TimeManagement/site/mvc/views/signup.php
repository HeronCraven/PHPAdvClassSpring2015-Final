
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

            if ( isset($scope->view['saved']) && $scope->view['saved'] ) {
                 echo 'Signup Complete';
            } else {

                var_dump(isset($scope->view['saved']));
                echo 'Signup Failed';
            }
            
        }
            
        //$email = $scope->view['model']->getEmail();
        
        $email = $scope->view['model']->getEmail();
        $active = $scope->view['model']->getActive();
        
        ?>
        
        <h1>Signup</h1>
        <form action="#" method="POST">
            
            Email : <input type="email" name="email" value="<?php echo $email; ?>" placeholder=" Please Enter a valid Email"/> <br />
            Password : <input type="password" name="password" value="" /> <br /> 
            <br />
            <input type="hidden" max="1" min="0" name="Active" value="1" />
            <input type="hidden" name="action" value="create" />
            <input type="submit" value="Signup" />
            
        </form>
        
        
    </body>
</html>
