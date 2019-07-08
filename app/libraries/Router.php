<?php
namespace App\Libraries;

/*
* Router Class
* Creates URL & loads controllers
* URL Format - /controller/method
*/

class Router
{
    protected $currentController = 'Main';
    protected $currentMethod = 'index';

    public function __construct()
    {
        $url = $this->getUrl();

        // Look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($url[0]). '.php')) {
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/'. $this->currentController . '.php';
        
        // Add prepend namespace to controller
        $namespacedController = "\\App\\Controllers\\{$this->currentController}";

        // Instantiate controller class
        $this->currentController = new $namespacedController;

        // Check for second part of url
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Call controller method as callback
        call_user_func([$this->currentController, $this->currentMethod]);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
