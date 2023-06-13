<?php
require_once "Models/AccessModel.php";
require_once "Views/AccessView.php";

class AccessController
{
    function validateClient()
    {
        $AccesView = new AccessView();
        $AccesView->showFormSession();
    }

    function validateFormSession($array)
    {
        $Connection=new Connection('sel');
        $AccessModel=new AccessModel($Connection);
         
        $email=$array['usuario'];
        $password=$array['password'];

        


        $array_access=$AccessModel->validateFormSession($email,$password);

        if($array_access)
        {
            $_SESSION['acce_documento']=$array_access[0]->emp_documento;
            $_SESSION['auth']='OK';
            $_SESSION['acce_usuario']=$array_access[0]->acce_usuario;
        }
        header('Location: index.php');

    }

    function closeSession()
    {
        $response=array();
        
        session_unset();
        session_destroy();
        $_SESSION = array();
        $response['message']="Que tenga un buen día";
        exit(json_encode($response));
        
    }
}
