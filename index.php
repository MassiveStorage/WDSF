<?php
    require_once(__DIR__.'/vendor/autoload.php');
    
    $app = new Slim\App(array(
        'mode' => 'development',
        'debug' => true,
        //'view' => '',
    ));
    
    $container = $app->getContainer();
    
    $slideManager = WDPS\SlideManager\SlideManager::getInstance();
    
    $slideManager->registerSlide(new WDPS\Routes\Controller\Slides\Slide1($app->getContainer()), $app);
    $slideManager->registerSlide(new WDPS\Routes\Controller\Slides\Slide2($app->getContainer()), $app);
    $slideManager->registerSlide(new WDPS\Routes\Controller\Slides\Slide3($app->getContainer()), $app);
    
    $app->get('/', WDPS\Routes\Controller\HomeController::class.":home");
    $app->get('/getSlideList', WDPS\Routes\Controller\SlideController::class.":getSlideList");
        
    $app->run();
    