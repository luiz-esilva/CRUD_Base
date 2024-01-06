<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dusis - CRUD</title>
</head>
<body>
    <form action="App\Forms\Cad_Usuarios.php" method="POST">
        <input type="text" placeholder="Insira o nome de usuário" name="nome_usuario" id="nome_usuario" required>
        <input type="text" placeholder="Insira a senha de usuário" name="senha_usuario" id="senha_usuario" required>
        <input type="text" placeholder="Insira o Primeiro Nome" name="primeiro_nome" id="primeiro_nome" required>
        <input type="text" placeholder="Insira o Sobrenome" name="sobrenome_usuario" id="sobrenome_usuario" required>
        <input type="date" name="data_nascimento" id="data_nascimento" required>
        <input type="submit" value="Cadastrar Usuário">
    </form>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Usuario</td>
                <td>Senha</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Data de Nascimento</td>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once 'vendor/autoload.php';

                $CRUD_Usuarios = new \App\Models\CRUD_Usuarios();
                foreach($CRUD_Usuarios->read() as $resultado):
                    echo "<tr>";
                    echo "<td>" . $resultado['idlogin'] . "</td>";
                    echo "<td>" . $resultado['usr_usuario'] . "</td>";
                    echo "<td>" . $resultado['pwd_usuario'] . "</td>";
                    echo "<td>" . $resultado['nome_usuario'] . "</td>";
                    echo "<td>" . $resultado['sobrenome_usuario'] . "</td>";
                    echo "<td>" . $resultado['nascimento_usuario'] . "</td>";
                    echo "</tr>";
                endforeach;
            ?>
        </tbody>
    </table>

    <form action="App\Forms\Att_Usuarios.php" method="POST">
        <select name="att_id" id="att_id">
            <?php
                require_once 'vendor/autoload.php';

                $CRUD_Usuarios = new \App\Models\CRUD_Usuarios();
                foreach($CRUD_Usuarios->read() as $resultado):
                    echo '<option value="' . $resultado['idlogin'] .'">' . $resultado['idlogin'] . '</option>';
                endforeach;
            ?>
        </select>
        <input type="text" placeholder="Insira o Primeiro Nome" name="att_nome" id="att_nome" required>
        <input type="text" placeholder="Insira o Sobrenome" name="att_sobrenome" id="att_sobrenome" required>
        <input type="date" name="att_nascimento" id="att_nascimento" required>
        <input type="submit" value="Atualizar Informações">
    </form>

    <form action="App\Forms\Del_Usuarios.php" method="POST">
        <select name="del_id" id="del_id" required>
            <?php
                require_once 'vendor/autoload.php';

                $CRUD_Usuarios = new \App\Models\CRUD_Usuarios();
                foreach($CRUD_Usuarios->read() as $resultado):
                    echo '<option value="' . $resultado['idlogin'] .'">' . $resultado['idlogin'] . '</option>';
                endforeach;
            ?>
        </select>
        <input type="submit" value="Deletar Usuario">
    </form>
</body>
</html>