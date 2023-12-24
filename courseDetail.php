<?php 
    require "config/Koneksi.php";
    require "Controller/courseController.php";
    require "Controller/materialController.php";

    if (isset($_GET['id_course'])) 
    {     
        $id = $_GET['id_course'];     
        $course = new Course();     
        $result = $course->getCourseById($id);     
        $baris = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        
        $material = new Material();
        $result2 = $material->getAllMaterialById($id);
    } else if (!isset($_GET['id_course'])){
        header("Location: course.php");
    }
    if (isset($_GET['id_material']) && isset($_GET['id_course'])) 
    {
        $id = $_GET['id_course'];
        $idMaterial = $_GET['id_material'];     
        $material = new Material();
        $material->deleteMaterial($idMaterial);
        header("Location: courseDetail.php?id_course=$id");
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

    a {
        text-decoration: none;
        color: black;
    }

    .navigation {
        background-color: #808080;
        overflow: hidden;
    }

    .navigation a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .navigation a:hover {
        background-color: #ddd;
        color: black;
    }

    .navigation .active {
        background-color: #4CAF50;
        color: white;
    }
    </style>
    <script src="https://kit.fontawesome.com/14edc419b7.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="margin">
        <div class="card">
            <div class="navigation">
                <a href="course.php">Daftar Course</a>
                <a href="courseDetail.php?id_course=<?= $baris[0]['id_course']; ?>"
                    class="active"><?= $baris[0]['title']; ?></a>
            </div>
            <div class="card-header bg-primary text-white">
                <center>
                    <h3><?php echo $baris[0]['title']; ?></h3>
                </center>
            </div>

            <div class="card-body">
                <h5>Deskripsi Course</h5>
                <p><?= $baris[0]['description']; ?></p>
                <h5>Durasi</h5>
                <p><?= $baris[0]['duration']; ?></p>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Materi</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php 
                        $no = 1;
                        while($baris2 = mysqli_fetch_assoc($result2))
                            {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo $baris2['title']; ?></td>
                            <td><?php echo $baris2['description']; ?></td>
                            <td><iframe width="210" height="118" src="<?= $baris2['link']; ?>" frameborder="0"
                                    allowfullscreen></iframe>
                            <td>
                                <a href='formMaterial.php?id_course=<?=$baris[0]['id_course'];  ?>&amp;id_material=<?=$baris2['id_material'];  ?>'
                                    class='btn btn-warning'><i class="fa-solid fa-pen"></i> </a>&nbsp;
                                <a href='javascript:confirmDelete("courseDetail.php?id_course=<?= $baris2['id_course'] ?>&amp;id_material=<?=$baris2['id_material'];  ?>")'
                                    class='btn btn-danger'><i class="fa-solid fa-trash-can"></i> </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
                <div class="card-body">
                    <a class="btn btn-success" href="course.php" role="button"><i class="fa-solid fa-house"></i>
                        Kembali</a>
                    <a class="btn btn-primary" href="formMaterial.php?id_course=<?= $baris[0]['id_course'];  ?>"
                        role="button"><i class="fa-solid fa-square-plus"></i>
                        Tambah Materi</a>
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