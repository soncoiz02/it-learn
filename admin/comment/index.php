<?php
    require_once '../../global.php';
    require '../../DAO/comment.php';
    require '../../DAO/user.php';
    require '../../DAO/question.php';
    require '../../DAO/blog.php';
    require '../../DAO/lesson.php';

    extract($_REQUEST);
    check_login();
    if(exist_param("ask-list")){
        $list_comment_question = question_select_all();
        $VIEW_NAME = 'comment/ask.php';
    }
    else if(exist_param("detail-ask")){
        $list_comment = comment_question_select_by_id($ques_id);
        $detail_ques = question_select_by_id($ques_id);
        extract($detail_ques);
        $detail_title = "Chi tiết: $content";
        $VIEW_NAME = 'comment/detail.php';
    }
    else if(exist_param("detail-blog")){
        $list_comment = comment_blog_select_by_id($blog_id);
        $detail_blog = blog_select_by_id($blog_id);
        extract($detail_blog);
        $detail_title = "Chi tiết: $title";
        $VIEW_NAME = 'comment/detail.php';
    }
    else if(exist_param("detail-lesson")){
        $list_comment = comment_lesson_select_by_lesson($lesson_id);
        $detail_lesson = lesson_select_by_id($lesson_id);
        extract($detail_lesson);
        $detail_title = "Chi tiết: $title";
        $VIEW_NAME = 'comment/detail.php';
    }
    else if(exist_param("blog-list")){
        $list_comment_blog = blog_select_all();
        $VIEW_NAME = 'comment/blog.php';
    }
    else if(exist_param("course-list")){
        $list_comment_lesson = comment_lesson_select_all();
        $VIEW_NAME = 'comment/course.php';
    }
    else if(exist_param("delete-cmt")){
        if(exist_param("cmt-blog")){
            try {
                comment_blog_delete($cmt_id);
                $list_comment = comment_blog_select_by_id($blog_id);
                $detail_blog = blog_select_by_id($blog_id);
                extract($detail_blog);
                $detail_title = "Chi tiết: $title";
            } catch (PDOException $th) {
                //throw $th;
            }
        }
        else if(exist_param("cmt-ques")){
            try {
                comment_question_delete($cmt_id);
                $list_comment = comment_question_select_by_id($ques_id);
                $detail_ques = question_select_by_id($ques_id);
                extract($detail_ques);
                $detail_title = "Chi tiết: $content";
            } catch (PDOException $th) {
                //throw $th;
            }
        }
        if(exist_param("cmt-lesson")){
            try {
                comment_course_delete($cmt_id);
                $list_comment = comment_lesson_select_by_lesson($lesson_id);
                $detail_lesson = lesson_select_by_id($lesson_id);
                extract($detail_lesson);
                $detail_title = "Chi tiết: $title";
            } catch (PDOException $th) {
                //throw $th;
            }
        }
        $VIEW_NAME = 'comment/detail.php';
    }
    require '../layout.php';
?>