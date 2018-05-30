[![Total Downloads](https://poser.pugx.org/distilleries/integration/downloads)](https://packagist.org/packages/distilleries/integration)
[![Latest Stable Version](https://poser.pugx.org/distilleries/integration/version)](https://packagist.org/packages/distilleries/integration)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE) 

#Integration

Integration is package to work with frontend developer. 

## Table of contents



##Installation
Auto detect package has been set on this release.
Add on your composer.json

``` json
    "require": {
        "distilleries/integration": "1.*",
    }
```

run `composer update`.



Add Service provider to `config/app.php`:

``` php
    'providers' => [
        
        /*
         * Package Service Providers...
         */
        Distilleries\Integration\IntegrationServiceProvider::class,


    ]
```


##Configurations

```php
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
```

Field | Usage
----- | -----
path_partial_component | Path where to load partial component
controller | Controller and methode use to get detail iframe
prefix_uri | Uri prefix for integration route
disabled | Disable the integration generation
pages | Table of static page


##Usage 

```blade
    @component('frontend.components.forms.buttons',transform('Forms\ButtonsTransformer', [
        'type' => 'submit',
        'background' => '',
        'border' => 'border-enabled',
        'text_color' => 'text-grey',
        'size' => 'small'
     ]))
        @slot('label')
            EDIT
        @endslot
       
    @endcomponent
```