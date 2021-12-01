<?php
    require_once 'pdo.php';
    function user_select_all(){
        $sql = 'SELECT * from user';
        return pdo_query($sql);
    }

    function user_select_by_id($id){
        $sql = 'SELECT * from user where username=?';
        return pdo_query_one($sql, $id);
    }

    function user_delete($id){
        $sql1 = 'DELETE from course_signed where username=?';
        $sql2 = 'DELETE from blog_comment where username=?';
        $sql3 = 'DELETE from question_comment where username=?';
        $sql4 = 'DELETE from course_comment where username=?';
        $sql5 = 'DELETE from user where username=?';
        pdo_execute($sql1, $id);
        pdo_execute($sql2, $id);
        pdo_execute($sql3, $id);
        pdo_execute($sql4, $id);
        pdo_execute($sql5, $id);
    }

    function user_insert($username, $password, $fullname, $avt, $email, $position) {
        $sql = "INSERT into user(username, password, fullname, avatar, email, position) value(?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $username, $password, $fullname, $avt, $email, $position);
    } 

    function user_update($username, $fullname, $avt, $email, $position) {
        $sql = 'UPDATE user set fullname=?, avatar=?, email=?, position=? where username=?';
        pdo_execute($sql, $fullname, $avt, $email, $position, $username);
    }

    function user_update_password($username, $password){
        $sql = "UPDATE user set password = ? where username=?";
        pdo_execute($sql, $password, $username);
    }

    function user_exist($username){
        $sql = "SELECT count(*) from user where username=?";
        return pdo_query_value($sql, $username);
    }

    function user_select_password($username){
        $sql = 'SELECT password from user where username =?';
        return pdo_query_value($sql, $username);
    }

    function user_exist_email($username){
        $sql = "SELECT count(email) from user where username=?";
        return pdo_query_value($sql, $username) > 0;
    }

    function exist_email($email){
        $sql = "SELECT count(*) from user where email=?";
        return pdo_query_value($sql, $email);
    }
?>