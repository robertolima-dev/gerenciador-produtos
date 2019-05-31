<?php

include '../process/conexao.php';

$query="SELECT * FROM tb_categoria";

$stmt = $conexao->query($query);
$categorias = $stmt->FetchAll(PDO::FETCH_ASSOC);