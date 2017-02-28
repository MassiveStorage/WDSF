<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlideManager
 *
 * @author Admin
 */
namespace WDPS\SlideManager;

class SlideManager {
    private static $instance = null;
    private $slides = array();
    
    private function __construct() {
        
    }
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function registerSlide($slide, \Slim\App $app) {
        $this->slides[count($this->slides)] = $slide;
        $app->get($slide->getSlideURL(), array($slide, "home"));
    }
    
    public function getSlideURLS() {
        $result = array();
        foreach($this->slides as $slide) {
            $result[count($result)] = $slide->getSlideURL();
        }
        return $result;
    }
}
