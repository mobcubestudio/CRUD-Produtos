<main class="content">
    <h1 class="title new-item"><?=TITLE?></h1>    
    <form method="post" enctype="multipart/form-data">
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" name="sku" class="input-text" value="<?=$objProduto->sku?>" /> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" name="nome" class="input-text" value="<?=$objProduto->nome?>" /> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" name="preco" class="input-text" value="<?=$objProduto->preco?>"/> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" name="quantidade" class="input-text" value="<?=$objProduto->quantidade?>"/> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple name="categorias[]" class="input-text">
          <?php

            $categorias_selecionadas = explode('|', $objProduto->categorias);

          foreach ($categorias as $categoria) {
              $checked = (in_array($categoria->nome, $categorias_selecionadas)) ? 'selected' : '';
              echo '<option ' . $checked . '>' . $categoria->nome . '</option>';
          }
            ?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea name="descricao" class="input-text"><?=$objProduto->descricao?></textarea>
      </div>
      <div class="input-field">
        <label for="description" class="label">Image</label>        
        <input type="file" name="imagem" class="input-text" />
      </div>
      <div class="input-field">      
      <label for="description" class="label"></label>        
        <img src="<?=$objProduto->getImagem();?>" layout="responsive" width="300"   /><br />        
      </div>
      <div class="actions-form">
        <a href="produtos.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
      </div>
    </form>
  </main>