<?php
class UserModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }
    public function getisAdminByName($userName)
    {
        try {
            $stmt = $this->db->prepare("SELECT Position FROM users WHERE Username = ?");
            $stmt->execute([$userName]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['Position'] === 'admin') {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getUserByName($userName)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE Username = ?");
            $stmt->execute([$userName]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            unset($row['Password']);

            return $row;
        } catch (PDOException $e) {
            return [];
        }
    }



    public function getUsers()
    {
        try {

            $sql = "SELECT * From users";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        } catch (Exception $e) {
            // echo $sql . "<br>" . $e->getMessage();
            return false;
        }

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

    public function updateProfile($username, $email = '', $address = '', $phoneNumber = '', $birthday = '', $emergencyContact = '', $bloodType = '', $about = '')
    {
        $sql = "UPDATE users SET";
        $updateFields = array();

        if (!empty($email)) {
            $updateFields[] = "`Email` = '$email'";
        }
        if (!empty($address)) {
            $updateFields[] = "`Address` = '$address'";
        }
        if (!empty($phoneNumber)) {
            $updateFields[] = "`Phone Number` = '$phoneNumber'";
        }
        if (!empty($birthday)) {
            $updateFields[] = "`Birthday` = '$birthday'";
        }
        if (!empty($emergencyContact)) {
            $updateFields[] = "`Emergency Contact` = '$emergencyContact'";
        }
        if (!empty($bloodType)) {
            $updateFields[] = "`Blood Type` = '$bloodType'";
        }
        if (!empty($about)) {
            $updateFields[] = "`About` = '$about'";
        }

        if (!empty($updateFields)) {
            $sql .= " " . implode(", ", $updateFields);
            $sql .= " WHERE `Username` = :username"; // Use the Username column in the WHERE clause
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true; 
        }
    }



}
