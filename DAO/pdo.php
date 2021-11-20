<?php
    function pdo_get_connection(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';

        try{
            $conn = new PDO("mysql:host=$servername;dbname=itlearn", $username, $password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        } 
        catch(PDOException $e){
            echo "Connected failed: ".$e->getMessage();
        }
    }

    function pdo_execute($sql) {
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }

    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $value = $stmt->fetchAll();
            return $value;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }

    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $value = $stmt->fetch();
            return $value;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }

    function pdo_query_value($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
        
        
?>