<?php
//front end controller 

class App{
    protected $controller ="HomeController";
    protected $action ="index";
    Protected $params =[]; 
    public function __construct()
    {
        //هنا بنفصل
    //    $url =$_SERVER['QUERY_STRING'];
    //    $url= explode("/",$url);
    //    var_dump($url);
    //    echo $url[0];



        // $url =$_SERVER['QUERY_STRING'];    
        // if(!empty($url)){
        //     $url= trim($url,"/");
        //     $url= explode("/",$url);
        //     //define the controller 
        //     $this->controller=isset($url[0]) ? ucwords($url[0])."Controller" : "HomeController";

        //     //define the action
        //     $this->action =isset($url[1]) ? $url[1]: "index";
        //     unset($url[0],$url[1]);
        //     $this->params = !empty($url) ? array_values($url):[];

        //}

        //extract controller , action and parameters
        $this->PrepairURL();
        $this->render();
    }


    public function PrepairURL(){
        $url =$_SERVER['QUERY_STRING'];    
        if(!empty($url)){
            $url= trim($url,"/");
            $url= explode("/",$url);
            //define the controller 
            $this->controller=isset($url[0]) ? ucwords($url[0])."Controller" : "HomeController";

            //define the action
            $this->action =isset($url[1]) ? $url[1]: "index";
            unset($url[0],$url[1]);
            $this->params = !empty($url) ? array_values($url):[];

        }
    }
    private function render(){
        if (class_exists($this->controller)){
           // echo"exist";
            $controller = new $this->controller;
            if(method_exists($controller,$this->action)){
               // echo "exist";
                call_user_func_array([$controller,$this->action],$this->params);
            }
            else{
                echo"this action ". $this->action . " not exist";
            }
        }
        else{
            echo"this controller ". $this->controller . " not exist";
        }
    }
    
}