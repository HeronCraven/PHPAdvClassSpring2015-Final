<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <h1>Test</h1>
        <?php
        
            if ( !$scope->util->isLoggedin() ) {
                // redirect to login page
                echo '<h2>Not logged in</h2>';
            } else {
                var_dump($scope->util->isLoggedin());
                echo '<h2>Logged in</h2>';
            }
        
            if ( isset($scope->view['email']) ) {
                echo $scope->view['email'];
            }
            
            if ( isset($scope->view['emailvalid']) ) {
                
                if ( $scope->view['emailvalid'] ) {
                    echo '<p>email is valid</p>';
                } else {
                    echo '<p>email is NOT valid</p>';
                }
                
            }

        ?>
        <form action="#" method="post">            
            <input type="text" name="email" />            
            <input type="submit" value="submit" />            
        </form>
        
        
        
        <?php

        //var_dump($scope->view);
        
        echo $scope->view['test1'];
        echo $scope->view['test2'];
        if ( isset($scope->view['test3']) ) {
            echo $scope->view['test3'];
        }
        
        ?>
    </body>
</html>
