<?php
namespace App\Controller;

use App\Model\FormModel;
use App\Helper\Helper;
use Core\Controller;

class FormController extends Controller
{
    public function index()
    {
        $this->view->render('form');
    }
    public function store()
    {
       $html = '';
      //check if not submitted all the inputs and show empty or incorrect fields
       $checked = Helper::inputsCheck($_POST);
        if (!empty($checked) OR empty($_FILES['resume']['name'])){
           foreach ($checked as $error) {
              $html .= "<p class='error'>Required field $error</p>";
              $this->view->html = $html;
           }
           if (empty($_FILES['resume']['name'])) {
              $html .= "<p class='error'>Required field image</p>";
           }
           $this->view->message = $html;
           $this->view->message2 = $checked;
           $this->view->data = $_POST;
           $this->view->render('form');
        }else {
            $resume = $_FILES;
            $validator = new Helper;
            $imageChecker = $validator->validateImage($resume);
//            debug($imageChecker);
            if (!empty($imageChecker)){
               $html = '';
               $this->view->imageFail = $imageChecker;
               $this->view->render('form');
               echo $html;
            }else{
               $newEntry = new FormModel();
               $newEntry->setName($_POST['name']);
               $newEntry->setEmail($_POST['email']);
               $newEntry->setPhone($_POST['phone']);
               $newEntry->setCover($_POST['cover']);
               $newEntry->setResume($_FILES['resume']['name']);
               $newEntry->create();
               $html = '';
               $html .= 'Form submitted';
               echo $html;
               $newEntry->email($_POST);
               return $this->view->render('form');
            }

        }
    }
//
//    public function show()
//    {
//        $lastEntry = new FormModel();
//        $lastEntry->last();
//        return $this->view->render('formSubmitted');
//    }
}