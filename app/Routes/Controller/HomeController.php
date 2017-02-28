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

class HomeController {
    protected $container;
    
    function __construnct(Interop\Container\ContainerInterface $container) {
        $this->container = $container;
    }
    
    function home(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        return file_get_contents(__DIR__."/../../site/index.php");
    }
}
