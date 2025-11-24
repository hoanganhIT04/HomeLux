<?php

return [

    'paths' => ['*'],  // bật cors cho tất cả các route

    'allowed_methods' => ['*'], // cho phép tất cả method: GET, POST, PUT...

    'allowed_origins' => ['*'], // cho phép tất cả domain

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // cho phép tất cả header

    'exposed_headers' => false,

    'max_age' => 0,

    'supports_credentials' => false,

];
