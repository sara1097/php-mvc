<?php

class View{
    public static function load($view_name,$view_data=[]){
        $file= VIEWS.$view_name.'.php';
        if(file_exists($file)){
            //pass data from controller to views throw the params it sent in the view data
            extract($view_data);
            ob_start();
            require($file);
            ob_end_flush();
        }
        else{
            echo"this view is non availble";
        }
    }
}