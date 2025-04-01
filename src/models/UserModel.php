<?php

namespace App\models;
use PDO;
class UserModel extends Model
{
    public function select()
    {
        $stmt = $this->conn->prepare("SELECT ID, Fullname, Username, Status, Usertype
                                        FROM user_table
                                        ORDER BY ID ASC
                                        ;
                                        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectByUserName(string $username): array | bool
    {
        $stmt = $this->conn->prepare("SELECT * FROM user_table WHERE Username = :un;");
        $stmt->bindParam(':un', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}