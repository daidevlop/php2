<?php

namespace App\Models;

class Course extends BaseModel
{
    public $table = 'course';
    public function getListCourse()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deleteCourse($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function addCourse($id, $course_name, $price, $teacher_name, $description)
    {
        $sql = "INSERT INTO $this->table VALUES (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $course_name, $price, $teacher_name, $description]);
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function edit($id,$course_name, $price, $teacher_name, $description)
    {
        $sql = "UPDATE $this->table SET course_name = ?, price = ?, teacher_name = ?, description = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$course_name, $price, $teacher_name, $description,$id]);
    }
}
