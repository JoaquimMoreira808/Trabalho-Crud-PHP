<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tasks";
$tasks = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem - Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <video autoplay muted loop 
           style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
        <source src="./gif/samurai-gif.mp4" type="video/mp4">
        Seu navegador não suporta o vídeo.
    </video>    

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #00000040;">
                    <div class="card-header"> 
                        <h4 style="color: #ffffff" >
                            Lista de Tarefas
                            <a href="create-task.php" class="btn float-end" style="color: black; background-color: #fccf03; border: none;" onmouseover="this.style.backgroundColor='#ba9900'" onmouseout="this.style.backgroundColor='#fccf03'">Adicionar Tarefa</a>                        
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php foreach ($tasks as $task): ?>
                                <div class="col">
                                    <div style="background-color: #00000040; border-radius: 2%; backdrop-filter: blur(3px);"> 
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #dedede"><?php echo $task['titulo']; ?></h5>
                                            <p class="card-text" style="color: #ffffff"><?php echo $task['descricao']; ?></p>
                                            <p class="card-text" style="color: #ffffff"><h6 style="color: darkgrey">Data de entrega:</h6><small style="color: #ffffff;"><?php echo date('d/m/Y', strtotime($task['data'])); ?></small></p>
                                            
                                            <?php 
                                            
                                            switch ($task['status']) {
                                                case 0:
                                                    echo '<div class="badge text-white p-2 rounded" style="background-color: #b53c3c;">Pendente <i class="bi bi-calendar2-x"></i></div>';
                                                    break;
                                                case 1:
                                                    echo '<div class="badge text-white p-2 rounded" style="background-color: #ebb22f;">Em progresso <i class="bi bi-clock"></i></div>';
                                                    break;
                                                case 2:
                                                    echo '<div class="badge text-white p-2 rounded" style="background-color: #54b53c;">Concluido <i class="bi bi-award-fill"></i></div>';
                                                    break;
                                                default:
                                                    echo '<div class="badge bg-secondary text-white p-2 rounded">Status desconhecido</div>';
                                            }
                                            ?>
                                            
                                            <div class="mt-3">
                                                <a href="edit-task.php?id=<?=$task['id']?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-fill"></i> Editar</a>
                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Tem certeza que deseja excluir?')" name="delete-task" type="submit" value="<?=$task['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Excluir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
