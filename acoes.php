<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create-task'])) {
    $titulo = trim($_POST['txtTitulo']);
    $descricao = trim($_POST['txtDescricao']);
    $data = trim($_POST['txtData']);
    $status = trim($_POST['txtStatus']);

    $sql = "INSERT INTO tasks (titulo, descricao, data, status) VALUES('$titulo', '$descricao', '$data', '$status')";
    
    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete-task'])) {
    $taskId = mysqli_real_escape_string($conn, $_POST['delete-task']);
    $sql = "DELETE FROM tasks WHERE id = '$taskId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Task com ID:#{$taskId} excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Ops! Não foi possível excluir o usuário";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}

if (isset($_POST['edit-task'])) {
    $taskId = mysqli_real_escape_string($conn, $_POST['task_id']);
    $titulo = trim($_POST['txtTitulo']);
    $descricao = trim($_POST['txtDescricao']);
    $data = trim($_POST['txtData']);
    $status = trim($_POST['txtStatus']); 

    $sql = "UPDATE tasks SET titulo = '{$titulo}', descricao = '{$descricao}', data = '{$data}', status = '{$status}' WHERE id = '{$taskId}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa {$taskId} atualizada com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível atualizar a tarefa {$taskId}";
        $_SESSION['type'] = 'error';
    }
    
    header("Location: index.php");
    exit;
}