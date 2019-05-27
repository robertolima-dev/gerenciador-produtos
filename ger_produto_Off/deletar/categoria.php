<?php

include '../../../ger_produto_Off/validador.php';

$id_categoria = $_POST['id_categoria'];

include '../../../ger_produto_Off/conexao.php';

$query="
DELETE FROM
tb_categoria
WHERE 
id_categoria='$id_categoria' 
";

$stmt = $conexao->prepare($query);

$stmt->bindValue(':id_categoria', $id_categoria, PDO::PARAM_INT);

$stmt->execute();

$error = $stmt->errorInfo();

if($error[0] == 0) {
	header('location: ../../app/categorias?deletar=sucesso');
} else {
	header('location: ../../app/categorias?deletar=erro');
}