<?php
    require_once '../../global.php';
    require '../../DAO/blog.php';
    require '../../DAO/user.php';

    function handle_date($today, $date){
        return round(abs(strtotime($today) - strtotime($date)) / (60*60*24),0);
    }
    if(exist_param("list-blog")){
        $list_blog = blog_select_all();
        $VIEW_NAME = 'blog/blog.php';
    }
    else if(exist_param("detail-blog")){
        $detail_blog = blog_select_by_id($blog_id);
        $list_comment = blog_select_comment($blog_id);
        extract($detail_blog);
        $author = user_select_by_id($username);
        extract($author);
        $VIEW_NAME = 'blog/detail.php';
    }
    else if(exist_param("add-blog")){
        $VIEW_NAME = 'blog/add.php';
    }
    require '../layout.php';
?>