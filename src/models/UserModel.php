<?php

namespace App\models;
use PDO;
use Exception;
class UserModel extends Model
{
    public function select()
    {
        $stmt = $this->conn->prepare("SELECT ID, Fullname, Username, Status, User_type, Score
                                        FROM user_table
                                        ORDER BY ID ASC
                                        ;
                                        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selecttop10()
    {
        $stmt = $this->conn->prepare("SELECT *
                                        FROM user_table
                                        ORDER BY Score DESC
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
    public function addUser(string $username, string $hashedPassword, string $fullname) {
        $stmt = $this->conn->prepare("INSERT INTO user_table (Username,Pass,Fullname) VALUES(:username, :pass, :fullname)");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function idExist(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM user_table WHERE ID = :id LIMIT 1;");
        $stmt->execute([':id' => $id]);
        return ($stmt->rowCount() > 0);
    }
    public function updateStatus(int $stt, int $id) {
        $stmt = $this->conn->prepare("UPDATE user_table SET Status = :stt WHERE ID = :id");
        $stmt->execute([':stt' => $stt ,':id' => $id]);
    }
    public function resetscore(int $id) {
        $stmt = $this->conn->prepare("UPDATE user_table SET Score = 0 WHERE ID = :id");
        $stmt->execute([':id' => $id]);
    }

    public function update(array $data) {
        if (!$this->idExist($data['ID'])) {
            throw new Exception('User does not exist!');
        }
        $stmt = $this->conn->prepare('UPDATE user_table SET Fullname = :fn, Username = :un, status = :s, User_type = :ut, Score = :sc WHERE ID = :id;');
        $stmt->execute([
            'id' => $data['ID'],
            'fn' => $data['Fullname'],
            'un' => $data['Username'],
            's' => $data['Status'],
            'ut' => $data['User_type'],
            'sc' => $data['Score']
        ]);
    }
    public function deluser(int $id) {
        if(!$this->idExist($id)){
            throw new Exception('User does not exist!');
        }
        $stmt = $this->conn->prepare('DELETE FROM user_table WHERE ID = :id');
        $stmt->execute(['id' => $id]);
    }
    public function add(string $username, string $hashedPassword, string $fullname, string $usertype, int $status) {
        $stmt = $this->conn->prepare("INSERT INTO user_table (Username,Pass,Fullname, User_type, status) VALUES(:username, :pass, :fullname, :usertype, :status)");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
        $stmt->bindParam(":usertype", $usertype, PDO::PARAM_STR);
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
