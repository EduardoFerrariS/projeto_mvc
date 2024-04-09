<?php
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    public function exibirFormulario($mensagem = "") {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = Usuario::getInstance();
        $usuarioEncontrado = $usuario->buscarUsuarioPorEmail($email);
        if ($usuarioEncontrado && password_verify($senha, $usuarioEncontrado['senha'])) {

            session_start();

            $_SESSION['logged_in'] = true;

            header('Location: dashboard.php?action=listarProdutos');
            exit;
        } else {
            $this->exibirFormulario("Email ou senha incorretos.");
        }
    }
}

$loginController = new LoginController();
?>
