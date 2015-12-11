<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Annahar
 *
 * @author haroon.shah
 */
class Annahar extends Channel{
    public $url;
    public $request;
    
    public function __construct($url) {
        $this->url = $url;
    }
    
}
