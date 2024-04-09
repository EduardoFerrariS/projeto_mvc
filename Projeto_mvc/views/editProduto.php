<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Edição de Produtos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="custom-body">
    <?php if(isset($_GET['action']) && $_GET['action'] === 'formEdicao'): ?>
    <?php
    $produto = isset($produto) ? $produto : array(
        'id' => '',
        'nome' => '',
        'descricao' => '',
        'quantidade' => '',
        'preco' => '',
        'categoria' => ''
    );
    ?>
    <div class="custom-container">
    <a href="dashboard.php?action=listarProdutos" class="custom-button">Voltar para Listagem de Produtos</a>
        <form action="dashboard.php?action=editarProduto&id=<?php echo $produto['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            <label for="nomeP" class="custom-label">Nome do produto</label>
            <input type="text" name="nomeP" placeholder="Nome do produto" id="nomeP" class="custom-input" value="<?php echo $produto['nome']; ?>">
            <label for="descricao" class="custom-label">Descrição do produto</label>
            <input type="text" name="descricao" placeholder="Descrição" id="descricao" class="custom-input" value="<?php echo $produto['descricao']; ?>">
            <label for="quantidade" class="custom-label">Quantidade do produto</label>
            <input type="number" name="quantidade" placeholder="Quantidade" id="quantidade" class="custom-input" value="<?php echo $produto['quantidade']; ?>">
            <label for="preco" class="custom-label">Preço do produto</label>
            <input type="number" name="preco" placeholder="Preço" id="preco" class="custom-input" value="<?php echo $produto['preco']; ?>">
            <label for="categoria" class="custom-label">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="custom-input" value="<?php echo $produto['categoria']; ?>">
            <input type="submit" value="Editar Produto" class="custom-button">
            <?php if (!empty($mensagem)): ?>
                <div class="error"><?php echo $mensagem; ?></div>
            <?php endif; ?>

        </form>
    </div>
    <?php endif; ?>
</body>
</html>
