<?php
namespace App\Libraries;

/*
* Base Controller
* Loads the models and views
*/
abstract class Controller
{
    // Load and pass data to view
    public function view($view, $data = [])
    {
        // Check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }

    // Redirect to given url
    public function redirect($url = '')
    {
        header('Location: '. URLROOT . '/' . $url);
    }
}
