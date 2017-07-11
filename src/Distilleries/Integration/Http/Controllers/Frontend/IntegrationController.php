<?php

namespace Distilleries\Integration\Http\Controllers\Frontend;

use Distilleries\Integration\Helpers\Integration;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

class IntegrationController extends BaseController
{

    public function getComponentDetail($slug)
    {
        return view('integration::frontend.integration.components.component',['slug'=>$slug]);
    }

    public function getComponent()
    {

        $tabComponents = Integration::getComponentsFolderByDepth(config('integration.path_partial_component'));

        return view('integration::frontend.integration.components.components', compact('tabComponents'));
    }

    public function getPageListe(){
        $tabOfPages = config('integration.pages');
        return view('integration::frontend.integration.pages', compact('tabOfPages'));
    }

    public function getPage($slug){

        $page = (new Collection(config('integration.pages')))
                    ->filter(function ($item, $key) use($slug) {
                        return $item['slug']  == $slug;
                    })
                    ->first();

        if(empty($page)){
            abort(404);
        }
        return view($page['view']);
    }
}
