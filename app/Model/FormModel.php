<?php
namespace App\Model;

use Core\Connection;

class FormModel
{
    private $name;
    private $email;
    private $phone;
    private $cover;
    private $resume;

    public function create()
    {
        $db = new Connection();
        $columns = 'name, email, phone, cover, resume';
        $values = "'$this->name', '$this->email', $this->phone, '$this->cover', '$this->resume'";
        $db->insert('form', $columns, $values);
        $db->get();
    }

    public function email($data)
    {
        $subject = 'the subject';
        $msg  = "<html>";
        $msg .= "<meta http-equiv=\"Content-Type\"  content=\"text/html charset=UTF-8\" />";
        $msg .= "<body style='font-family:Times New Roman,sans-serif;'>";
        $msg .= "<p style='font-weight:bold;'>Your form has been submitted, we will be contacting upon reading with and answer from us, thank you for your patience &#x1F60A;</p>\r\n";
        $msg .= "<h3 style='font-weight:bold;border-bottom:1px dotted #ccc; width: 20%;'>Job Application Submitted</h3>\r\n";
        $msg .= "<p><strong>Applicant Name:</strong> ".$data['name']."</p>\r\n";
        $msg .= "<p><strong>Email:</strong> ".$data['email']."</p>\r\n";
        $msg .= "<p><strong>Phone:</strong> ".$data['phone']."</p>\r\n";
        $msg .= "<p><strong>Cover Letter:</strong> ".$data['cover']."</p>\r\n";
        $msg .= "</body></html>";
        $headers = 'From: webmaster@example.com' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        //This makes that the html would be readable
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
        $recipient = $data['email'];
        if (mail($recipient, $subject, $msg, $headers)) {
           echo "<br>";
            echo "An email has been sent to " .$data['email'] . ' with confirmation of submitted form';
        }else {
             echo "Mail not sent";
        }
    }
    public function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param mixed $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

}