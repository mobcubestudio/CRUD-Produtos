<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Executado com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Erro na execução!</div>';
            break;
    }
}

  $res = '';
foreach ($produtos as $produto) {
    $res .= '<tr class="data-row">
        <td class="data-grid-td">
        <span class="data-grid-cell-content">' . $produto->nome . '</span>
        </td>
    
        <td class="data-grid-td">
        <span class="data-grid-cell-content">' . $produto->sku . '</span>
        </td>

        <td class="data-grid-td">
        <span class="data-grid-cell-content">R$ ' . number_format($produto->preco, 2, ',', '.') . '</span>
        </td>

        <td class="data-grid-td">
        <span class="data-grid-cell-content">' . $produto->quantidade . '</span>
        </td>

        <td class="data-grid-td">
        <span class="data-grid-cell-content">' . $produto->categorias . '</span>
        </td>
    
        <td class="data-grid-td">
        <div class="actions">
            <div class="action edit"><span><a href="editar-produto.php?id=' .
            $produto->id_produto
            . '">Edit</a></span></div>
            <div class="action delete"><span><a href="excluir-produto.php?id=' .
            $produto->id_produto
            . '">Delete</a></span></div>
        </div>
        </td>
    </tr>';
}

  $res = strlen($res) ? $res : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum produto encontrado
                                                       </td>
                                                    </tr>';

?>
<!-- Main Content -->
<main class="content">
    <?=$mensagem?>
    <div class="header-list-page">
      <h1 class="title">Products</h1>
      <a href="cadastrar-produto.php" class="btn-action">Add new Product</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      
      <?=$res;?>
    </table>
  </main>
  <!-- Main Content -->
