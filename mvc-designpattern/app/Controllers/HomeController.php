<?php 
class HomeController{
    public function index(){
        echo"this is ". __CLASS__ ." methde is " . __METHOD__;
        // require_once(VIEWS.'home.php');

        //dynamically through View file in core
        //View::load('home');
        //view with data



        // $data['title']='home';
        // $data['content']='content of home hello';
        // View::load('home',$data);


        View::load('home');

    }
}