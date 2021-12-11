<?php
    require_once 'pdo.php';
    function blog_select_all(){
        $sql = 'SELECT * from blog group by blog_id desc';
        return pdo_query($sql);
    }

    function blog_select_by_id($id){
        $sql = 'SELECT * from blog where blog_id=?';
        return pdo_query_one($sql, $id);
    }

    function blog_select_by_user($username){
        $sql = 'SELECT * from blog where username=?';
        return pdo_query($sql, $username);
    }

    function blog_delete($id){
        $sql1 = 'DELETE from blog_comment where blog_id=?';
        $sql2 = 'DELETE from blog where blog_id=?';
        pdo_execute($sql1, $id);
        pdo_execute($sql2, $id);
    }

    function blog_insert( $title, $username, $content, $avt, $cate_id, $date) {
        $sql = "INSERT into blog(title, username, content, avatar, cate_id, date) value(?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $title, $username, $content, $avt, $cate_id, $date);
    } 

    function blog_select_comment($blog_id){
        $sql = 'SELECT * from blog_comment where blog_id=?';
        return pdo_query($sql, $blog_id);
    }

    function blog_count_comment($blog_id){
        $sql = 'SELECT count(*) from blog_comment where blog_id=?';
        return pdo_query_value($sql, $blog_id);
    }

    function blog_count_like($blog_id){
        $sql = "SELECT count(username) from blog_liked where blog_id=?";
        return pdo_query_value($sql, $blog_id);
    }

    function blog_liked($username, $blog_id){
        $sql = "INSERT into blog_liked(blog_id, username) values(?,?)";
        pdo_execute($sql, $blog_id, $username);
    }

    function blog_liked_delete($username, $blog_id){
        $sql = 'DELETE from blog_liked where username=? and blog_id=?';
        pdo_execute($sql, $username, $blog_id);
    }

    function blog_liked_exist_user($username, $blog_id){
        $sql = 'SELECT count(*) from blog_liked where username=? and blog_id=?';
        return pdo_query_value($sql, $username, $blog_id);
    }

    function blog_saved($username, $blog_id){
        $sql = 'INSERT into blog_saved(blog_id, username) values(?,?)';
        pdo_execute($sql, $blog_id, $username);
    }

    function blog_saved_delete($username, $blog_id){
        $sql = 'DELETE from blog_saved where username=? and blog_id=?';
        pdo_execute($sql, $username, $blog_id);
    }

    function blog_saved_exist_user($username, $blog_id){
        $sql = 'SELECT count(*) from blog_saved where username=? and blog_id=?';
        return pdo_query_value($sql, $username, $blog_id);
    }
    
    function blog_saved_select($username){
        $sql = 'SELECT * from blog join blog_saved on blog.blog_id = blog_saved.blog_id where blog_saved.username = ?';
        return pdo_query($sql, $username);
    }

    function blog_select_top10(){
        $sql = 'SELECT blog.blog_id, blog.title, blog.username, blog.avatar, blog.date FROM `blog` JOIN blog_liked ON blog.blog_id = blog_liked.blog_id GROUP BY blog.blog_id ORDER BY COUNT(blog_liked.username) DESC LIMIT 0, 10';
        return pdo_query($sql);
    }

    function blog_count_by_cate($cate_name){
        $sql = "SELECT count(*) from blog where cate_id like '%$cate_name%' ";
        return pdo_query_value($sql);
    }

    function select_lastest_blog($today, $day_ago){
        $sql = 'SELECT * from blog where date between ? and ?';
        return pdo_query($sql, $day_ago, $today);
    }

    function count_blog_today($today){
        $sql = 'SELECT count(*) from blog where date=?';
        return pdo_query_value($sql, $today);
    }

    function count_total_blog(){
        $sql = "SELECT count(*) from blog";
        return pdo_query_value($sql);
    }

    function blog_search($key){
        $sql = "SELECT * from blog where title like '%$key%'";
        return pdo_query($sql);
    }

    function blog_update($blog_id, $title, $content, $avt, $date, $tag){
        $sql = 'UPDATE blog set title=?, content=?, avatar=?, cate_id=?, date=? where blog_id=?';
        pdo_execute($sql, $title, $content, $avt, $tag, $date, $blog_id);
    }

    function blog_select_all_count(){
        $sql = 'SELECT blog.blog_id, blog.title,blog.username, blog.date, count(blog_comment.blog_id) as num from blog join blog_comment on blog.blog_id = blog_comment.blog_id group by blog_comment.blog_id having num > 0';
        return pdo_query($sql);
    }
?>