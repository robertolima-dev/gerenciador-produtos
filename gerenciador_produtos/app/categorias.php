<?php

include '../process/validador.php';
include 'header.php';

include '../controller/Categoria.php';

?>

<main class="content">

	<div class="header-list-page">
		<h1 class="title">Categories</h1>
		<a href="cadastrar-categoria" class="btn-action">Add new Category</a>
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


		<?php echo $categoria->showCategories() ?>

		
	</table>
</main>

<?php include 'footer.php'; ?>