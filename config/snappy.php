<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => env('WKHTMLTOPDF_PATH'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => env('WKHTMLTOIMAGE_PATH'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
