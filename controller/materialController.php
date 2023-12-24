<?php 
    require "Koneksi.php";
    class Material {
        public function getMaterial(){
            $query = "SELECT * FROM materials";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }
        
        public function getAllMaterialById($id){
            $query = "SELECT * FROM materials WHERE id_course = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function setMaterial($id, $title, $description, $link){
            $query = "INSERT INTO materials (id_course, title, description, link) VALUES ('$id', '$title', '$description', '$link')";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function deleteMaterial($id){
            $query = "DELETE FROM materials WHERE id_material = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function editMaterial($id, $title, $description, $link){
            $query = "UPDATE materials SET title = '$title', description = '$description', link = '$link' WHERE id_material = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }

        public function getMaterialById($id){
            $query = "SELECT * FROM materials WHERE id_material = '$id'";
            $result = mysqli_query($GLOBALS['koneksi'], $query);
            return $result;
        }
    }
?>