<?php 
    require "Koneksi.php";
    class Course {
        public function getCourse(){
            $query = "SELECT * FROM courses";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function setCourse($title, $description, $duration){
            $query = "INSERT INTO courses (title, description, duration) VALUES ('$title', '$description', '$duration')";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function deleteCourse($id){
            $query = "DELETE FROM courses WHERE id_course = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function editCourse($id, $title, $description, $duration){
            $query = "UPDATE courses SET title = '$title', description = '$description', duration = '$duration' WHERE id_course = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function getCourseById($id){
            $query = "SELECT * FROM courses WHERE id_course = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }
    }
?>