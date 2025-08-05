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
            $animais = $anm->all();
            ?>
            <tbody>
                <?php
                foreach ($animais as $animal):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $animal->id_animal; ?></td>
                        <td><?php echo $animal->identificador; ?></td>
                        <td><?php echo $animal->data_nascimento; ?> </td>
                        <td><?php echo $animal->sexo; ?></td>
                        <td><?php echo $animal->id_raca; ?></td>
                        <td><?php echo $animal->id_mae; ?></td>
                        <td><?php echo $animal->id_lote; ?></td>
                        <td></td>
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