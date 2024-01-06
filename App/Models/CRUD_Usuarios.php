<?php
    namespace App\Models;
    
    class CRUD_Usuarios {
        // Insere os dados no banco de dados
        public function create(Usuarios $u) {
            $sql = 'INSERT INTO login (usr_usuario, pwd_usuario, nome_usuario, sobrenome_usuario, nascimento_usuario) VALUES (?, ?, ?, ?, ?)';

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $u->getUsuario());
            $stmt->bindValue(2, $u->getSenha());
            $stmt->bindValue(3, $u->getNome());
            $stmt->bindValue(4, $u->getSobrenome());
            $stmt->bindValue(5, $u->getNascimento());
            $stmt->execute();
        }

        // Faz a leitura dos dados no banco de dados
        public function read() {
            $sql = 'SELECT * FROM login';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
        }

        // Atualiza os dados no banco de dados
        public function update(Usuarios $u) {
            $sql = 'UPDATE login SET nome_usuario = ?, sobrenome_usuario = ?, nascimento_usuario = ? WHERE idlogin = ?';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $u->getNome());
            $stmt->bindValue(2, $u->getSobrenome());
            $stmt->bindValue(3, $u->getNascimento());
            $stmt->bindValue(4, $u->getId());
            $stmt->execute();
        }

        // Deleta dados no banco de dados
        public function delete($id) {
            $sql = 'DELETE FROM login WHERE idlogin = ?';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
        }
    }
?>