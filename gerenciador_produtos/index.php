<?php include 'header.php'; ?>


<main class="content">
	<h1 class="title new-item">Signin</h1>
	
	<form action="process/validar/cadastro.php" method="post">
		<div class="input-field">
			<label class="label">Name</label>
			<input type="text" name="nome" class="input-text" required/> 
		</div>
		<div class="input-field">
			<label class="label">Email</label>
			<input type="text" name="email" class="input-text" required/> 
		</div>
		<div class="input-field">
			<label class="label">Password</label>
			<input type="password" name="senha" class="input-text" required/> 
		</div>

		<input type="hidden" name="status" value="1">

		<div class="actions-form">
			<a href="login" class="action back">Login</a>
			<input class="btn-submit btn-action" type="submit" value="Signin" />
		</div>
		
	</form>
</main>


<?php include 'footer.php'; ?>