<?php
    // Necessary files:
    include 'config.php';
    include 'lib/Security.php';
    include 'Router.php';
    //Get the request:
    if(isset($_GET['req'])) {
        // Find the route:
        $r = new Router(C_DEFAULT_CONTROLLER, C_DEFAULT_ACTION, $_GET['req']);
        // 
        echo $r;

        /*
        //Include config-files:
        include 'Model.php';
        include 'Controller.php';
        include 'View.php';
        //Get the requested controller:
        if(isset($_GET['c'] ) ) {
            //Include the security class:
            include 'lib/Security.php';       
            //Get the controller:
            $urlC = Security::cleanUrl( $_GET['c'] );     
            //Create the controller and modelpath: 
            $cPath = 'application/Controller/' . $urlC . 'Controller.php';
            $mPath = 'application/Model/' . substr($urlC , 0, -1) . '.php';
            //Check if valid path:
            if(is_file($cPath)) {
                include $cPath;
                include $mPath;  
                //Create the model:
                $model = substr($urlC , 0, -1);
                //Check for action:
                $action = 'index';
                if(isset($_GET['a']) ) {
                    $action = Security::cleanUrl($_GET['a']);
                }
                //Create the controller:
                $c = $urlC . 'Controller';
                $controller = new $c($urlC, $model, $action);
                //Check if the method exists:
                if(method_exists($controller, $action)) {
                    //Call on the controller-action:
                    $controller->$action();
                } else {
                    //Error, could not find the page:
                    echo "Error: 404. The requested page does not exist.";
                }
            } else {
                echo "Error 404. The requested part of the website does not exist.";
            }
        }  else {
            include 'application/Model/Dummy.php';
            include 'application/Controller/IndexController.php';
            //Create the objects:
            $model = new Dummy();
            $controller = new IndexController('index', $model, 'index');
            $controller->index();       
        }
    
    

    
    */
    
    }