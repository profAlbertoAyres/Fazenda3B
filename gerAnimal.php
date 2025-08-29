<?php
    require_once "verifica_usuario.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseSite.css">
    <title>Cadastro de Animal</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php" ?>
    </header>
    <?php
        spl_autoload_register(function($class){
            require_once "classes/{$class}.class.php";
        });
        $lote = new Lote();
        $raca = new Raca();
        $mae = new Animal();

        if(filter_has_var(INPUT_POST,"btnEditar")):
            $idAnimal = intval(filter_input(INPUT_POST,"idAnimal"));
            $eAnimal = new Animal();
            $edtAnimal = $eAnimal->search('id_animal',$idAnimal);
        endif;
    ?>
    <main class="container">
        <form action="dbAnimal.php" method="post" class="row g3 mt-3">
            <input type="hidden" name="idAnimal" value="<?php echo $edtAnimal->id_animal ?? null; ?>">
            <div class="col-md-6 mt-3">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" id="identificador" class="form-control" value="<?php echo $edtAnimal->identificador ?? null; ?>">
            </div>
            <div class="col-md-3 mt-3">
                <label for="nascimento" class="form-label">Nascimento</label>
                <input type="date" name="nascimento" id="nascimento" class="form-control" value="<?php echo $edtAnimal->data_nascimento ?? null; ?>">
            </div>
            <div class="col-md-3 mt-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select">
                    <option selected>Selecione o sexo</option>
                    <?php
                        $sexos =[
                            "F" => "Fêmea",
                            "M" => "Macho",
                        ];
                        $sexoSelecionado = $edtAnimal->sexo ?? null;
                        foreach($sexos as $valor => $rotulo):
                    ?>
                    <option value="<?php echo $valor ?>" <?php if($sexoSelecionado == $valor) echo 'selected'; ?>><?php echo $rotulo ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="raca" class="form-label">Raça</label>
                <select name="raca" id="raca" class="form-select">
                    <option selected>Selecione a Raça</option>

                    <?php
                        $racas = $raca->all();
                        $racaSelecionada = $edtAnimal->id_raca ?? null;
                        foreach($racas as $r):
                    ?>
                    <option value="<?php echo $r->id_raca ?>" <?php if($racaSelecionada==$r->id_raca) echo 'selected' ;?>><?php echo $r->nome ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="lote" class="form-label">Lote</label>
                <select name="lote" id="lote" class="form-select">
                    <option selected>Selecione o Lote</option>
                    <?php
                        $lotes = $lote->all();
                        $loteSelecionado = $edtAnimal->id_lote ?? null;
                        foreach($lotes as $l):
                    ?>
                    <option value="<?php echo $l->id_lote ?>" <?php if($loteSelecionado==$l->id_lote) echo 'selected'; ?>><?php echo $l->descricao ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="mae" class="form-label">Mãe</label>
                <select name="mae" id="mae" class="form-select">
                    <option value="" selected>Selecione a Mãe</option>
                    <?php
                        $maes = $mae->sp_exibir('exibir_maes()');
                        $maeSelecionada = $edtAnimal->id_mae ?? null;
                        foreach($maes as $m):
                    ?>
                    <option value="<?php echo $m->id_animal ?>" <?php if($maeSelecionada==$m->id_animal) echo 'selected'; ?>><?php echo $m->identificador ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="btnGravar" class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Gravar</button>
                <a href="aminais.php" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
            </div>
        </form>        
    </main>
    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
