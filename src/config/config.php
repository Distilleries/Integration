<?php

return [
    'path_partial_component' => resource_path('views/frontend/integration/components/partials'),
    'controller'             => '\Distilleries\Integration\Http\Controllers\Frontend\IntegrationController@getComponentDetail',
    'prefix_uri'             => 'integration',
    'disabled'               => false,
    'pages'=>[
        [
            'name'=>'Page FAQ Example',
            'slug'=>'faq',
            'status'=>'done', //done,in_progress,todo
            'view'=>'integration::frontend.integration.pages.faq',
        ]
    ]
];