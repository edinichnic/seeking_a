<?php

class UserModel
{
    static function connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "Kralim";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error)
            throw new Exception();
        $conn->select_db('seeking_a');
        return $conn;
    }

    static function changeFollow($userID)
    {
        $conn = self::connection();
        $res = $conn->query("update users set follow = not follow where id = $userID");
        $conn->close();

        return self::getFollowStatus($userID);
    }

    static function getFollowCount()
    {
        $conn = self::connection();
        $res = $conn->query("select count(1) from users where follow = 1");
        $row = $res->fetch_array(MYSQLI_NUM);
        $conn->close();
        return $row[0];
    }

    static function getFollowStatus($userID)
    {
        $conn = self::connection();
        $res = $conn->query("select follow from users where id = $userID");
        $row = $res->fetch_array(MYSQLI_NUM);
        $conn->close();
        return $row[0];
    }

    static function userExists($userID)
    {
        $conn = self::connection();
        $res = $conn->query("select 1 from users where id = $userID");
        $row = $res->fetch_array(MYSQLI_NUM);
        $conn->close();
        return $row[0];
    }

}