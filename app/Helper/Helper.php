<?php
namespace App\Helper;

class Helper
{
//   private $error = '';

    public function getController($path)
    {
        $controller = strtolower($path);
        $controller = ucfirst($controller);
        $controller = "App\Controller\\" . $controller . "Controller";
        return $controller;
    }

    public static function inputsCheck($arrayInputs)
    {
       $error = [];
      foreach ($arrayInputs as $input => $value){
         if (empty($value)){
            array_push($error, $input);
         }
      }
      return $error;
    }
    public static function validateImage($image)
    {
       $error = [];
       $html = '';
        if (empty($_FILES)){
           $html .= 'Field file is required';
           array_push($error, $html);
           return $html;
        }else {
           $size = ($image['resume']['size']);
           $max_size = 30000;
           if ($size > $max_size) {
              $html = '';
              $html .= "File size is too big";
              array_push($error, $html);
           }
           $acceptedExtensions = ['jpg','png','txt'];
           $resume = ($_FILES['resume']['name']);
           $extension = strtolower(substr($resume, strpos($resume, '.') + 1));
//           strpos(original_str, search_str, start_pos)
//           substr(string_name, start_position, string_length_to_cut)
           if (!in_array($extension, $acceptedExtensions)){
              $html = '';
              $html .= 'Image file type is not allowed';
              array_push($error, $html);
           }

        }
       return $error;
    }
}