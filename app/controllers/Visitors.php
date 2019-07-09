<?php
namespace App\Controllers;

class Visitors extends \App\Libraries\Controller
{
    public function __construct()
    {
        $this->visitorModel = new \App\Models\Visitor;
    }

    public function index()
    {
        $this->view('welcome');
    }
}
