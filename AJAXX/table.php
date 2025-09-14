<?php
include 'conn.php';
$select = "SELECT * FROM ajaxx";
$ex = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-5 mt-3">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" id="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add student
            </button>
        </div>
        <table class="table table-hover ">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Email</td>
                <td>Profile</td>
                <td>Action</td>

            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($ex)) {
                echo '
                    <tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['gender'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td><img src="upload/' . $row['profile'] . '" alt="" width="60px"></td>
                        <td>
                            <form action="delete.php" method="post">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"  id="edit" data-bs-target="#exampleModal"   name="edit">Edit</button>
                                <button type="button" class="btn btn-danger" name="delete" value="' . $row['id'] . '" id="delete">delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    ';
            }

            ?>

            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insert.php" method="post" id="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control mt-3" id="name" placeholder="Enter name...">
                                </div>

                                <select name="gender" id="gender" class="form-select mt-3">
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>

                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control my-3" placeholder="Enter email...">
                                </div>
                                <img id="image" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg" alt="" width="200px" height="200px">
                                <input type="file" id="file" name="file">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="update">edit</button>
                                    <button type="button" id="upload" name="upload" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
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
        $('#file').hide();
        $('#image').click(function() {
            $('#file').click();
        })
        $('#file').change(function() {
            let file = this.files[0];
            if (file) {
                let img = URL.createObjectURL(file);
                $('#image').attr('src', img)
            }
        })
        $('#add').click(function() {
            $('#update').hide();
            $('#upload').show();
            $('#exampleModalLabel').text('Add Employee');
            $('#form')[0].reset();
            $('#image').attr('src', 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg');

        })
        $('#upload').click(function() {
            let file = $('#file')[0].files[0];
            let name = $('#name').val();
            let email = $('#email').val();
            let gender = $('#gender').val();

            let formdata = new FormData();
            formdata.append('file', file);
            formdata.append('name', name);
            formdata.append('gender', gender);
            formdata.append('email', email);


            $.ajax({
                url: 'insert.php',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    let image = $('#image').attr('src');
                    $('table tbody').append(`                      
                        <tr>
                            <td>${response}</td>
                            <td>${name}</td>
                            <td>${gender}</td>
                            <td>${email}</td>
                            <td><img src="${image}" alt="" width="60px"></td>
                            <td>
                                <button class="btn btn-warning" name="edit" id="edit" data-bs-toggle="modal"  data-bs-target="#exampleModal">Edit</button>
                                <button class="btn btn-danger" name="delete" id="delete">Delete</button>
                            </td>
                        </tr>
                    `);
                    $('#form')[0].reset();
                    $('#image').attr('src', 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg');
                }
            })
        })

        //delete
        $(document).on('click', '#delete', function() {
            let row = $(this).closest('tr');
            let id = row.find('td:first').text();
            $.ajax({
                url: 'delete.php',
                type: 'post',
                data: {
                    id
                },
                success: function(response) {
                    row.remove();
                }
            })
        })

        
        $(document).on('click', '#edit', function() {
            $('#update').show();
            $('#upload').hide();
            $('#exampleModalLabel').text('Update Employee');

            let row = $(this).closest('tr');
            let id = row.find('td:eq(0)').text().trim();
            let name = row.find('td:eq(1)').text().trim();
            let gender = row.find('td:eq(2)').text().trim();
            let email = row.find('td:eq(3)').text().trim();
            let img = row.find('td:eq(4) img').attr('src');

            $('#name').val(name);
            $('#email').val(email);
            $('#gender').val(gender);
            $('#image').attr('src', img);
            $('#update').data('id',id);
        })
        $('#update').click(function(){

    
            let id = $(this).data('id');
            let file = $('#file')[0].files[0];
            let name = $('#name').val();
            let email = $('#email').val();
            let gender = $('#gender').val();

            let formdata = new FormData();
            formdata.append('id', id);
            formdata.append('file', file);
            formdata.append('name', name);
            formdata.append('gender', gender);
            formdata.append('email', email);

            $.ajax({
                url: 'edit.php',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function() {
                    $('tr').append(function(){
                        if($(this).find('td:eq(0)').text().trim()== id){
                            $(this).find('td:eq(1)').text(name);
                            $(this).find('td:eq(2)').text(gender);
                            $(this).find('td:eq(3)').text(email);
                            let image = $('#image').attr('src');
                            $(this).find('td:eq(4) img').attr('src', image);

                        }
                        
                    })
                    $('#form')[0].reset();
                    $('#image').attr('src', 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg');
                }
            })



        })
    })
</script>