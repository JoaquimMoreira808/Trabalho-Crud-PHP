<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar - Usuários</title>
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
                <div class="card" style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(10px); border: none;">
                    <div class="card-header" style="color: #ffffff;">
                        <h4>
                            Adicionar task</i>
                            <a href="index.php" class="btn float-end" style="background-color: #00000040; color: #fff; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#00000080'" onmouseout="this.style.backgroundColor='#00000040'">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txtTitulo" style="color: #ffffff;">Título</label>
                                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" style="background-color: #2c2c2c; color: #ffffff; border-color: #555555;">
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricao" style="color: #ffffff;">Descrição</label>
                                <input type="text" name="txtDescricao" id="txtDescricao" class="form-control" style="background-color: #2c2c2c; color: #ffffff; border-color: #555555;">
                            </div>
                            <div class="mb-3">
                                <label for="txtData" style="color: #ffffff;">Limite</label>
                                <input type="date" name="txtData" id="txtData" class="form-control" style="background-color: #2c2c2c; color: #ffffff; border-color: #555555;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create-task" class="btn btn-primary float-end" class="btn float-end" style="color: black; background-color: #fccf03; border: none;" onmouseover="this.style.backgroundColor='#ba9900'" onmouseout="this.style.backgroundColor='#fccf03'">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>