<?php

    $params = explode('/', $_GET['url']);
    $controller = array_shift($params);
    
    include ('./controller/'.$controller.'.php');
    $ret = handle($params);
    
    extract($ret);
    include ('./views/'.$controller.'.php');

?>