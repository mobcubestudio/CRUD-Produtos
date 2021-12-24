<main class="content">
    <h1 class="title new-item"><?=TITLE?></h1>
    
    <form method="post">      
      <div class="input-field">
        <label for="name" class="label">Category Name</label>
        <input type="text" name="nome" class="input-text" value="<?=$objCategoria->nome?>" /> 
      </div>
      <div class="actions-form">
        <a href="categorias.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Category" />
      </div>
      
    </form>
  </main>
