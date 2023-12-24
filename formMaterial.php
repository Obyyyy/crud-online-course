<?php 
    require "Koneksi.php";
    require "controller/courseController.php";
    require "controller/materialController.php";

    // $judul = $description = $duration = $tahunTerbit = "";
    if (isset($_GET['id_course'])) 
    {     
        $id = $_GET['id_course'];      
    }
    if (isset($_GET['id_material']) && isset($_GET['id_course']))
    {     
        $idMaterial = $_GET['id_material'];
        $idCourse = $_GET['id_course'];
        $course = new Material();     
        $result = $course->getMaterialById($idMaterial);     
        $baris = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku | Tambah Data</title>
    <style>
    * {
        font-family: Georgia, Geneva, Tahoma, sans-serif
    }

    h1 {
        border-bottom: 2px solid #BFCCB5;
        padding-bottom: 10px;
    }

    .margin {
        margin: 50px 200px;
    }

    .margin2 {
        margin: 0px 500px 0px 0px;
    }

    table {
        width: 100%;
        margin: 0px;
    }

    .left {
        float: left;
        display: block;
    }

    .right {
        float: right;
        display: block;
    }
    </style>
    <script src="https://kit.fontawesome.com/14edc419b7.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="margin">

        <!-- <h1>Tambah Materi Course</h1> -->

        <div class="margin2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <?php 
                if(isset($_GET['id_buku'])){
                    echo "<b>Edit Data Buku</b>";
                } else {
                    echo "<b>Tambah Data Buku</b>";
                }
            ?>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="row g-3">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Judul Materi</label>
                            <input type="text" class="form-control" id="title" name="title"
                                <?php echo (isset($_GET['id_material'])) ? "value='".$baris[0]["title"]."'" : "value = ''"; ?>
                                placeholder="Masukkan Judul Materi" required>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description"
                                <?php echo (isset($_GET['id_material'])) ? "value='".$baris[0]["description"]."'" : "value = ''"; ?>
                                placeholder="Masukkan Deskripsi Materi" required>
                        </div>
                        <div class="col-md-12">
                            <label for="duration" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                <?php echo (isset($_GET['id_material'])) ? "value='".$baris[0]["link"]."'" : "value = ''"; ?>
                                placeholder="https://www.youtube.com/embed/..." required>
                        </div>
                        <div class="col-auto">
                            <table>
                                <tr>
                                    <ul class='left'>
                                        <td><a class="btn btn-danger" href="courseDetail.php?id_course=<?= $id ?>"
                                                role="button"><i class="fa-solid fa-arrow-left"></i> Kembali</a></td>
                                    </ul>
                                    <?php 
                    if(isset($_GET['id_material'])){
                        echo "<ul class='right'>";
                        echo '<td><button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button></td>';
                        echo "</ul>";
                    } else {
                        echo "<ul class='right'>";
                        echo '<td><button type="submit" class="btn btn-primary" name="submit"><i class="fa-solid fa-square-plus"></i> Tambah</button></td>';
                        echo "</ul>";
                    }
                    ?>
                                </tr>
                            </table>
                        </div>
                    </form>

                    <?php 
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $link = $_POST['link'];

                $material = new Material();
                $material -> setMaterial($id, $title, $description, $link);
                header("Location: courseDetail.php?id_course=$id");
            }

            if(isset($_POST['update'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $link = $_POST['link'];

                $material = new Material();
                $material -> editMaterial($idMaterial, $title, $description, $link);
                header("Location: courseDetail.php?id_course=$idCourse");
            }
        ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>