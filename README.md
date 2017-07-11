[![Total Downloads](https://poser.pugx.org/distilleries/integration/downloads)](https://packagist.org/packages/distilleries/integration)
[![Latest Stable Version](https://poser.pugx.org/distilleries/integration/version)](https://packagist.org/packages/distilleries/integration)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE) 

#Integration

Integration is package to work with frontend developer. 

## Table of contents
1. [Require](#require)
1. [Installation](#installation)
1. [Configurations](#configurations)
1. [Menu](#menu)
1. [State](#state)
    1. [Datatable](#1-datatable)
    1. [Export](#2-export)
    1. [Import](#3-import)
    1. [Form](#4-form)
    1. [Form](#4-form)
1. [Component](#component)
    1. [Admin BaseComponent](#admin-basecomponent)
    1. [Admin ModelBaseController](#admin-modelbasecontroller)
    1. [AdminBaseController](#admin-basecontroller)
1. [Model](#model)
1. [Global scope](#global-scope)
    1. [Status](#status)
1. [Permissions](#permissions)
1. [Views](#views)
1. [Assets (CSS and Javascript)](#assets-css-and-javascript)
    1. [Sass](#sass)
    1. [Images](#images)
    1. [Javascript](#javascript)
    1. [Gulp](#gulp)
1. [Create a new backend module](#create-a-new-backend-module)
1. [Case studies](#case-studies)
    1. [Generate your migration](#1-generate-your-migration)
    1. [Generate your model](#2-generate-your-model)
    1. [Generate you component](#3-generate-you-component)
    1. [Add your controller in the routes file](#4-add-your-controller-in-the-routes-file)
    1. [Add to the menu](#5-add-to-the-menu)



##Installation

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
        Distilleries\Integration\IntegrationRouteServiceProvider::class,


    ]
```


##Configurations

```php
    return [
        'path_partial_component' => resource_path('views/frontend/integration/components/partials'),
        'controller'             => '\Distilleries\Integration\Http\Controllers\Frontend\IntegrationController@getComponentDetail',
        'prefix_uri'             => 'integration',
        'disabled'               => false,
    ];
```

Field | Usage
----- | -----
path_partial_component | Path where to load partial component
controller | Controller and methode use to get detail iframe
prefix_uri | Uri prefix for integration route
disabled | Disable the integration generation


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