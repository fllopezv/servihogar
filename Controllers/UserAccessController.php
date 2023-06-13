<?php
require_once "Models/UserAccessModel.php";
require_once "Views/UserAccessView.php";

class UserAccessController
{
    function paginateUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();

        $array_user_access = $UserAccessModel->listUserAccess();
        $UserAccessView->paginateUserAccess($array_user_access);
    }

    function insertUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();

        $emp_documento = $_POST['emp_documento'];
        $acce_usuario = $_POST['acce_usuario'];
        $acce_contrasena = $_POST['acce_contrasena'];
        $acce_contrasena1 = $_POST['acce_contrasena1'];


        


        if (empty($emp_documento)) {
            $response = ["message" => 'FALTA EL DOCUMENTO'];
            exit(json_encode($response));
        }

        $array_user_access = $UserAccessModel->consultDocumentUserAccess($emp_documento);
        if($array_user_access){
            $response = ["message" => 'EL DOCUMENTO SE ENCUENTRA REGISTRADO EN LA TABLA DE ACCESO'];
            exit(json_encode($response));
          
        }


        if ($acce_contrasena != $acce_contrasena1) {
            $response = ["message" => 'LAS CONTRASEÑAS NO COINCIDEN'];
            exit(json_encode($response));
        }


        $UserAccessModel->insertUserAccess($emp_documento, $acce_usuario, $acce_contrasena);
        $array_user_access = $UserAccessModel->listUserAccess();
        $UserAccessView->paginateUserAccess($array_user_access);
    }

    function showUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();
        $emp_documento = $_POST['id'];
        $array_user_access = $UserAccessModel->selectAccessModel($emp_documento);
        $UserAccessView->showUserAccess($array_user_access);
    }

    function updateUserAccess()
    {
        $Connection = new Connection('sel');
        $UserAccessModel = new UserAccessModel($Connection);
        $UserAccessView = new UserAccessView();

        $emp_documento = $_POST['emp_documento'];
        $emp_documento1 = $_POST['emp_documento1'];
        $acce_usuario = $_POST['acce_usuario'];
        $acce_contrasena = $_POST['acce_contrasena'];

        if (empty($emp_documento) or empty($acce_usuario) or empty($acce_contrasena)) {
            $response = ["message" => 'FALTAN CAMPOS POR LLENAR'];
            exit(json_encode($response));
        }

        if ($emp_documento != $emp_documento1) {
            $array_user_access = $UserAccessModel->updateDocumentUserAccessRepeat($emp_documento);
            if ((($array_user_access))) {
                $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
                exit(json_encode($response));
            }
        }

       

        $array_user_access = $UserAccessModel->updateUserAccess($emp_documento, $emp_documento1, $acce_usuario, $acce_contrasena);
        $array_user_access = $UserAccessModel->listUserAccess();
        $UserAccessView->paginateUserAccess($array_user_access);
    }
}
