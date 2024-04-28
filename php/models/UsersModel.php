<?php
class UserModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function loginUser($user)
    {
        try {

            $password = $user['password'];
            $username = $this->db->quote($user['username']);

            $sql = "SELECT ID, Password FROM users WHERE Username = $username";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($row && ($password === $row['Password'])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // echo $sql . "<br>" . $e->getMessage();
            return false;
        }


    }
}
