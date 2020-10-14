<?php

namespace Controller;

use Utils\OperationResult;
use Model\Admin;

class AdminController
{


    private $adminModel;
    private $username;
    private $password;
    private $password_confirm;
    private $nickname;
    private $validInput;
    private $added_by;

    function __construct($username = "", $nickname = "", $password = "", $password_confirm = "", $added_by = "")
    {
        $this->added_by = $added_by;
        $this->validInput = true;
        $this->username = $username;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }

    public function deleteAdmin($id, $adminUsername)
    {

        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        $this->adminModel = new Admin();
        if ($id == "") {
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("admin não identificável, faltam parâmetros.");
            $errorHandler->renderResult();
        }
        //você só pode deletar admins que VOCÊ mesmo registrou.
        else if (!$this->adminModel->hasRegistered($id, $adminUsername)) {
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Operação negada, você não registrou este adminstrador para poder retirar o mesmo.");
            $errorHandler->renderResult();
        } else {

            $result = $this->adminModel->deleteAdmin($id);
            if (!$result) {
                $errorHandler->setSuccess(false);
                $errorHandler->addMessage("admin não encontrado, verifique se os dados estão de acordo.");
                $errorHandler->renderResult();
            } else {
                $errorHandler->addMessage("admin deletado com sucesso.");
                $errorHandler->renderResult();
            }
        }
    }
    public function getAdmins()
    {
        $this->adminModel = new Admin();
        return $this->adminModel->getAdmins();
    }

    public function getAdmin($username){
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        $this->adminModel = new Admin();
        $result = $this->adminModel->getAdmin($username);
        if(!isset($result['username'])){
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Admin não encontrado.");
            $errorHandler->renderResult();
            exit;
        }else{
            return $result;
        }
    }
    public function login()
    {
        $this->adminModel = new Admin($this->username, $this->password);
        return $this->adminModel->login();
    }

    public function loginFailed()
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        $errorHandler->setSuccess(false);
        $errorHandler->addMessage("Os dados não estão corretos, favor tentar novamente.");
        $errorHandler->renderResult();
    }

    public function setAdmin()
    {
        if ($this->validInput) {
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            $this->adminModel = new Admin($this->username, $this->password, $this->nickname, $this->added_by);
            $result = $this->adminModel->setAdmin();
            if ($result) {
                $errorHandler->addMessage("Adminstrador adicionado com successo.");
            } else {
                $errorHandler->addMessage("Erro ao salvar dados, tente novamente.");
                $errorHandler->setSuccess(false);
            }
            $errorHandler->renderResult();
        }
    }

    function validateProfileEditing($nick = "", $job, $image = "", $bio, $admin_id)
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);

        if (strlen($job) < 3 || strlen($job) > 49)
            $errorHandler->addMessage("Sua ocupação não pode ter menos que 3 caractéres e mais que 50 caractéres.");

        if (strlen($bio) < 50 || strlen($bio) > 499)
            $errorHandler->addMessage("Sua descrição não pode ter menos que 50 caractéres e mais que 500 caractéres.");

        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
            return false;
        } else {
            $this->updateAdmin($nick, $job, $image, $bio, $admin_id);
        }
    }

    private function updateAdmin($nick = "", $job, $image = "", $bio, $admin_id)
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        $this->adminModel = new Admin();
        $result = $this->adminModel->updateAdmin($nick, $job, $image, $bio, $admin_id);
        if ($result) {
            $errorHandler->addMessage("Adminstrador atualizado com successo.");
            //atualizando sessão atual 
            $_SESSION['admin'] =$this->adminModel->updateSession($admin_id);
        } else {
            $errorHandler->addMessage("Erro ao salvar dados, tente novamente.");
            $errorHandler->setSuccess(false);
        }
        $errorHandler->renderResult();
    }

    function validateAdmin()
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        $this->adminModel = new Admin();

        if ($this->adminModel->checkDuplicateUsername($this->username))
            $errorHandler->addMessage("Este nome de usuário já está em uso.");

        if (empty($this->username) || empty($this->password) || empty($this->password_confirm))
            $errorHandler->addMessage("Você não preencheu todos os dados necessários.");

        if ($this->password_confirm != $this->password)
            $errorHandler->addMessage("As senhas não coincidem.");
        else if (strlen($this->password) < 8 || strlen($this->password) > 59)
            $errorHandler->addMessage("As senhas devem conter no mínimo 8 caractéres até o máximo de 60 caractéres.");

        if (strlen($this->username) < 3 || strlen($this->username) > 49)
            $errorHandler->addMessage("O nome de usuário deve conter de 3 até o máximo de 50 caractéres");

        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
            return false;
        }
        return true;
    }
}
