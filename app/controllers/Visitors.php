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

    public function add()
    {
        $name = $_POST['visitor-name'];

        if (isset($name) && trim($name) !== '') {
            $name = \App\Utils\sanitizeInput($name);
            
            $result = $this->visitorModel->getVisitor($name);

            if ($result) {
                $data['visitor-name'] = $result->name;
            } else {
                //TODO: Create a new visitor in DB
            }
        } else {
            $data['validation-error'] = 'Vänligen skriv in ett giltigt namn';
        }

        $this->view('welcome', $data);
    }
}
