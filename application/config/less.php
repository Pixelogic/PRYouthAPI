<?php

return array(
 /*   'directories' => array(
        '/your/less/path' => '/your/css/path',
        ...
    ),*/
    'files' => array(
        path("public") . '/css/less/main.less' =>  path("public") . '/css/style.css',
        //path("public") . '/css/less/main_mobile.less' =>  path("public") . '/css/fb.css',
    ),
/*    'snippets' => array(
        '#custom_id { a {color:red;} }' => '/your/snippet/file.css',
        ...
    ),*/
    'formatter' => 'compressed',
    'preserveComments' => false,
/*    'variables' => array(
        'color' => 'red',
        'base'  => '960px',
    ),*/
    'recompile' => false,
);