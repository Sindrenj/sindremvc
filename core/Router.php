<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Route.php will parse the url, to find the correct 
 * Controller and Action.
 *
 * @author Sindre
 */
class Router {
    //The default controller(If none is submitted):
    private $defaultC;
    //The default action:
    private $defaultA;
    //The URL(Request from the user)
    private $request;
    //The requested Controller:
    private $controller;
    //The model:
    private $model;
    //The requested action:
    private $action;
    //The parameters:
    private $params = null;
    
    public function __construct($defaultC, $defaultA, $input) {
        //Clean the url:
        $url = Security::cleanUrl($input);
        //Assign values:
        $this->defaultC = strtolower($defaultC);
        $this->defaultA = strtolower($defaultA);
        //Get the request from the url:
        $this->request = strtoLower($url);
        //Find the requested controller and action:
        $this->parseRoute();
    }
    
    
    /**
     * parseRoute()
     * This function will find the correct 
     * controller and action. 
     */
    private function parseRoute() {
        //Check if any controllers/actions is specified
        if(!isset($this->request) || empty($this->request)) {
            
            $this->controller = ucfirst($this->defaultC);
            $this->action = $this->defaultA;
            
        } else { //A controller is specified:         
          $req = explode('/', $this->request);
          //Get the controller:
          $this->controller = ucfirst($req[0]);
          array_shift($req);
          //Check if any action is specified:
          if(isset($req[0]) && !empty($req[0])) { //Get the action:
            //Get the action:
            $this->action = $req[0];
            //Remove this index:
            array_shift($req);
            //Only params left:
            if(isset($req[0])) { //Get the params:
                $this->params = $req;
            }
          } else  {// NO action specified. Use default
            $this->action = $this->defaultA;
          }
        }
    }
    
    public function getController() {
        return $this->controller;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getParams() {
        return $this->params;
    }
    
    public function __toString() {
        return 'The url: <b>' . $this->request . 
           '</b>, The model: <b>' . $this->model .
           '</b>, the controller: <b>' . $this->controller . 
           '</b>, the action: <b>' . $this->action . 
           '</b>, number of params: ' . count($this->params);
    }
}

?>
