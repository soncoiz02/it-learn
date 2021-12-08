<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/lesson.php';
    require '../../DAO/quiz.php';

    extract($_REQUEST);
    check_login();
    if(exist_param("quiz-list")){
        $limit = 10;
        $max_page = ceil(count(quiz_selectall())/ $limit) - 1;
        isset($page_no) ? $_SESSION['page_no'] = $page_no : $_SESSION['page_no'] = 0;
        $page_num = isset($page_no) ? $page_no : 0;
        $list_quiz = quiz_select_by_page($page_num);
        $VIEW_NAME = 'quiz/list.php';
    }
    else if(exist_param("quiz-add")){
        $list_lesson = lesson_select_all();
        $VIEW_NAME = 'quiz/add.php';
    }
    elseif(exist_param("btn-insert")){
        try {
            quiz_insert($quiz_id, $lesson_id, $question, $as1, $as2, $as3, $as4);
            unset($question, $as1, $as2, $as3, $as4);
            $list_lesson = lesson_select_all();
            $MESSAGE = 'Thêm quiz thành công';
            $type = 'success';
        } catch (PDOException $th) {
            $MESSAGE = 'Thêm quiz thất bại';
            $type = 'fail';
        }
        $VIEW_NAME = 'quiz/add.php';
    }
    else if(exist_param('update-quiz')){
        $list_lesson = lesson_select_all();
        $quiz_detail = quiz_select_by_id($quiz_id);
        extract($quiz_detail);
        $VIEW_NAME = 'quiz/update.php';
    }
    else if(exist_param("btn-update")){
        try {
            quiz_update($quiz_id, $question, $as1, $as2, $as3, $as4);
            unset($question, $as1, $as2, $as3, $as4);
            $list_lesson = lesson_select_all();
            $quiz_detail = quiz_select_by_id($quiz_id);
            extract($quiz_detail);
            $MESSAGE = "Cập nhật thành công";
            $type = 'success';
        } catch (PDOException $th) {
            $MESSAGE = "Cập nhật thất bại";
            $type = 'fail';
        }
        $VIEW_NAME = 'quiz/update.php';
    }
    else if(exist_param("delete-quiz")){
        try {
            quiz_delete($quiz_id);
            $limit = 10;
            $max_page = ceil(count(quiz_selectall())/ $limit) - 1;
            isset($page_no) ? $_SESSION['page_no'] = $page_no : $_SESSION['page_no'] = 0;
            $page_num = isset($page_no) ? $page_no : 0;
            $list_quiz = quiz_select_by_page($page_num);
        } catch (PDOException $th) {
            //throw $th;
        }
        $VIEW_NAME = 'quiz/list.php';
    }
    require '../layout.php';
?>