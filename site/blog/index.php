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
        extract($detail_blog);
        $author = user_select_by_id($username);
        extract($author);
        $VIEW_NAME = 'blog/detail.php';
    }
    else if(exist_param("btn-comment")){
        extract($_SESSION['user']);
        $today = date('Y-m-d');
        try {
            comment_blog_insert($username, $blog_id, $content, $today);
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
    else if(exist_param("btn-like")){
        if(blog_liked_exist_user($_SESSION['user']['username'], $blog_id) == 0){
            try {
                blog_liked($_SESSION['user']['username'], $blog_id);
                $detail_blog = blog_select_by_id($blog_id);
                $list_comment = blog_select_comment($blog_id);
                extract($detail_blog);
                $author = user_select_by_id($username);
                extract($author);
            } catch (PDOException $th) {
                //throw $th;
            }
        }
        else {
            try {
                blog_liked_delete($_SESSION['user']['username'], $blog_id);
                $detail_blog = blog_select_by_id($blog_id);
                $list_comment = blog_select_comment($blog_id);
                extract($detail_blog);
                $author = user_select_by_id($username);
                extract($author);
            } catch (PDOException $th) {
                //throw $th;
            }
        }
        $VIEW_NAME = 'blog/detail.php';
    }
    else if(exist_param("btn-saved")){
        if(blog_saved_exist_user($_SESSION['user']['username'], $blog_id) == 0){
            try {
                blog_saved($_SESSION['user']['username'], $blog_id);
                $detail_blog = blog_select_by_id($blog_id);
                $list_comment = blog_select_comment($blog_id);
                extract($detail_blog);
                $author = user_select_by_id($username);
                extract($author);
            } catch (PDOException $th) {
                //throw $th;
            }
        }
        else {
            try {
                blog_saved_delete($_SESSION['user']['username'], $blog_id);
                $detail_blog = blog_select_by_id($blog_id);
                $list_comment = blog_select_comment($blog_id);
                extract($detail_blog);
                $author = user_select_by_id($username);
                extract($author);
            } catch (PDOException $th) {
                //throw $th;
            }
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
        if(isset($tag)){
            $tag_string = implode(', ',$tag);
        }
        if($title == '' && $blog_content == ''){
            $MESSAGE = 'Bài viết cần có tiêu đề và nội dung';
            $type = 'fail';
        }
        else{
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
    else if(exist_param("update-blog")){
        $detail_blog = blog_select_by_id($blog_id);
        extract($detail_blog);
        $list_cate = cate_select_all();
        $VIEW_NAME = 'blog/edit.php';
    }
    else if(exist_param("btn-update")){
        $today = date('Y-m-d');
        $file_name = save_file("blog_img", "$IMAGE_DIR/blog/");
        $img = strlen(strval($file_name)) > 0 ? $file_name : $current_img;
        if(isset($tag)){
            $tag_string = implode(', ',$tag);
        }
        if($title == '' && $blog_content == ''){
            $MESSAGE = 'Bài viết cần có tiêu đề và nội dung';
            $type = 'fail';
        }
        else{
            try {
                blog_update($blog_id, $title, $blog_content, $img, $today, $tag_string);
                unset($title, $blog_content, $img, $tag_string);
                $detail_blog = blog_select_by_id($blog_id);
                extract($detail_blog);
                $MESSAGE = "Cập nhật thành công";
                $type = 'success';
            }
            catch (Exception $exc) {
                $MESSAGE = "Cập nhật thất bại";
                $type = 'fail';
            }
        }
        $list_cate = cate_select_all();
        $VIEW_NAME = 'blog/edit.php';
    }
    else if(exist_param("blog-saved")){
        $list_blog = blog_saved_select($_SESSION['user']['username']);
        $VIEW_NAME = 'blog/blogsaved.php';
    }

    require '../layout.php';
?>