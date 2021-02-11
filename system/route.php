<?php

namespace system;

class Route {
    protected static $singleton;
    private $route;

    public function __construct() {
        $this->route = [];
    }

    public static function getSingleton() {
        if (static::$singleton == null) {
            static::$singleton = new Route();
        }

        return static::$singleton;
    }

    private function httpMethod(string $url, string $function, string $method) {
        $route = [];
        
        if (isset($this->route["/".$url])) {
            $route = $this->route["/".$url];
        } 

        $route["method"][$method] = $function;

        $this->route["/".$url] = $route;
    }

    public function get(string $url, string $function) {
        return $this->httpMethod($url, $function, "GET");
    }

    public function post(string $url, string $function) {
        return $this->httpMethod($url, $function, "POST");
    }

    public function checkRoute() {
        $url = $_SERVER["PATH_INFO"];
        if ($url[0])
        $url = \explode("/", $url); 
        $method = $_SERVER["REQUEST_METHOD"];

        foreach($this->route as $key => $r) {
            $routeUrl = \explode("/", $key);
            $check = true; $params = [];
            
            if (count($routeUrl) == \count($url)) {
                for ($i=0; $i < count($routeUrl); $i++) {
                    if (\strpos($routeUrl[$i],"{") !== false) {
                        $arg = \substr($routeUrl[$i], 1, \strlen($routeUrl[$i]));
                        $params[$arg] = $url[$i];
                        continue;
                    }                        
                    
                    if ($routeUrl[$i] != $url[$i]) 
                        $check = false;
                }
                
                if ($check == false) continue;

            } else {
                continue; // Next iteration
            }
            
            if (isset($r["method"][$method])) {
                $class = "controller\\".\explode(".", $r["method"][$method])[0];
                $function = \explode(".", $r["method"][$method])[1];
                $obj = new $class;
                \call_user_func_array([$obj, $function], $params);
                exit; // Stop after function done
            } else {
                \http_response_code(404);
                echo "Oops method: $method not found for {$_SERVER["PATH_INFO"]}!";        
                exit;
            }
        }

        \http_response_code(404);
        echo "Oops no page found!";
    }
}