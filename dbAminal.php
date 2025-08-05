<?php






if(filter_has_var(INPUT_POST,"btnGravar")){
    spl_autoload_register(function($class) {
        require_once "classes/{$class}.class.php";
    });

    $animal = new Animal();
    
}