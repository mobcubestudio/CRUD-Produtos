<main class="content">

  <h2 class="mt-3">Excluir produto</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir o produto <strong><?=$objProduto->nome?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="index.php">
        <button type="button" class="action back">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn-action">Excluir</button>
    </div>

  </form>

</main>
