<?php
namespace App\Controllers;

class Visitors extends \App\Libraries\Controller
{
    public function __construct()
    {
        session_start();
        $this->visitorModel = new \App\Models\Visitor;
    }

    // Show initial page with form
    public function index()
    {
        $data = [];

        if (isset($_SESSION['message'])) {
            $data['message'] = $_SESSION['message'];
            
            unset($_SESSION['message']);
        }
        $this->view('welcome', $data);
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
                $data['visitor'] = $visitor;
                $data['greeting'] = "Välkommen tillbaka {$data['visitor']->name}!";
            } else {
                $this->create($sanitizedInput);
                
                $newVisitor = $this->get($sanitizedInput);

                $data['visitor'] = $newVisitor;
                $data['greeting'] = "Välkommen {$data['visitor']->name}!";
            }
        } else {
            $_SESSION['message'] = 'Ogiltigt namn, försök igen';
            $this->redirect();
        }
        $this->view('welcome', $data);
    }

    // Create a new visitor by name
    public function create($input)
    {
        // Returns false if validation fails or creation was not successful
        if (isset($input) && trim($input) !== '') {
            return $success = $this->visitorModel->createVisitor($input);    // Either true or false
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
    public function delete($id)
    {
        $success = $this->visitorModel->deleteVisitor($id);
        var_dump($success);
        if ($success) {
            $_SESSION['message'] = 'Användare borttagen!';
            $this->redirect();
        } else {
            $data['message'] = 'Ett fel uppstod, kunde inte radera användare';
        }
    }
}
