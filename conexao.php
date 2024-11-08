<?php
$host = 'localhost'; #127.0.0.1
$tasks = 'root';
$senha = '';
$banco = 'tasks';

$conn = mysqli_connect($host, $tasks, $senha, $banco) or die('Não foi possível');

?>