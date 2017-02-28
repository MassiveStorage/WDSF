<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace WDPS\Routes\Controller;

/**
 * Description of BaseSlide
 *
 * @author Admin
 */
class BaseSlide {
    protected $slideName;
    protected $url;
    protected $container;
    
    
    protected function setData($slideName, $url, \Interop\Container\ContainerInterface $container) {
        $this->slideName = $slideName;
        $this->url = $url;
        $this->container = $container;
    }
    
    public function setSlideName($slideName) {
        $this->slideName = $slideName;
    }
    
    public function setSlideURL($slideURL) {
        $this->url = $slideURL;
    }
    
    public function setContainer(Interop\Container\ContainerInterface $container) {
        $this->container = $container;
    }
    
    public function getSlideName() {
        return $this->slideName;
    }
    
    public function getSlideURL() {
        return $this->url;
    }
}
