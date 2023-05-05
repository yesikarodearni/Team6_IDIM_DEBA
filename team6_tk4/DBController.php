<?php

class DBController
{
    private $user = "root";
    private $password = "";
    private $serverHost = "localhost";
    private $databaseTarget = "assignment_2";

    function connectDB()
    {
        $conn = mysqli_connect($this->serverHost, $this->user, $this->password, $this->databaseTarget);
        return $conn;
    }

    function runQuery($query)
    {
        $conn = $this->connectDB();
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    function numRows($query)
    {
        $conn = $this->connectDB();
        $result  = mysqli_query($conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    function updateQuery($query)
    {
        $conn = $this->connectDB();
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($conn));
        } else {
            return $result;
        }
    }

    function insertQuery($query)
    {
        $conn = $this->connectDB();
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($conn));
        } else {
            return $result;
        }
    }

    function deleteQuery($query)
    {
        $conn = $this->connectDB();
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($conn));
        } else {
            return $result;
        }
    }
}
