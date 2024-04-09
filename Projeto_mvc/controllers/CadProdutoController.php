<?php
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/auth.php'; 

class CadProdutoController {
    public function exibirFormularioP($produto = null, $mensagem = "") {
        require_once __DIR__ . '/../views/cadprodutos.php';
        exit(); 
    }

    public function registrarP() {
        $nomeP = $_POST['nomeP'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];

        if (empty($nomeP) || empty($descricao) || empty($quantidade) || empty($preco) || empty($categoria)) {
            $this->exibirFormularioP(null, "Por favor, preencha todos os campos.");
            return;
        }

        $produto = new Produto();
        $resultado = $produto->registrarProduto($nomeP, $descricao, $quantidade, $preco, $categoria);

        if ($resultado) {
            $mensagemController = new MensagemController();
            $mensagemController->exibirMensagem("Produto cadastrado com sucesso!");
            header("Location: dashboard.php?action=listarProdutos");
            exit();
        } else {
            $this->exibirFormularioP(null, "Erro ao processar o produto. Por favor, tente novamente.");
        }
    }

    public function editarProduto($id, $produto) {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require_once __DIR__ . '/../views/editProduto.php';
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomeP = $_POST['nomeP'];
            $descricao = $_POST['descricao'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
            $categoria = $_POST['categoria'];

            if (empty($nomeP) || empty($descricao) || empty($quantidade) || empty($preco) || empty($categoria)) {
                // Redireciona para a página de listagem de produtos com mensagem de erro
                $mensagemController = new MensagemController();
                $mensagemController->exibirMensagem("Por favor, preencha todos os campos.");
                header("Location: dashboard.php?action=listarProdutos");
                exit();
            }

            $produto = new Produto();
            $resultado = $produto->editarProduto($id, $nomeP, $descricao, $quantidade, $preco, $categoria);

            if ($resultado) {
                $mensagemController = new MensagemController();
                $mensagemController->exibirMensagem("Produto atualizado com sucesso!");
                header("Location: dashboard.php?action=listarProdutos");
                exit();
            } else {
                // Redireciona para a página de listagem de produtos com mensagem de erro
                $mensagemController = new MensagemController();
                $mensagemController->exibirMensagem("Erro ao editar o produto. Por favor, tente novamente.");
                header("Location: dashboard.php?action=listarProdutos");
                exit();
            }
        }
    }

    public function excluirProduto($id) {
        $produto = Produto::getInstance();
        $resultado = $produto->excluirProduto($id);
        if ($resultado) {
            $mensagemController = new MensagemController();
            $mensagemController->exibirMensagem("Produto excluído com sucesso!");
            header("Location: dashboard.php?action=listarProdutos");
            exit();
        } else {
            echo "Erro ao excluir o produto.";
        }
    }
}

$CadProdutoController = new CadProdutoController();
?>
