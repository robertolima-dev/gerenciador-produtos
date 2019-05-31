<?php include 'header.php'; ?>

<main class="content">
	<h1 class="title new-item">Login</h1>
	
	<form action="process/validar/login.php" method="post">
		<div class="input-field">
			<label class="label">Email</label>
			<input type="text" name="email" class="input-text" required/> 
		</div>
		<div class="input-field">
			<label class="label">Password</label>
			<input type="password" name="senha" class="input-text" required/> 
		</div>

		<div class="actions-form">
			<a href="index" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Login" />
		</div>
		
	</form>
</main>

<?php include 'footer.php'; ?>