<?php
require_once __DIR__ . '/../models/Usuario.php';

class RegistroController {
    public function exibirFormulario($mensagem = "") {
        require_once __DIR__ . '/../views/registro.php';
    }

    public function registrar() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar_senha'];

        if ($senha !== $confirmarSenha) {
            $this->exibirFormulario("As senhas não coincidem.");
            return;
        }


        $usuario = Usuario::getInstance();
        $resultado = $usuario->registrarUsuario($nome, $email, $senha);

        if ($resultado) {
            $this->exibirFormulario("Usuário registrado com sucesso!");
        } else {
            $this->exibirFormulario("Erro ao registrar usuário.");
        }
    }
}

$registroController = new RegistroController();
?>
