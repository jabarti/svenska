<?php

/* * **************************************************
 * Project:     Svenska
 * Filename:    User.class.php
 * Encoding:    UTF-8
 * Created:     2014-07-11, 01:41:29
 *
 * Author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */

class User {
    
    private $id;
    private $user;
    private $password;
    private $data;
    
    function __construct($user, $password) {
        $this->user = $user;
        $this->password = $password;
        $this->data = $this->setData();
        
        echo "<br>User: ".$this->user;
        echo "<br>pass: ".$this->password;
        echo "<br>data: ".$this->data;
        
        
    }
    
    private function setData(){
        $t=time();

        return date("Y-m-d, H:i:s",$t);
    }

}
