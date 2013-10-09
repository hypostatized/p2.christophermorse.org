<?php

class practice_controller extends base_controller {
    
    public function test() {
        
        require(APP_PATH.'/libraries/class_image.php');
        
        $imageObj = new Image('http://www.placekitten.com/1000/1000');
        
        $imageObj->resize(200,200);
        
        $imageObj->display();
        
    }