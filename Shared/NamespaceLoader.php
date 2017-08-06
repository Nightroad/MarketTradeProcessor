<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 31.07.17
 * Time: 21:09
 */

class NamespaceLoader
{

    private static $map = array();

    private static function getRootFromClass($class)
    {
        return substr($class, 0, strpos($class, "\\"));
    }

    private static function getMappingFromClass($class)
    {
        $root = self::getRootFromClass($class);
        foreach(self::$map as $mapArray)
        {
            if ($mapArray['namespace'] == $root)
                return $mapArray;
        }

        return false;
    }

    public static function register($rootDirectory, $rootNamespace)
    {
        self::$map[] = array(
            'directory' => $rootDirectory,
            'namespace' => $rootNamespace,
        );
    }

    public static function load($class)
    {
        if (false !== ($mapArray = self::getMappingFromClass($class)))
        {
            $parts = explode('\\', $class);
            $parts[0] = $mapArray['directory'];
            $real_path = join(DIRECTORY_SEPARATOR, $parts) . '.php';

            if(file_exists($real_path))
            {
                require_once $real_path;
                return true;
            }

            return false;
        }
        return false;
    }

}

spl_autoload_register('NamespaceLoader::load');