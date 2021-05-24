<?php
    
    Class Conexion{

        static public function conectar(){
    
            $link = new PDO("mysql:host=localhost;dbname=tchncdrs", 
                            "root", 
                            ""  
                            );
            $link->exec("set names utf8");
            return $link;
        
        }
    
    
    }

    // $con = mysqli_connect("localhost", "root", "" , "tchncdrs");
    
    
