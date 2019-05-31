<?php

include '../process/validador.php';
include 'header.php';

include '../controller/Produto.php';

?>

<!-- Main Content -->
<main class="content">

	<div class="header-list-page">
		<h1 class="title">Dashboard</h1>
	</div>


	<?php echo $produto->showDashboard() ?>


</main>
<!-- Main Content -->

<?php include 'footer.php'; ?>