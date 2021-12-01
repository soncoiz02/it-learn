<?php
    require_once '../../global.php';
    require '../../DAO/blog.php';
    require '../../DAO/user.php';
    require '../../DAO/cate.php';
    require '../../DAO/comment.php';
    extract($_REQUEST);
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
        $author = user_select_by_id($_SESSION['user']['username']);
        extract($detail_blog);
        extract($author);
        $VIEW_NAME = 'blog/detail.php';
    }
    else if(exist_param("btn-comment")){
        extract($_SESSION['user']);
        try {
            comment_blog_insert($username, $blog_id, $content);
            $detail_blog = blog_select_by_id($blog_id);
            $list_comment = blog_select_comment($blog_id);
            $author = user_select_by_id($username);
            unset($blog_id, $content);
            extract($detail_blog);
            extract($author);
        } catch (PDOException $th) {
            echo "Lỗi";
        }
        $VIEW_NAME = 'blog/detail.php';
    }
    else if(exist_param("add-blog")){
        $list_cate = cate_select_all();
        $VIEW_NAME = 'blog/add.php';
    }
    else if(exist_param("insert-blog")){
        extract($_SESSION['user']);
        $today = date('Y-m-d');
        $file_name = save_file("blog_img", "$IMAGE_DIR/blog/");
        $img = strlen(strval($file_name)) > 0 ? $file_name : '';
        $tag_string = implode(', ',$tag);
        try {
            blog_insert($title, $username, $blog_content, $img, $tag_string, $today);
            unset($title, $username, $blog_content, $img, $tag_string);
            $MESSAGE = "Đăng thành công";
            $type = 'success';
        }
        catch (Exception $exc) {
            $MESSAGE = "Đăng thất bại";
            $type = 'fail';
        }
        $list_cate = cate_select_all();
        $VIEW_NAME = 'blog/add.php';
    }
    else if(exist_param('my-blog')){
        extract($_SESSION['user']);
        $list_blog = blog_select_by_user($username);
        $VIEW_NAME = 'blog/myblog.php';
    }
    else if(exist_param("delete-blog")){
        try {
            blog_delete($blog_id);
            extract($_SESSION['user']);
            $list_blog = blog_select_by_user($username);
            $MESSAGE = 'Xóa thành công';
            $type = 'success';
        } catch (PDOException $th) {
           $MESSAGE = 'Xóa thất bại';
           $type = 'fail';
        }
        $VIEW_NAME = 'blog/myblog.php';
    }

    require '../layout.php';
?>