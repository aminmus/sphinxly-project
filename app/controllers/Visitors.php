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
        $data = [
            // TODO: Change this to instead get visitor name from DB
            'visitor' => isset($_POST['visitor-name']) ? $_POST['visitor-name'] : null,
            'tablename' => $this->visitorModel->findOne(),
        ];

        $this->view('welcome', $data);
    }
}
