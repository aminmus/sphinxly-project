<?php
namespace App\Controllers;

class Main extends \App\Libraries\Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            // TODO: Change this to instead get visitor name from DB
            'visitor' => isset($_POST['visitor-name']) ? $_POST['visitor-name'] : null,
        ];

        $this->view('main', $data);
    }
}
