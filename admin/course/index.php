<?php
    require_once '../../global.php';
    require '../../DAO/course.php';
    require '../../DAO/cate.php';
    require '../../DAO/lesson.php';

    extract($_REQUEST);
    check_login();
    if(exist_param("btn-list")){
        $list_course = course_select_all();
        $VIEW_NAME = "course/list.php";
    }
    else if(exist_param("btn-add")){
        $list_cate = cate_select_all();
        $VIEW_NAME = "course/add.php";
    }
    else if(exist_param('btn-insert')){
        $file_name = save_file("course_img", "$IMAGE_DIR/course/");
        $img = strlen(strval($file_name)) > 0 ? $file_name : '';
        try {
            course_insert($course_name, $course_tag, $img, $course_dsc);
            unset($course_name, $cate_id, $img, $course_dsc);
            $MESSAGE = "Thêm mới thành công";
            $type = 'success';
        }
        catch (Exception $exc) {
            $MESSAGE = "Thêm mới thất bại";
            $type = 'fail';
        }
        $list_cate = cate_select_all();
        $VIEW_NAME = 'course/add.php';
    }
    else if(exist_param('btn-delete')){
        try {
            course_delete($course_id);
            $list_course = course_select_all();
            $MESSAGE = "Thêm mới thành công";
            $type = 'success';
        }
        catch (Exception $exc) {
            $MESSAGE = "Thêm mới thất bại";
            $type = 'fail';
        }
        $VIEW_NAME = "course/list.php";
    }
    else if(exist_param("btn-lesson")){
        $list_course = course_select_all();
        $VIEW_NAME = "course/lesson.php";
    }
    else if(exist_param("btn-add-lesson")){
        $list_video = video_select_all();
        $list_doc = doc_select_all();
        $detail = course_select_by_id($course_id);
        extract($detail);
        $VIEW_NAME = "course/addlesson.php";
    }
    else if(exist_param("update-course")){
        $detail_course = course_select_by_id($course_id);
        $list_cate = cate_select_all();
        extract($detail_course);
        $VIEW_NAME = 'course/update.php';
    }
    else if(exist_param("btn-update")){
        $file_name = save_file("course_img", "$IMAGE_DIR/course/");
        $img = strlen(strval($file_name)) > 0 ? $file_name : $img;
        try {
            course_update($course_id, $course_name, $course_tag, $img, $course_dsc);
            $detail_course = course_select_by_id($course_id);
            $list_cate = cate_select_all();
            extract($detail_course);
            $MESSAGE = "Cập nhật thành công";
            $type = 'success';
        } catch (PDOException $e) {
            throw $e;
            $MESSAGE = "Cập nhật thất bại";
            $type = 'fail';
        }
        $VIEW_NAME = 'course/update.php';
    }
    else if(exist_param("detail-course")){
        $detail_course = course_select_by_id($course_id);
        $list_lesson = lesson_select_by_course($course_id);
        extract($detail_course);
        $VIEW_NAME = 'course/detail.php';
    }
    else if(exist_param("btn-insert-lesson")){
        $file_name = save_file("doc_file", "$DOCUMENT_DIR/");
        $file = strlen(strval($file_name)) > 0 ? $file_name : '';
        try {
            lesson_insert($lesson_id, $course_id, $title, $file, $vid_link);
            $MESSAGE = "Thêm bài học thành công";
            $type = 'success';
        } catch (PDOException $e) {
            $MESSAGE = "Thêm bài học thất bại";
            $type = 'fail';
        }
        $detail = course_select_by_id($course_id);
        $list_video = video_select_all();
        $list_doc = doc_select_all();
        extract($detail);
        
        $VIEW_NAME = "course/addlesson.php";
    }
    else if(exist_param("update-lesson")){
        $detail_lesson = lesson_select_by_id($lesson_id);
        extract($detail_lesson);
        $course_detail = course_select_by_id($course_id);
        extract($course_detail);
        $VIEW_NAME = 'updatelesson.php';
    }
    else if(exist_param('btn-update-lesson')){
        $file_name = save_file("doc_file", "$DOCUMENT_DIR/");
        $file = strlen(strval($file_name)) > 0 ? $file_name : $current_file;
        try {
            lesson_update($lesson_id, $course_id, $title, $vid_link, $file);
            unset($title, $vid_link, $doc_file);
            $detail_lesson = lesson_select_by_id($lesson_id);
            extract($detail_lesson);
            $course_detail = course_select_by_id($course_id);
            extract($course_detail);
            $MESSAGE = 'Cập nhật thành công';
            $type = 'success';
        } catch (PDOException $th) {
            $MESSAGE = 'Cập nhật thất bại';
            $type = 'fail';
        }
        $VIEW_NAME = 'updatelesson.php';
    }
    else if(exist_param('delete-lesson')){
        try {
            lesson_delete($less_id);
            $MESSAGE = "Xóa bài học thành công";
            $type = 'success';
            $list_course = course_select_all();
        } catch (PDOException $e) {
            $MESSAGE = "Xóa bài học thất bại";
            $type = 'fail';
        }
        $VIEW_NAME = 'course/lesson.php';
    }
    require '../layout.php';
?>