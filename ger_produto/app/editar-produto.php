<?php

include '../../aplicacao_web_Off/validador.php';
include 'header.php';

include '../controller/User.php';
include '../controller/Produto.php';

?>

<main class="content">
	<h1 class="title new-item">New Product</h1>
	
	<form action="../process/editar/produto.php" method="post">

		<?php echo $produto->editProduct() ?>
		
	</form>
</main>


<?php include 'footer.php'; ?>