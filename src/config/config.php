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
            'view'=>'integration::frontend.pages.faq',
        ]
    ]
];