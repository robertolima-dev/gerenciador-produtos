<?php 

session_start();

$_POST['nome'];
$_POST['email'];
$_POST['senha'];
$_POST['status'];

$autenticado = false;

include '../conexao.php';

$query="
INSERT INTO 
tb_cadastro
(nome, email, senha, status) 
VALUES 
(:nome, :email, :senha, :status)
";

$stmt = $conexao->prepare($query);

$stmt->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue(':senha', md5($_POST['senha']), PDO::PARAM_STR);
$stmt->bindValue(':status', $_POST['status'], PDO::PARAM_INT);

$stmt->execute();

$error = $stmt->errorInfo();

if($error[0] == 0) {

	$autenticado = true;
	
	$query_id="
	SELECT 
	*
	FROM 
	tb_cadastro
	ORDER BY id_usuario DESC LIMIT 1
	";

	$stmt = $conexao->query($query_id);
	$usuario = $stmt->FetchAll(PDO::FETCH_ASSOC);

	$id_usuario = $usuario[0]['id_usuario'];
	$status_usuario = $usuario[0]['status'];

	if($autenticado == true) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $id_usuario;
		$_SESSION['status'] = $status_usuario;

		header('location: ../../app/dashboard?cadastro=sucesso');

	} else {
		header('location: ../../index?cadastro=erro');
	}
} else {
	header('location: ../../index?cadastro=erro');
}