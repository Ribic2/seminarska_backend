<?php

namespace App\Router;

class Router{

    public array $routes = [];

    /**
     * Before insert new route into routes check if 
     * it already exists
     * @param string $method
     * @param string $route
     * @return void
     */
    public function checkRoute(string $method, string $route): bool
    {
        // Loops throguh array and checks if given
        // combination exists
        // if it does it returns false otherwise it return true

        foreach($this->routes as $value){
            if($value["path"] == $route && $value["method"] == $method)
                return true;
        }
        return false;
    }

    // HTTP methods handlers

    public function get(string $path, array $callback)
    {
        if($this->checkRoute("GET", $path)){
            die("Error! Route already exists");
        }
        array_push($this->routes, [
            "path"=> $path, 
            "method" => "GET",
            "callback" => $callback
        ]);
    }

    public function post(string $path){
        if($this->checkRoute("POST", $path)){
            die("Error! Route already exists");
        }
        array_push($this->routes, [
            "path"=> $path, 
            "method" => "POST"
        ]);
    }
    
    public function delete(string $path){
        if($this->checkRoute("DELETE", $path)){
            die("Error! Route already exists");
        }
        array_push($this->routes, [
            "path"=> $path, 
            "method" => "DELETE"
        ]);
    }

    public function update(string $path){
        if($this->checkRoute("UPDATE", $path)){
            die("Error! Route already exists");
        }
        array_push($this->routes, [
            "path"=> $path, 
            "method" => "UPDATE"
        ]);
    }
    /**
     * Returns route and it's data
     * @param string $method
     * @param string $route
     * @return void
     */
    public function load(string $path, string $method)
    {
        // Calls callback function if path is found
        foreach($this->routes as $route){
            if($route["method"] == $method && $route["path"] == $path){
                return call_user_func($route["callback"]);
            }
        }
        
        // If route was found it returns error
        http_response_code(404);
        die("Route was not found!");
        
    }
}