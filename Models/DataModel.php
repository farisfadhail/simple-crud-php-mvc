<?php 

class DataModel 
{
    public static function getAllData()
    {
        global $conn;

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $users = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public static function createData($name, $nim, $email, $address)
    {
        global $conn;

        $sql = "INSERT INTO users(name, nim, email, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssss', $name, $nim, $email, $address);
        $stmt->execute();
    }

    public static function getDataById($id)
    {
        global $conn;

        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function updateData($id, $name, $nim, $email, $address) 
    {
        global $conn;
        $sql = "UPDATE users SET name = ?, nim = ?, email = ?, address = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssssi', $name, $nim, $email, $address, $id);
        $stmt->execute();
    }

    public static function deleteData($id)
    {
        global $conn;
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } 
}