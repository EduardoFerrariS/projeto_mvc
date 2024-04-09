<?php
require_once 'config.php';

class Produto {
    private static $instance;
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function listarProdutos() {
        $result = $this->conn->query("SELECT * FROM produtos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrarProduto($nomeP, $descricao, $quantidade, $preco, $categoria) {
        $stmt = $this->conn->prepare("INSERT INTO produtos (nome, descricao, quantidade, preco, categoria) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nomeP, $descricao, $quantidade, $preco, $categoria);
        return $stmt->execute();
    }

    public function editarProduto($id, $nome, $descricao, $quantidade, $preco, $categoria) {
        $stmt = $this->conn->prepare("UPDATE produtos SET nome=?, descricao=?, quantidade=?, preco=?, categoria=? WHERE id=?");
        $stmt->bind_param("sssssi", $nome, $descricao, $quantidade, $preco, $categoria, $id);
        return $stmt->execute();
    }

    public function excluirProduto($id) {
        $stmt = $this->conn->prepare("DELETE FROM produtos WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function buscarProdutoPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>

