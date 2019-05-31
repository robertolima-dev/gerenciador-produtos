<?php

include '../process/conexao.php';

$query="
SELECT 
*
FROM 
tb_cadastro
";

$stmt = $conexao->query($query);
$usuarios = $stmt->FetchAll(PDO::FETCH_ASSOC);