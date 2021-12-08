<?php
    require_once '../../global.php';
    require '../../DAO/course.php';  
    require '../../DAO/lesson.php';
    require '../../DAO/quiz.php';
    require '../../DAO/comment.php';
    require '../../DAO/user.php';
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
        $user = $_SESSION['user'];
        extract($course_detail);
        extract($user);
        $VIEW_NAME = 'course/lesson.php';
    }
    else if(exist_param("first-lesson")){
        $first_lesson = lesson_select_first($id);
        $list_lesson = lesson_select_by_course($id);
        $course_detail = course_select_by_id($id);
        $user = $_SESSION['user'];
        extract($course_detail);
        extract($first_lesson);
        extract($user);
        $VIEW_NAME = 'course/lesson.php';
    }
    else if(exist_param("lesson-comment")){
        $today = date("Y-m-d");
        try {
            comment_lesson_insert($_SESSION['user']['username'], $lesson_id, $cmt_content, $today);
            unset($cmt_content);
            $list_lesson = lesson_select_by_course($id);
            $course_detail = course_select_by_id($id);
            $user = $_SESSION['user'];
            extract($course_detail);
            extract($user);
        } catch (PDOException $th) {
            echo "Lỗi";
        }
        $VIEW_NAME = 'course/lesson.php';
    }
    else if(exist_param("quizz")){
        $detail_quizz = quiz_select_by_id($id);
        extract($detail_quizz);
        $VIEW_NAME = 'course/quizz.php';
    }
    else if(exist_param("course-sign")){
        $today = date('Y-m-d');
        $user = $_SESSION['user'];
        extract($user);
        try {
            course_sign($username, $course_id, $today);
            $first_lesson = lesson_select_first($course_id);
            $list_lesson = lesson_select_by_course($course_id);
            $course_detail = course_select_by_id($course_id);
            extract($course_detail);
            extract($first_lesson);
        } catch (PDOException $th) {
            //throw $th;
        }
        $VIEW_NAME = 'course/lesson.php';
    }
    require '../layout.php';
?>