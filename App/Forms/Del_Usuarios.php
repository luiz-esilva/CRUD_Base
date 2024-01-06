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
        if (isset($_POST['del_id'])) {
            // Recupera os dados do formulário
            $del_id = $_POST['del_id'];

            $usuario = new \App\Models\Usuarios();
            $usuario->setId($del_id);

            $CRUD_Usuarios = new \App\Models\CRUD_Usuarios();
            $CRUD_Usuarios->delete($del_id);
            
            header('Location: /index.php');
            exit;
        } else {
            // Se algum campo estiver ausente, exiba uma mensagem de erro ou tome a ação apropriada
            echo "Por favor, preencha todos os campos do formulário.";
        }
    }
?>