<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

// Criando uma instância da classe Usuário
$usuario = new Usuario();
if (filter_has_var(INPUT_POST, "btnGravar")):
    $usuario->setNome(filter_input(INPUT_POST, 'nome'));
    $usuario->setNivel(filter_input(INPUT_POST, 'nivel'));
    $usuario->setSenha(password_hash(filter_input(INPUT_POST, 'senha'),PASSWORD_DEFAULT));
    $usuario->setEmail(filter_input(INPUT_POST, 'email'));
    $idUsuario = filter_input(INPUT_POST, 'idUsuario');
    if (empty($idUsuario)):
        // Tenta adicionar e exibe mensagens para o usuário
        $resultado = $usuario->add();
        if ($resultado===true) {
            echo "<script>
            window.alert('Usuário adicionado com sucesso.'); 
            window.location.href='usuarios.php';
            </script>";
        } else {
            echo "<script>
            window.alert('{$resultado}'); 
            window.open(document.referrer,'_self');
            </script>";
        }
    else:
        $resultado = $usuario->update('id_usuario', $idUsuario);
        if ($resultado===true){
            echo "<script>
                window.alert('Usuário alterado com sucesso.'); 
                window.location.href='usuarios.php';
                </script>";
        } else {
            echo "<script>
            window.alert('{$resultado}'); 
            window.location.href='usuarios.php';
            </script>";
        }
    endif;
elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $idUsuario = intval(filter_input(INPUT_POST, "idUsuario"));
    if ($usuario->delete("id_usuario", $idUsuario)):
        header("location:usuarios.php");
    else:
        echo "<script>
        window.alert('Erro ao deletar.'); 
        window.open(document.referrer,'_self');
        </script>";
    endif;
elseif(filter_has_var(INPUT_POST,'btnLogar')):
    $usuario->setNome(filter_input(INPUT_POST,'nome'));
    $usuario->setSenha(filter_input(INPUT_POST,'senha'));
    $mensagem = $usuario->login();
    echo "<script>
        window.alert('$mensagem'); 
        window.open(document.referrer,'_self');
        </script>";
elseif(filter_has_var(INPUT_POST,'btnAltSenha')):
    echo "<script>
        window.alert('Calma ainda vamos implementar o alterar senha.'); 
        window.open(document.referrer,'_self');
        </script>";
elseif(filter_has_var(INPUT_POST,'btnAltEmail')):
    echo "<script>
        window.alert('Calma ainda vamos implementar o alterar e-mail.'); 
        window.open(document.referrer,'_self');
        </script>";
endif;