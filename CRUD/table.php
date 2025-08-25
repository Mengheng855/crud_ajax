<?php
include 'conn.php';
$select = "SELECT * FROM tbl_testajax";
$res = $conn->query($select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<style>

</style>

<body>
    <div class="container p-5">

        <button type="button" class="btn btn-primary   " data-bs-toggle="modal" data-bs-target="#exampleModal">
            +Add
        </button>


        <table class="table table-hover mt-2 bg-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="body">
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '
                    <tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['password'] . '</td>
                        <td><img src="upload/' . $row['image'] . '" alt="" width="50px" height="50px"></td>
                        
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger delete" value="' . $row['id'] . '">Delete</button>
                            </form>
                        </td>
                        </tr>
                    
                    ';
                }
                ?>
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container ">
                                <form action="movefile.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control mb-3" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <img id="image" src="https://www.thewall360.com/uploadImages/ExtImages/images1/def-638240706028967470.jpg" alt="" width="200px" height="200px"> <br>
                                        <input type="file" class="form-control-file mt-4" id="file" name="file">
                                    </div>
                                    <div class="button-group mt-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="upload" class="btn btn-primary ">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </table>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        //insert
        $('#file').hide();
        $('#image').on('click', function() {
            $('#file').click();
        })
        $('#file').change(function() {
            let file = this.files[0];

            if (file) {
                let img = URL.createObjectURL(file);
                $("#image").attr("src", img);
            }

        })
        $('#upload').click(function() {
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let file = $('#file')[0].files[0];

            let formdata = new FormData();
            formdata.append('name', name);
            formdata.append('email', email);
            formdata.append('password', password);
            formdata.append('file', file);
            let filename = file ? file.name : '';
            $.ajax({
                url: 'movefile.php',
                type: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                success: function(response) {
                    $('#body').append(`
                        <tr>
                        <td>${response}</td>
                        <td>${name}</td>
                        <td> ${email} </td>
                        <td> ${password} </td>
                        <td><img src="upload/${filename}" alt="" width="50px" height="50px"></td>
                        
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger delete" value="' . $row['id'] . '">Delete</button>
                            </form>
                        </td>
                        </tr>
                         
                    
                    `)
                    $('#name').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#file').val('');
                    $('#image').attr('src', 'https://www.thewall360.com/uploadImages/ExtImages/images1/def-638240706028967470.jpg');


                }
            })
            $('#upload').close();

        })
        $('#exampleModal').hide();

        $('#body').on('click', '.delete', function () {
            let id = $(this).val();
            let rowToRemove = $(this).closest('tr');
            $.ajax({
                url: 'delete.php',
                type: 'post',
                data: {
                    delete_id: id
                },
                success: (response) => {
                    rowToRemove.remove();
                }
            })
        })
    })
</script>