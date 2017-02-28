<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author Admin
 */
namespace WDPS\Routes\Controller;

class SlideController {
    protected $container;
    private $slideController;
    function __construnct(\Interop\Container\ContainerInterface $container) {
        $this->container = $container;
        $this->slideController = WDPS\SlideManager\SlideManager::getSlideManager();
    }
    
    function getSlideList(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        $slideManager = \WDPS\SlideManager\SlideManager::getInstance();
        //var_dump($slideManager->getSlideURLS());
        return json_encode(array("data" =>$slideManager->getSlideURLS()));
    }
}
