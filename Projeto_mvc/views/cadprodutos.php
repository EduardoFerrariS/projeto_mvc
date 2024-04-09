<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="custom-body">
    <div class="custom-container">
    <a href="dashboard.php?action=listarProdutos" class="custom-button">Voltar para Listagem de Produtos</a>
        <form action="dashboard.php?action=registrarProdutos" method="post" class="custom-form">
            <label for="nomeP" class="custom-label">Nome do produto</label>
            <input type="text" name="nomeP" placeholder="Nome do produto" id="nomeP" class="custom-input">
            <label for="descricao" class="custom-label">Descrição do produto</label>
            <input type="text" name="descricao" placeholder="Descrição" id="descricao" class="custom-input">
            <label for="quantidade" class="custom-label">Quantidade do produto</label>
            <input type="number" name="quantidade" placeholder="Quantidade" id="quantidade" class="custom-input">
            <label for="preco" class="custom-label">Preço do produto</label>
            <input type="number" name="preco" placeholder="Preço" id="preco" class="custom-input">
            <label for="categoria" class="custom-label">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="custom-input">
            <input type="submit" value="Cadastrar Produto" class="custom-button">
            <?php if (!empty($mensagem)): ?>
        <div class="error"><?php echo $mensagem; ?></div>
    <?php endif; ?>
        </form>
    </div>
</body>
</html>
