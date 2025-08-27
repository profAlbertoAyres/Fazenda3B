<?php

if (filter_has_var(INPUT_POST, "btnGravar")):
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $animal = new Animal();
    $animal->setIdentificador(filter_input(INPUT_POST, 'identificador'));
    $animal->setDataNascimento(filter_input(INPUT_POST, 'nascimento'));
    $animal->setSexo(filter_input(INPUT_POST, 'sexo'));
    $animal->setIdMae(filter_input(INPUT_POST, 'mae'));
    $animal->setIdRaca(filter_input(INPUT_POST, 'raca'));
    $animal->setIdLote(filter_input(INPUT_POST, 'lote'));
    $idAnimal = filter_input(INPUT_POST, 'idAnimal');
    if (empty($idAnimal)):
        if ($animal->add()) {
            echo "
            <script>
                window.alert('Animal adicionado com sucesso');
                window.location='animais.php';
            </script>
            ";
        }else{
            echo "
            <script>
                window.alert('Erro ao adicionar o Animal');
                window.open(document.referrer,'_self');
            </script>
            ";
        }
    else:
        if ($animal->update('id_animal', $idAnimal)) {
            echo "
            <script>
                window.alert('Animal atualizado com sucesso');
                window.location='animais.php';
            </script>
            ";
        }else{
            echo "
            <script>
                window.alert('Erro ao atualizar o Animal');
                window.open(document.referrer,'_self');
            </script>
            ";
        }
    endif;
endif;