<?php 
    namespace App\Models;
    

    class User{

        private static $table = 'user';


        public static function getUser($id)
        {
            $conn = new \PDO ('mysql:host=localhost;dbname=serie_login',  DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(':id', $id);
            $stmt -> execute();

            if ($stmt -> rowCount() > 0)
            {
                return $stmt -> fetch(\PDO::FETCH_ASSOC);
            } 
            else
            {
                throw new \Exception("Nenhum usuário encontrado");
            }


        }
        public static function getAllUser()
        {
            $conn = new \PDO ('mysql:host=localhost;dbname=serie_login',  DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table;
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();

                if ($stmt -> rowCount() > 0)
                    {
                        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
                    } 
                    else
                    {
                        throw new \Exception("Nenhum usuário encontrado");
                    }
        }

        public static function insert($data)
        {
            $conn = new \PDO ('mysql:host=localhost;dbname=serie_login',  DBUSER, DBPASS);
            
            $sql = 'INSERT INTO '.self::$table.' (email, name, password) VALUES'. ' (?, ?, ?)';
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $_POST['email']);
            $stmt -> bindValue(2, $_POST['name']);
            $stmt -> bindValue(3, $_POST['password']);
            $stmt -> execute();

            if ($stmt -> rowCount() > 0)
            {
                return 'Usuário adicionado com sucesso';
            } 
            else
            {
                throw new \Exception("Nenhum usuário Adicionado");
            }
        }
        
        public static function delete($id)
        {
            $conn = new \PDO ('mysql:host=localhost;dbname=serie_login',  DBUSER, DBPASS);
            
            $sql = 'DELETE FROM '. self::$table. ' WHERE id ='. ' ?';
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $id);
            $stmt -> execute();

            if ($stmt)
            {
                return 'Usuário deletado com sucesso';
            } 
            else
            {
                throw new \Exception("Erro");
            }
        }
    }
