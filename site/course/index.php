<?php
    require_once '../../global.php';
    require '../../DAO/course.php';  
    require '../../DAO/lesson.php';
    require '../../DAO/quiz.php';
    require '../../DAO/comment.php';
    extract($_REQUEST);
    if(exist_param('btn-list')){
        $courses_front = course_select_by_cate(1);
        $courses_back = course_select_by_cate(2);
        $courses_basic = course_select_by_cate(3);
        $courses_mobile = course_select_by_cate(4);
        $VIEW_NAME = 'course/course.php';
    }
    else if(exist_param("detail-course")){
        $detail_course = course_select_by_id($id);
        $list_lesson = lesson_select_by_course($id);
        $number_lesson = lesson_count($id);
        $number_video = video_count($id);
        $number_quizz = quizz_count($id);
        $VIEW_NAME = 'course/detail.php';
    }
    else if(exist_param("lesson")){
        $list_lesson = lesson_select_by_course($id);
        $course_detail = course_select_by_id($id);
        extract($course_detail);
        $VIEW_NAME = 'course/lesson.php';
    }
    else if(exist_param("first-lesson")){
        $first_lesson = lesson_select_first($id);
        $list_lesson = lesson_select_by_course($id);
        $course_detail = course_select_by_id($id);
        $user = $_SESSION['user'];
        $list_comment = comment_lesson_select_all();
        extract($course_detail);
        extract($first_lesson);
        extract($user);
        $VIEW_NAME = 'course/lesson.php';
    }
    require '../layout.php';
?>