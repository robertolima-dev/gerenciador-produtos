<?php

include '../../aplicacao_web_Off/validador.php';
include 'header.php';

include '../controller/User.php';

?>

<main class="content">
	<h1 class="title new-item">New Category</h1>
	
	<form action="../process/cadastrar/categoria.php" method="post">
		<div class="input-field">
			<label class="label">Category Name</label>
			<input type="text" name="name" class="input-text" />
			
		</div>
		<div class="input-field">
			<label class="label">Category Code</label>
			<input type="text" name="code" class="input-text" />
			
		</div>

		<input type="hidden" name="status" value="1">
		<input type="hidden" name="id_usuario" value="<?= $_SESSION['id'] ?>">

		<div class="actions-form">
			<a href="categorias" class="action back">Back</a>
			<input class="btn-submit btn-action"  type="submit" value="Save" />
		</div>
	</form>
</main>


<?php include 'footer.php'; ?>