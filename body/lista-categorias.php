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
foreach ($categorias as $categoria) {
    $res .= '<tr class="data-row">
                    <td class="data-grid-td">
                    <span class="data-grid-cell-content">' . $categoria->nome . '</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">' . $categoria->id_categoria . '</span>
                </td>
    
        <td class="data-grid-td">
        <div class="actions">
            <div class="action edit"><span><a href="editar-categoria.php?id=' .
            $categoria->id_categoria
            . '">Edit</a></span></div>
            <div class="action delete"><span><a href="excluir-categoria.php?id=' .
            $categoria->id_categoria
             . '">Delete</a></span></div>
        </div>
        </td>
    </tr>';
}

  $res = strlen($res) ? $res : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma categoria encontrada
                                                       </td>
                                                    </tr>';

?>
<!-- Main Content -->
<main class="content">
    <?=$mensagem?>
    <div class="header-list-page">
      <h1 class="title">Categories</h1>
      <a href="cadastrar-categoria.php" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Code</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>

      <!-- RESULTADO DAS CATEGORIAS -->
      <?=$res;?>

    </table>
  </main>
  <!-- Main Content -->
