<?php
namespace App\Controllers;

class Visitors extends \App\Libraries\Controller
{
    public function __construct()
    {
        $this->visitorModel = new \App\Models\Visitor;
    }

    // Show initial page with form
    public function index()
    {
        $this->view('welcome');
    }

    // Handle form for entering visitor name
    public function show()
    {
        $input = $_POST['visitor-name'];

        // Make sure input is not empty
        if (isset($input) && trim($input) !== '') {
            $sanitizedInput = \App\Utils\sanitizeInput($input);

            $visitor = $this->get($sanitizedInput);

            // If visitor was found set visitor-name, else create new visitor then set visitor-name
            if (isset($visitor)) {
                $data['visitor-name'] = $visitor->name;
                // TODO: Add 'Welcome Back' greeting when visitor already exists.
            } else {
                $this->create($sanitizedInput);
    
                $newVisitor = $this->get($sanitizedInput);
    
                $data['visitor-name'] = $newVisitor->name;
            }
        } else {
            $data['validation-error'] = 'Vänligen skriv in ett giltigt namn';
        }
        $this->view('welcome', $data);
    }

    // Create a new visitor by name
    public function create($input)
    {
        // Returns false if validation fails or creation was not successful
        if (isset($input) && trim($input) !== '') {
            $name = \App\Utils\sanitizeInput($input);

            return $success = $this->visitorModel->createVisitor($name);    // Either true or false
        } else {
            return false;
        }
    }

    // Get a specific visitor by name
    public function get($name)
    {
        $visitor = $this->visitorModel->getVisitor($name);

        if (isset($visitor)) {
            return $visitor;
        } else {
            return null;
        }
    }

    // Todo: Delete visitor method
}
