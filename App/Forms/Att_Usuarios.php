<?php
    // Obtém o diretório do script atual
    $scriptDir = dirname(__FILE__);

    // Caminho completo para o arquivo autoload.php
    $autoloadPath = realpath($scriptDir . '/../../vendor/autoload.php');

    // Verifica se o arquivo existe antes de tentar incluí-lo
    if (file_exists($autoloadPath)) {
        require_once $autoloadPath;
    } else {
        die("Erro: autoload.php não encontrado.");
    }

    // Verifica se os dados foram enviados via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se cada campo do formulário está presente em $_POST antes de acessá-los
        if (isset($_POST['att_id'], $_POST['att_nome'], $_POST['att_sobrenome'], $_POST['att_nascimento'])) {
            // Recupera os dados do formulário
            $att_id = $_POST['att_id'];
            $primeiro_nome = $_POST['att_nome'];
            $sobrenome_usuario = $_POST['att_sobrenome'];
            $nascimento = $_POST['att_nascimento'];

            $usuario = new \App\Models\Usuarios();
            $usuario->setId($att_id);
            $usuario->setNome($primeiro_nome);
            $usuario->setSobrenome($sobrenome_usuario);
            $usuario->setNascimento($nascimento);

            $CRUD_Usuarios = new \App\Models\CRUD_Usuarios();
            $CRUD_Usuarios->update($usuario);

            header('Location: /index.php');
            exit;
        } else {
            // Se algum campo estiver ausente, exiba uma mensagem de erro ou tome a ação apropriada
            echo "Por favor, preencha todos os campos do formulário.";
        }
    }
?>