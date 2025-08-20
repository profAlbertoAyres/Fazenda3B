<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Animais</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php" ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3">
            <h3>Animais</h3>
        </div>
        <div>
            <a href="gerAnimal.php" class="btn btn-success mt-3 mb-3">Novo Animal</a>
        </div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Identificador</th>
                    <th>Data Nascimento</th>
                    <th>Sexo</th>
                    <th>Raça</th>
                    <th>Mãe</th>
                    <th>Lote</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
            spl_autoload_register(function ($class) {
                require_once "classes/{$class}.class.php";
            });
            #Criando o objeto Animal
            $anm = new Animal();
            #trazendo os animais cadastrados no banco de dados
            $animais = $anm->sp_exibir("exibir_animal()");
            ?>
            <tbody>
                <?php
                foreach ($animais as $animal):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $animal->id_animal; ?></td>
                        <td><?php echo $animal->identificador; ?></td>
                        <td><?php echo $animal->nascimento; ?> </td>
                        <td><?php echo $animal->sexo; ?></td>
                        <td><?php echo $animal->nome; ?></td>
                        <td><?php echo $animal->Mãe; ?></td>
                        <td><?php echo $animal->descricao; ?></td>
                        <td>
                            <form action="gerAnimal.php" method="post">
                                <input type="hidden" name="idAnimal" value="<?php echo $animal->id_animal; ?>">
                                <button type="submit" name="btnEditar" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </main>
    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>