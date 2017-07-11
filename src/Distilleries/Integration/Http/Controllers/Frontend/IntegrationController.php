<?php

namespace Distilleries\Integration\Http\Controllers\Frontend;

use Distilleries\Integration\Helpers\Integration;
use Illuminate\Routing\Controller as BaseController;

class IntegrationController extends BaseController
{

    /**
     * Show the application authenticated page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('integration::frontend.integration.links');
    }

    public function getComponentDetail($slug)
    {
        return view('integration::frontend.integration.components.component',['slug'=>$slug]);
    }

    public function getComponent()
    {

        $tabComponents = Integration::getComponentsFolderByDepth(config('integration.path_partial_component'));

        return view('integration::frontend.integration.components.components', compact('tabComponents'));
    }
}
