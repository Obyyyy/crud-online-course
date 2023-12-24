<?php 
    require "Koneksi.php";
    require "Controller/courseController.php";

    $course = new Course();
    $result = $course -> getCourse();
    if(isset($_GET['id_course'])){
        $id = $_GET['id_course'];
        $course -> deleteCourse($id);
        header("Location: course.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        font-family: Georgia, Geneva, Tahoma, sans-serif
    }

    h1 {
        border-bottom: 2px solid #BFCCB5;
        padding-bottom: 10px;
        text-align: center;
    }

    .margin {
        margin: 50px 5%;
    }

    .table {
        text-align: center;
    }
    </style>
    <script src="https://kit.fontawesome.com/14edc419b7.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="margin">
        <!-- <h1>Online Course</h1> -->

        <div class="card">
            <div class="card-header bg-primary text-white">
                <center>
                    <h3>Daftar Online Course</h3>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Judul Course</th>
                            <th>Deskripsi Course</th>
                            <th>Durasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php 
        $no = 1;
        while($baris = mysqli_fetch_assoc($result))
        {
    ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo $baris['title']; ?></td>
                            <td><?php echo $baris['description']; ?></td>
                            <td><?php echo $baris['duration']; ?></td>
                            <td>
                                <a href='formCourse.php?id_course=<?=$baris['id_course'];  ?>'
                                    class='btn btn-warning'><i class="fa-solid fa-pen"></i> </a>&nbsp;
                                <a href='javascript:confirmDelete("course.php?id_course=<?=$baris['id_course'];  ?>")'
                                    class='btn btn-danger'><i class="fa-solid fa-trash-can"></i> </a>
                                <a href='courseDetail.php?id_course=<?=$baris['id_course'];  ?>'
                                    class='btn btn-primary'><i class="fa-solid fa-eye"></i> </a>
                            </td>
                        </tr>
                        <?php 
        }
    ?>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="formCourse.php" role="button"><i class="fa-solid fa-square-plus"></i>
                    Tambah Course</a>
            </div>
        </div>
    </div>
    <script>
    function confirmDelete(url) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = url;
        }
    }
    </script>
</body>

</html>