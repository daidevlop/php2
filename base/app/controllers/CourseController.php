<?php
namespace App\Controllers;
use App\Models\Course;

class CourseController extends BaseController
{
    public $course;
    public function __construct()
    {
        $this->course = new Course();
    }
    public function getCourse() {
        $courses = $this->course->getListCourse();
        $this->render('course.index',compact('courses'));
    }
    public function dlCuorse($id)
    {
        $this->course->deleteCourse($id);
        header('Location:'.BASE_URL.'list-course');
    }
    public function addCourse()
    {
        $this->render('course.add');
    }
    public function postCourse()
    {
        $err=[];
        if(isset($_POST['btn'])){
            if(empty($_POST['course_name'])){
                $err[] = 'name khong duoc bo trong';
            }
            if(empty($_POST['price'])){
                $err[] = 'price khong duoc bo trong';
            }elseif($_POST['price'] < 0){
                $err[] = 'price khong duoc nho hon 0';
            }
            if(empty($_POST['teacher_name'])){
                $err[] = 'teacher khong duoc bo trong';
            }
            if(empty($_POST['description'])){
                $err[] = 'description khong duoc bo trong';
            }
            if(count($err)>0){
                redirect('errors', $err, 'add-course');
            }else{
                $check = $this->course->addCourse(NULL, $_POST['course_name'], $_POST['price'], $_POST['teacher_name'], $_POST['description']);
                if($check){
                    redirect('success', 'Them moi thanh cong', 'add-course');
                }
            }
        }
    }
    public function detailCourse($id)
    {
        $detail = $this->course->detail($id);
        $this->render('course.edit', compact('detail'));
    }
    public function editCourse($id)
    {
        $err=[];
        if(isset($_POST['btn'])){
            if(empty($_POST['course_name'])){
                $err[] = 'name khong duoc bo trong';
            }
            if(empty($_POST['price'])){
                $err[] = 'price khong duoc bo trong';
            }elseif($_POST['price'] < 0){
                $err[] = 'price khong duoc nho hon 0';
            }
            if(empty($_POST['teacher_name'])){
                $err[] = 'teacher khong duoc bo trong';
            }
            if(empty($_POST['description'])){
                $err[] = 'description khong duoc bo trong';
            }
            $route = 'detail-course/'.$id;
            if(count($err)>0){
                redirect('errors', $err, $route);
            }else{
                $check = $this->course->edit($id, $_POST['course_name'], $_POST['price'], $_POST['teacher_name'], $_POST['description']);
                if($check){
                    redirect('success', 'Them moi thanh cong', $route);
                }
            }
        }
    }
}