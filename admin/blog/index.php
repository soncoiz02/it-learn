<?php
    require_once '../../global.php';
    require '../../DAO/blog.php';
    require '../../DAO/user.php';

    extract($_REQUEST);

    if(exist_param("list-blog")){
        $list_blog = blog_select_all();
        $VIEW_NAME = 'blog/list.php';
    }
    else if(exist_param("detail-blog")){
        $detail_blog = blog_select_by_id($blog_id);
        extract($detail_blog);
        $VIEW_NAME = 'blog/detail.php';
    }
    else if(exist_param("delete-blog")){
        try {
            blog_delete($blog_id);
            $list_blog = blog_select_all();
        } catch (PDOException $th) {
            //throw $th;
        }
        $VIEW_NAME = 'blog/list.php';
    }
    require '../layout.php';
?>