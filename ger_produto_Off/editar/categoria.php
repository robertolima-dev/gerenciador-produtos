<?php

include '../../../ger_produto_Off/validador.php';

$name = $_POST['name'];
$code = $_POST['code'];
$id_categoria = $_POST['id_categoria'];

include '../../../ger_produto_Off/conexao.php';

$query="
UPDATE 
tb_categoria
SET 
name='$name',
code='$code'
WHERE 
id_categoria='$id_categoria'
";

$stmt = $conexao->prepare($query);

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':code', $code, PDO::PARAM_STR);

$stmt->execute();

$error = $stmt->errorInfo();

print_r($error);

if($error[0] == 0) {
	header('location: ../../app/categorias?cadastro=sucesso');
} else {
	header('location: ../../app/categorias?cadastro=erro');
}