<?php

include '../../../ger_produto_Off/validador.php';

if($_FILES['upload_file']['name'] == '') {

	$_POST['id_usuario'];
	$_POST['sku'];
	$_POST['name'];
	$_POST['price'];
	$_POST['quantity'];
	$_POST['category1'];
	$_POST['category2'];
	$_POST['description'];
	$_POST['status'];

	include '../../../ger_produto_Off/conexao.php';

	$query="
	INSERT INTO 
	tb_produto
	(id_usuario, sku, name, price, quantity, category1, category2, description, status)
	VALUES 
	(:id_usuario, :sku, :name, :price, :quantity, :category1, :category2, :description, :status)
	";

	$stmt = $conexao->prepare($query);

	$stmt->bindValue(':id_usuario', $_POST['id_usuario'], PDO::PARAM_INT);
	$stmt->bindValue(':sku', $_POST['sku'], PDO::PARAM_STR);
	$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
	$stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
	$stmt->bindValue(':quantity', $_POST['quantity'], PDO::PARAM_STR);
	$stmt->bindValue(':category1', $_POST['category1'], PDO::PARAM_STR);
	$stmt->bindValue(':category2', $_POST['category2'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
	$stmt->bindValue(':status', $_POST['status'], PDO::PARAM_INT);

	$stmt->execute();

	$error = $stmt->errorInfo();

	print_r($error);

	if($error[0] == 0) {
		header('location: ../../app/dashboard?cadastro=sucesso');
	} else {
		header('location: ../../app/dashboard?cadastro=erro');
	}

} else {


	$_FILES['upload_file']['name'];
	$_FILES['upload_file']['type'];
	$_FILES['upload_file']['tmp_name'];
	$_FILES['upload_file']['error'];
	$_FILES['upload_file']['size'];

	$maxSize = $_POST['MAX_FILE_SIZE'];

	$imagem = $_FILES['upload_file'];

	if($_FILES['upload_file']['error'] == '1') {
		header('location: ../../app/cadastrar-produto?img_erro=1');
	}
	if($_FILES['upload_file']['error'] == '2') {
		header('location: ../../app/cadastrar-produto?img_erro=2');
	}
	if($_FILES['upload_file']['error'] == '3') {
		header('location: ../../app/cadastrar-produto?img_erro=3');
	}
	if($_FILES['upload_file']['error'] == '5') {
		header('location: ../../app/cadastrar-produto?img_erro=5');
	}
	if($_FILES['upload_file']['error'] == '6') {
		header('location: ../../app/cadastrar-produto?img_erro=6');
	}
	if($_FILES['upload_file']['error'] == '7') {
		header('location: ../../app/cadastrar-produto?img_erro=7');
	}
	if($maxSize < $_FILES['upload_file']['size']) {
		header('location: ../../app/cadastrar-produto?img_erro=tamanho');
	}

	if ($maxSize > $_FILES['upload_file']['size'] && $_FILES['upload_file']['error'] == '0') {

		date_default_timezone_set('America/Sao_Paulo');
		$now = getdate();

		$codeDate = $now['year'].'_'.$now['yday'].'_';
		$codeDate .= $now['hours'].$now['minutes'].$now['seconds'];
		$codeDate = ($codeDate.'_'.rand(100,999));
		$codePhoto = 'foto_'.$codeDate;
		$extension = strrchr($imagem['name'], '.');
		$namePhoto = $codePhoto.$extension;

		print_r($namePhoto); 

		$arquivo_temporario = $imagem['tmp_name'];
		$arquivo = basename($imagem['name']);
		$diretorio = '../../upload';

		$moved = move_uploaded_file($arquivo_temporario, $diretorio."/".$namePhoto);

		if($moved) {

			$photo = $namePhoto;
			$_POST['id_usuario'];
			$_POST['sku'];
			$_POST['name'];
			$_POST['price'];
			$_POST['quantity'];
			$_POST['category1'];
			$_POST['category2'];
			$_POST['description'];
			$_POST['status'];

			include '../../../ger_produto_Off/conexao.php';

			$query="
			INSERT INTO 
			tb_produto
			(id_usuario, photo, sku, name, price, quantity, category1, category2, description, status)
			VALUES 
			(:id_usuario, :photo, :sku, :name, :price, :quantity, :category1, :category2, :description, :status)
			";

			$stmt = $conexao->prepare($query);

			$stmt->bindValue(':id_usuario', $_POST['id_usuario'], PDO::PARAM_INT);
			$stmt->bindValue(':photo', $photo, PDO::PARAM_STR);
			$stmt->bindValue(':sku', $_POST['sku'], PDO::PARAM_STR);
			$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
			$stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
			$stmt->bindValue(':quantity', $_POST['quantity'], PDO::PARAM_STR);
			$stmt->bindValue(':category1', $_POST['category1'], PDO::PARAM_STR);
			$stmt->bindValue(':category2', $_POST['category2'], PDO::PARAM_STR);
			$stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
			$stmt->bindValue(':status', $_POST['status'], PDO::PARAM_INT);

			$stmt->execute();

			$error = $stmt->errorInfo();

			print_r($error);

			if($error[0] == 0) {
				header('location: ../../app/dashboard?cadastro=sucesso');
			} else {
				header('location: ../../app/dashboard?cadastro=erro');
			}

		}
	}


}