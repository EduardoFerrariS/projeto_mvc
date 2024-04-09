<?php
require_once 'controllers/LoginController.php';
require_once 'controllers/ListProdutosController.php'; 
require_once 'controllers/CadProdutoController.php';
require_once 'controllers/MensagemController.php'; 
require_once 'controllers/auth.php';

if (!isLoggedIn()) {
    redirectToLogin();
}

$ListProdutosController = new ListProdutoController();
$CadProdutosController = new CadProdutoController();
$loginController = new LoginController();
$mensagemController = new MensagemController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'login':
            $loginController->exibirFormulario();
            break;
        case 'logar':
            $loginController->login();
            break;
        case 'listarProdutos':
            $ListProdutosController->exibirViewListagem();
            break;
        case 'formCadastro':
            $CadProdutosController->exibirFormularioP();
            break;
        case 'formEdicao':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $produto = $ListProdutosController->buscarProdutoPorId($id);
                $CadProdutosController->editarProduto($id, $produto);
            } else {
                header('Location: dashboard.php?action=listarProdutos');
            }
            break;
        case 'registrarProdutos':
            $CadProdutosController->registrarP();
            break;
        case 'editarProduto':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $produto = $ListProdutosController->buscarProdutoPorId($id);
                $CadProdutosController->editarProduto($id, $produto);
            } else {
                header('Location: dashboard.php?action=listarProdutos');
            }
            break;
        case 'excluirProduto':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $CadProdutosController->excluirProduto($id);
            } else {
                header('Location: dashboard.php?action=listarProdutos');
            }
            break;
        default:
            header('Location: dashboard.php?action=listarProdutos');
            break;
    }
} else {
    header('Location: dashboard.php?action=listarProdutos');
}
?>




