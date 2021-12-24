<main class="content">

  <h2 class="mt-3">Excluir categoria</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir a categoria <strong><?=$objCategoria->nome?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="categorias.php">
        <button type="button" class="action back">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn-action">Excluir</button>
    </div>

  </form>

</main>
