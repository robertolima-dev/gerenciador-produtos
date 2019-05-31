<?php

include '../validador.php';

$_POST['id_usuario'];
$_POST['name'];
$_POST['code'];
$_POST['status'];

include '../conexao.php';

$query="
INSERT INTO 
tb_categoria
(id_usuario, name, code, status)
VALUES 
(:id_usuario, :name, :code, :status)
";

$stmt = $conexao->prepare($query);

$stmt->bindValue(':id_usuario', $_POST['id_usuario'], PDO::PARAM_INT);
$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue(':code', $_POST['code'], PDO::PARAM_STR);
$stmt->bindValue(':status', $_POST['status'], PDO::PARAM_INT);

$stmt->execute();

$error = $stmt->errorInfo();

print_r($error);

if($error[0] == 0) {
	header('location: ../../app/categorias?cadastro=sucesso');
} else {
	header('location: ../../app/categorias?cadastro=erro');
}