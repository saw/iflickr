<?php

include 'classes.php';

$requestedURI =  preg_replace('/\?(.+)?/','', $_SERVER["REQUEST_URI"]);


$map = array(
    '/' => 'index',
    '/test' => 'test'
);

if($map[$requestedURI]){
    $page = pageFactory::getPage($map[$requestedURI]);
    $page->render();
}else{
    header("HTTP/1.1 404 Not Found");
    echo('<html><head><title>404 Not found</title></head><body>');
    echo('no page');
    echo('</body></html');
}

?>