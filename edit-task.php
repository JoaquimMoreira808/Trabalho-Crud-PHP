<?php
session_start();
require_once('conexao.php');

$tasks = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $tasksId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tasks WHERE id = '{$tasksId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $tasks = mysqli_fetch_array($query);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <video autoplay muted loop 
           style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
        <source src="./gif/samurai-gif.mp4" type="video/mp4">
    </video> 
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #00000040; backdrop-filter: blur(10px);">
                    <div class="card-header">
                        <h4 style="color: #ffffff;">
                            Editar task</i>
                            <a href="index.php" class="btn float-end" style="background-color: #00000040; color: #fff; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#00000080'" onmouseout="this.style.backgroundColor='#00000040'">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php if ($tasks): ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="task_id" value="<?=$tasks['id']?>">
                            <div class="mb-3">
                                <label for="txtTitulo" style="color: #ffffff;">Editar título:</label>
                                <input type="text" name="txtTitulo" id="txtTitulo" value="<?=$tasks['titulo']?>" class="form-control" style="background-color: #2c2c2c; color: #ffffff; border-color: #555555;">
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricao" style="color: #ffffff;">Editar descrição:</label>
                                <input type="text" name="txtDescricao" id="txtDescricao" value="<?=$tasks['descricao']?>" class="form-control" style="background-color: #2c2c2c; color: #ffffff; border-color: #555555;">
                            </div>
                            <div class="mb-3">
                                <label for="txtData" style="color: #ffffff;">Editar data de entrega:</label>
                                <input type="date" name="txtData" id="txtData" value="<?=$tasks['data']?>" class="form-control" style="background-color: #2c2c2c; color: #ffffff; border-color: #555555;">
                            </div>
                            <div class="mb-3">
                                <label for="txtStatus" style="color: #ffffff;">Editar status da tarefa:</label>
                                <div class="btn-group d-flex" role="group" aria-label="Status da Tarefa">
                                    <input type="radio" class="btn-check" name="txtStatus" id="statusPend" value="0" <?= $tasks['status'] == '0' ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-danger flex-fill" for="statusPend">Pendente</label>

                                    <input type="radio" class="btn-check" name="txtStatus" id="statusProg" value="1" <?= $tasks['status'] == '1' ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-warning flex-fill" for="statusProg">Em Progresso</label>

                                    <input type="radio" class="btn-check" name="txtStatus" id="statusConc" value="2" <?= $tasks['status'] == '2' ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-success flex-fill" for="statusConc">Concluído</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="edit-task" class="btn float-end" style="color: black; background-color: #fccf03; border: none;" onmouseover="this.style.backgroundColor='#ba9900'" onmouseout="this.style.backgroundColor='#fccf03'">Salvar</button>
                            </div>
                        </form>
                        <?php else: ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Usuário não encontrado
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>