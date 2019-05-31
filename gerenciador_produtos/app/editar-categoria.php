<?php

include '../process/validador.php';
include 'header.php';

include '../controller/Categoria.php';

?>

<main class="content">
	<h1 class="title new-item">Edit Category</h1>
	
	<form action="../process/editar/categoria.php" method="post">
		

		<?php echo $categoria->editCategory() ?>

		<input type="hidden" name="id_categoria" value="<?= $_GET['id'] ?>">

		<div class="actions-form">
			<a href="categorias" class="action back">Back</a>
			<input class="btn-submit btn-action"  type="submit" value="Edit" />
		</div>
	</form>
</main>


<?php include 'footer.php'; ?>