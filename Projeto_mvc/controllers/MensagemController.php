<?php

class MensagemController {
    public function exibirMensagem($mensagem) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensagem'] = $mensagem;
    }
}

?>
