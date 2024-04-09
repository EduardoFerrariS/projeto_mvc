<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
</head>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="../styles.css">

<body class="bodylist">
    <?php if(isset($_GET['action']) && $_GET['action'] === 'listarProdutos'): ?> <!-- Verifica se a ação é listarProdutos -->
        <div class="container">
            <div class="tbl_container">
                <h2>Listagem de Produtos</h2>
                <a href="dashboard.php?action=formCadastro" class="custom-link">Cadastrar Novo Produto</a>
                <a href="controllers/auth.php?action=logout" class="custom-link">Sair</a> <!-- Adicionando o botão de sair -->
                <div id="mensagem">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    if(isset($_SESSION['mensagem'])) {
                        echo $_SESSION['mensagem'];
                        unset($_SESSION['mensagem']);
                    }
                    ?>
                </div>
                <table class="tbl">
                    <thead>
                        <tr> 
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?php echo $produto['nome']; ?></td>
                                <td><?php echo $produto['descricao']; ?></td>
                                <td><?php echo $produto['quantidade']; ?></td>
                                <td><?php echo $produto['preco']; ?></td>
                                <td><?php echo $produto['categoria']; ?></td>
                                <td>
                                    <a href="dashboard.php?action=formEdicao&id=<?php echo $produto['id']; ?>">Editar</a>
                                    <a href="dashboard.php?action=excluirProduto&id=<?php echo $produto['id']; ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?> <!-- Fim da verificação de listarProdutos -->
</body>
</html>
