<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import
 *
 * @author haroon.shah
 */
class Import {
    
    public static function classes($clsName){
        
        echo PHP . DS . $clsName . '.php';
        
        return include PHP . DS . 'classes' . DS . $clsName . '.php';
        
    }
}
