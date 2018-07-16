<?php


if (!function_exists('transformGetContentClass'))
{
    function transformGetContentClass($class, $path = null)
    {
        if (empty($path))
        {

            $path = rtrim(config('integration.path.transformer'), '/') . '/' . str_replace('\\', '/', $class) . '.php';
        } else
        {
            $path = $path . $class;
        }

        return app('files')->get($path);
    }
}

if (!function_exists('transform'))
{
    function transform($class, $object, $namespace = null)
    {

        if (empty($namespace))
        {
            $namespace = config('integration.namespace.transformer');
        }

        return app($namespace . $class)->transform($object);
    }
}

if (!function_exists('transformObject'))
{
    function transformObject($class, $object, $namespace = null)
    {
        if (empty($namespace))
        {
            $namespace = config('integration.namespace.transformer');
        }

        return app($namespace . $class)->transformObject($object);
    }
}

if (!function_exists('transformArray'))
{
    function transformArray($class, $object, $namespace = null)
    {
        if (empty($namespace))
        {
            $namespace = config('integration.namespace.transformer');
        }

        return app($namespace . $class)->transformArray($object);
    }
}