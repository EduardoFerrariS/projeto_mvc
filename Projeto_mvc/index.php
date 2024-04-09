<?php
// Ponto de entrada para o aplicativo


require_once 'controllers/RegistroController.php';

require_once 'controllers/LoginController.php';
require_once 'controllers/CadProdutoController.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'registro':
            $registroController->exibirFormulario();
            break;
        case 'registrar':
            $registroController->registrar();
            break;
        case 'login':
            $loginController->exibirFormulario();
            break;
        case 'logar':
            $loginController->login();
            break;
        default:
            // Página padrão
            header('Location: index.php?action=login');
            break;
    }
} else {
    // Página padrão
    header('Location: index.php?action=login');
}
