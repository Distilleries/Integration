<?php

namespace Distilleries\Integration\Helpers;

use Illuminate\Support\Str;
use PhpParser\Error;
use PhpParser\Node\Stmt\Class_;
use PhpParser\ParserFactory;

/**
 * Created by PhpStorm.
 * User: mfrancois
 * Date: 21/06/2017
 * Time: 11:41
 */
class Integration
{


    public static function getComponentsFolderByDepth($folders)
    {
        $files     = app('files');
        $childrens = $files->directories($folders);
        $parent    = [];

        if (!empty($childrens)) {
            foreach ($childrens as $children) {

                $names    = explode(DIRECTORY_SEPARATOR, $children);
                $parent[] = [
                    'title'    => last($names),
                    'children' => self::getComponentsFileByDepth($children)
                ];
            }
        }


        return $parent;
    }

    public static function getComponentsFileByDepth($folders)
    {
        $files     = app('files');
        $childrens = $files->files($folders);

        $result = [];

        if (!empty($childrens)) {
            foreach ($childrens as $child) {
                $names    = explode(DIRECTORY_SEPARATOR, $child);
                $template = str_replace('.blade.php', '', str_replace(resource_path('views/'), '', $child));
                $content  = $files->get($child);
                $phpdoc  = '';
                $matches  = [];
                preg_match('/transform\(\s*([^)]+?)\s*\)/', $content, $matches);


                if (!empty($matches) && is_array($matches)) {
                    foreach ($matches as $match) {
                        if (!Str::contains($match, 'transform(')) {

                            $match = explode(',', $match);
                            $phpdoc .= self::getTransformerContent(Str::substr($match[0], 1, strlen($match[0]) - 2));
                        }
                    }
                }

                $result[] = [
                    'title'    => str_replace('.blade.php', '', last($names)),
                    'url'      => action(config('integration.controller'), ['slug' => str_replace('/', '.', str_replace('.blade.php', '', $template))]),
                    'template' => $template,
                    'doc'      => $content,
                    'phpdoc'   => $phpdoc
                ];
            }
        }

        return $result;
    }

    public static function getTransformerContent($transformer)
    {
        $code          = transformGetContentClass($transformer);
        $parser        = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $prettyPrinter = new ArrayPrettyPrinter();

        try {
            $stmts = $parser->parse($code);

            $code  = '';
            foreach ($stmts[0]->stmts as $stmt) {
                if ($stmt instanceof Class_) {
                    $code = $prettyPrinter->prettyPrint($stmt->stmts);
                    break;
                }
            }

        } catch (Error $e) {

            $code = '';
        }

        return $code;
    }


}