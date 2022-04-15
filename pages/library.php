<?php
    function isLoged(){
        return (isset($_SESSION["username"]))  && (isset($_SESSION["password"]));
    }
?>