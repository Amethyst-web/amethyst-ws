<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 29.11.2015
 * Time: 20:31
 */

namespace core\modules\routing;

use core\modules\routing\Route;
use Exception;
use PHPRouter\RouteCollection;
use PHPRouter\Router;
//use PHPRouter\Route;
use Symfony\Component\Yaml\Yaml;

class Routing
{
    private $routes;
    private $routeCollection;

    function __construct(){
        $this->loadRoutes();
    }

    private function loadRoutes(){
        $bundlesDir = $_SERVER['DOCUMENT_ROOT'].'/../bundles';
        $configDir = 'config';
        $routesFile = 'routing.yml';
        $bundles = scandir($bundlesDir);
        unset($bundles[0], $bundles[1]);
        $this->routes = [];
        foreach($bundles as $bundle){
            $bundleDirs = scandir("$bundlesDir/$bundle", 1);
            if(in_array($configDir, $bundleDirs)){
                $configFiles = scandir("$bundlesDir/$bundle/$configDir", 1);
                if(in_array($routesFile, $configFiles)){
                    $this->routes[$bundle] = Yaml::parse(file_get_contents("$bundlesDir/$bundle/$configDir/$routesFile"));
                }
            }
        }
        $coreRouting = $_SERVER['DOCUMENT_ROOT'].'/../config/routing.yml';
        if(file_exists($coreRouting)){
            $this->routes['main'] = Yaml::parse(file_get_contents($coreRouting));
        }

        $this->loadCollection();
    }

    private function loadCollection(){
        $this->routeCollection = new RouteCollection();
        foreach($this->routes as $bundle => $route){
            $basePath = isset($route['basePath']) ? $route['basePath'] : '';
            foreach($route['routes'] as $routeName => $routeInfo){
                $this->routeCollection->attachRoute(new Route($basePath.$routeInfo['path'], [
                    'namespace' => !isset($route['namespace']) ||
                                    isset($routeInfo['use_namespace']) &&
                                    $routeInfo['use_namespace'] == 'false' ? '' : $route['namespace'],
                    'bundle' => $bundle,
                    '_controller' => $routeInfo['controller'],
                    'methods' => isset($routeInfo['methods']) ? $routeInfo['methods'] : 'GET, POST',
                    'name' => $routeName
                ]));
            }
        }
    }

    public function checkPath(){
        return (new Router($this->routeCollection))->matchCurrentRequest();
    }

    public function getPath($bundleName, $routeName){
        if(!isset($this->routes[$bundleName], $this->routes[$bundleName]['routes'][$routeName])){
            throw new Exception('Такого роута не существует');
        }
        return $this->routes[$bundleName]['routes'][$routeName]['path'];
    }

    public function goToRoute($bundleName, $routeName){
        static::redirect($this->getPath($bundleName, $routeName));
    }

    public static function redirect($link){
        header('Location: '.$link);
        exit;
    }
}