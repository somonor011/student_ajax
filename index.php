<!DOCTYPE html>
<?php include('con1.php') ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container-fluid bg-dark float-end p-3">
        <h1 class="text-light">Student Information</h1>
        <button id="openAdd" type="button" class="btn btn-primary float-end " data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i> Add
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control mb-3"
                            placeholder="Example: Hong Somonor">
                        <label for="">Gender</label>
                        <select name="" id="gender" class="form-select mb-3">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="">Course</label>
                        <input type="text" name="course" id="course" class="form-control  mb-3"
                            placeholder="Example: PYTHON">
                        <label for="">Profile</label> <br>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control d-none  mb-3"
                            placeholder="Choose image">
                        <img id="chooseImage" src="image/upload.webp" width="100" alt="image/upload.webp">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button name="btnSave" id="btnSave" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                            <button name="btnUpdate" id="btnUpdate" type="button"
                                class="btn btn-success">Update</button>
                        </div>
                        <!-- Hide thumbnail -->
                        <input type="hidden" name="hide_thumbnail" id="hide_thumbnail">
                        <!-- Hide Id -->
                        <input type="hidden" name="hide_id" id="hide_id">
                        <!-- Hide Image -->
                        <input type="hidden" name="hide_image" id="hide_image">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="exampleModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="tmp_id" id="id">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button name="btnDelete" id="btnDelete" type="submit" class="btn btn-primary">Yes,Delete
                            its.</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-dark table-hover align-middle" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Profile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `tbl_ajax_master2`";
                $result = $con->query($sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td>'.$row['course'].'}</td>
                        <td>
                            <img src="image/'.$row['profile'].'" width="120" height="120" style="object-fit: cover;" alt="">
                        </td>
                        <td>
                            <button id="openUpdate" class="btn btn-success" type="button " data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                            <button class="btn btn-danger" type="button "><i class="fa-solid fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
<script>
    $(document).ready(function () {
        $("#openAdd").click(function () {
            $("#title").text("Enter Student Information");
            $("#btnSave").show();
            $("#btnUpdate").hide();

            // Pick up image
            $("#chooseImage").click(function () {
                $("#thumbnail").click();
            })
            $("#thumbnail").change(function () {
                var form_data = new FormData();
                var file = $("#thumbnail")[0].files;
                form_data.append("thumbnail", file[0]);
                $.ajax(
                    {
                        url: 'move_upload_file.php',
                        method: 'post',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respone) {
                            console.log(respone);
                            $("#chooseImage").attr('src', 'image/' + respone);
                            $("#hide_image").val(respone);
                        }
                    }
                )
            })
            // add data
            $("#btnSave").click(function () {
                var name = $("#name").val();
                var gender = $("#gender").val();
                var course = $("#course").val();
                var profile = $("#hide_image").val();

                $.ajax({
                    url: 'insert_data.php',
                    method: 'post',
                    data: {
                        stu_name: name,
                        stu_gender: gender,
                        stu_course: course,
                        stu_profile: profile,
                    },
                    cache: false,
                    success: function (respone) {
                        var data = `
                                <tr>
                                    <td>${respone}</td>
                                    <td>${name}</td>
                                    <td>${gender}</td>
                                    <td>${course}</td>
                                    <td>
                                        <img src="image/${profile}" width="120" height="120" style="object-fit: cover;" alt="">
                                    </td>
                                    <td>
                                        <button id="openUpdate" class="btn btn-success" type="button " data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                        <button class="btn btn-danger" type="button "><i class="fa-solid fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                        `;
                        $('tbody').append(data);
                    }
                })
            })
        })
        $("body").on("click", "#openUpdate", function () {
            $("#title").text("Edit Student Information");
            $("#btnSave").hide();
            $("#btnUpdate").show();

        })
        $("body").on("click", "#openDelete", function () {
            var id = $(this).parents("tr").find("td").eq(0).text();
            $("#id").val(id);
        })

    });
</script>

</html>