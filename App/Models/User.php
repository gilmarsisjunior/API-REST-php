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
    }
