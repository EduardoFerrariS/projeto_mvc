<?php
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/auth.php'; 
class ListProdutoController {
    public function listarProdutos() {
        $produto = Produto::getInstance(); 
        return $produto->listarProdutos();
    }

    public function exibirViewListagem() {
        $produtos = $this->listarProdutos();
        require_once __DIR__ . '/../views/listprodutos.php';
    }

    public function buscarProdutoPorId($id) {
        $produto = Produto::getInstance(); 
        return $produto->buscarProdutoPorId($id);
    }
}

$listProdutoController = new ListProdutoController();
$listProdutoController->exibirViewListagem();

