<?php
    //Include the config:
    include 'core/config.php';
    // Get the request:
    if( isset($_GET['request']) ) {
        //Include the necessary files:
        include 'core/lib/Security.php';
        include 'core/Router.php';
        include 'core/Model.php';
        include 'core/Controller.php';
        include 'core/View.php';
        
        // Find the route:
        $r = new Router(C_DEFAULT_CONTROLLER, C_DEFAULT_ACTION, $_GET['request']);
        //Create the selected controller-name:
        $requestedC = $r->getController() . 'Controller';
        //Check if the controller exists:
        $cPath = 'application/Controller/' . $requestedC . '.php';       
        if( is_file($cPath) ) { //Found the controller:
            //Include the correct class:
            include $cPath;
            //Create the controller:
            $controller = new $requestedC($r->getController(), substr($requestedC, -1, 1), $r->getAction());
            //Check if any action exists:
            $action = $r->getAction();
           
            if( method_exists( $controller, $action )) {
                
                if( $r->getParams() == null ) {
                    $controller->$action();
                } else {
                    call_user_func_array( array($controller, $action), $r->getParams() );
                }
            } else {
                echo "The requested page does not exist.";
            }
            
        } else { //No controller found:
            echo "The requested part of the website does not exist";
        }
    }