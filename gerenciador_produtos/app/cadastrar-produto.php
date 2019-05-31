<?php

include '../process/validador.php';
include 'header.php';

include '../controller/Categoria.php';

?>

<main class="content">
	<h1 class="title new-item">New Product</h1>
	
	<form action="../process/cadastrar/produto.php" method="post" enctype="multipart/form-data">
		<div class="input-field">
			<label for="sku" class="label">Product SKU</label>
			<input type="text" name="sku" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="name" class="label">Product Name</label>
			<input type="text" name="name" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="price" class="label">Price</label>
			<input type="text" name="price" class="input-text" /> 
		</div>
		<div class="input-field">
			<label for="quantity" class="label">Quantity</label>
			<input type="text" name="quantity" class="input-text" /> 
		</div>
		<div class="input-field">
			<label class="label">Categories</label>
			<select multiple name="category1" class="input-text">

				<?php echo $categoria->showOption() ?>

			</select>
		</div>
		<div class="input-field">
			<label class="label">Categories</label>
			<select multiple name="category2" class="input-text">

				<?php echo $categoria->showOption() ?>

			</select>
		</div>
		<div class="input-field">
			<label for="description" class="label">Description</label>
			<textarea name="description" class="input-text"></textarea>
		</div>

		<div class="input-field" style="margin-left: 140px;">
			<label class="custom-file-label">Product Image</label>
			<input class="input-text" type="file" name="upload_file">
		</div>

		<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
		<input type="hidden" name="status" value="1">
		<input type="hidden" name="id_usuario" value="<?= $_SESSION['id'] ?>">

		<div class="actions-form">
			<a href="dashboard" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save Product" />
		</div>
		
	</form>
</main>


<?php include 'footer.php'; ?>