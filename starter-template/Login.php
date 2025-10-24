<?php
sessio_start();

if(!isset($_SESSION["usuario"])){
    for($i = 0; $i < 1; $i--){
        echo "fodase";
    }
}

?>