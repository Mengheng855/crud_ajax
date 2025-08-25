<?php
include 'conn.php';
$select = "SELECT * FROM ajax";
$ex = mysqli_query($conn, $select);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 2rem 0;
        }

        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            margin: 0;
        }

        .table-header h2 {
            margin: 0;
            font-weight: 600;
        }

        .employee-table {
            margin: 0;
        }

        .employee-table thead th {
            background-color: #f8f9fa;
            border: none;
            font-weight: 600;
            color: #495057;
            padding: 1rem 0.75rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .employee-table tbody td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .employee-table tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.2s ease;
        }


        .position-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .position-developer {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .position-designer {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }

        .position-manager {
            background-color: #e8f5e8;
            color: #388e3c;
        }

        .position-analyst {
            background-color: #fff3e0;
            color: #f57c00;
        }

        .salary-text {
            font-weight: 600;
            color: #28a745;
        }

        .contact-info {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .location-text {
            font-size: 0.875rem;
            color: #495057;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            border: none;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background-color: #17a2b8;
            color: white;
        }

        .btn-edit:hover {
            background-color: #138496;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }

            .profile-img {
                width: 35px;
                height: 35px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.25rem;
            }
        }

        .stats-cards {
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            margin: 0;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.875rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-4 py-4">
        <!-- Stats Cards -->
        <div class="row stats-cards">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stat-card">
                    <p class="stat-number">24</p>
                    <p class="stat-label">Total Employees</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stat-card">
                    <p class="stat-number">12</p>
                    <p class="stat-label">Developers</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stat-card">
                    <p class="stat-number">6</p>
                    <p class="stat-label">Designers</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stat-card">
                    <p class="stat-number">6</p>
                    <p class="stat-label">Others</p>
                </div>
            </div>
        </div>

        <!-- Main Table -->
        <div class="table-container">
            <div class="table-header d-flex justify-content-between">
                <h2><i class="fas fa-users me-2"></i>Employee Directory</h2>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    +Add Employee
                </button>
            </div>

            <div class="table-responsive">
                <table class="table employee-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Profile</th>
                            <th>Contact</th>
                            <th>Location</th>
                            <th>Position</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($ex)) {
                            echo '
                            <tr>
                                <td>
                                    ' . $row['id'] . '
                                </td>
                                <td>
                                    <div class="fw-semibold">' . $row['name'] . '</div>
                                </td>
                                <td>
                                    <img src="image/' . $row['image'] . '" alt="" class="profile-img" width="80px" height="80px">
                                </td>
                                <td>

                                    <div>' . $row['email'] . '</div>
                                    <div class="contact-info">' . $row['phone_number'] . '</div>
                                </td>
                                <td>
                                    <div class="location-text">' . $row['location'] . '</div>
                                </td>
                                <td>
                                    <span class="position-badge position-developer">' . $row['position'] . '</span>
                                </td>
                                <td>
                                    <div class="salary-text">' . $row['salary'] . '$</div>
                                </td>
                                <td>
                                     <form action="delete.php" method="post">
                                        <div class="action-buttons">
                                            <button type="button" class="btn btn-warning" name="edit" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row['id'].'">
                                                Edit
                                            </button>
                                            <button class="btn-action btn-delete" value="'.$row['id'].'" name="delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            ';
                            echo'
                               <div class="modal fade" id="exampleModal'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Employee</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data" id="myform">
                                    <input type="hidden" name="id" value="'.$row['id'].'">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name="name" value="'.$row['name'].'" id="name" class="form-control"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" name="email" value="'.$row['email'].'" id="email" class="form-control"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Phone Number</label>
                                            <input type="text" value="'.$row['phone_number'].'" name="phone_number" id="phone_number"
                                                class="form-control" placeholder="Enter Phone_Number">
                                        </div>
                                        <label for="" class="form-label">Location</label>
                                        <select id="province" name="province" value="'.$row['location'].'" class="form-select">
                                            <option value="" selected disabled>Select Province</option>
                                            <option value="Phnom Penh">Phnom Penh</option>
                                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                                            <option value="Battambang">Battambang</option>
                                            <option value="Kampong Cham">Kampong Cham</option>
                                            <option value="Kampong Chhnang">Kampong Chhnang</option>
                                            <option value="Kampong Speu">Kampong Speu</option>
                                            <option value="Kampong Thom">Kampong Thom</option>
                                            <option value="Kampot">Kampot</option>
                                            <option value="Kandal">Kandal</option>
                                            <option value="Kep">Kep</option>
                                            <option value="Koh Kong">Koh Kong</option>
                                            <option value="Kratie">Kratie</option>
                                            <option value="Mondulkiri">Mondulkiri</option>
                                            <option value="Oddar Meanchey">Oddar Meanchey</option>
                                            <option value="Pailin">Pailin</option>
                                            <option value="Preah Sihanouk">Preah Sihanouk</option>
                                            <option value="Preah Vihear">Preah Vihear</option>
                                            <option value="Prey Veng">Prey Veng</option>
                                            <option value="Pursat">Pursat</option>
                                            <option value="Ratanakiri">Ratanakiri</option>
                                            <option value="Siem Reap">Siem Reap</option>
                                            <option value="Stung Treng">Stung Treng</option>
                                            <option value="Svay Rieng">Svay Rieng</option>
                                            <option value="Takeo">Takeo</option>
                                            <option value="Tboung Khmum">Tboung Khmum</option>
                                        </select>
                                        <label for="" class="form-label mt-3">Choose Position</label>
                                        <select name="position" class="form-select mb-3" value="'.$row['position'].'" id="position">
                                            <option value="Others" selected>Others</option>
                                            <option value="Frontend developer">Frontend developer</option>
                                            <option value="Backend developer">Backend developer</option>
                                            <option value="Full stack devloper">Full stack devloper</option>
                                        </select>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Salary</label>
                                            <input type="text" name="salary" id="salary" value="'.$row['salary'].'" class="form-control"
                                                placeholder="Enter salary">
                                        </div>
                                        <img id="images"
                                            src="image/'.$row['image'].'"
                                            alt="" width="200px" height="200px"> <br>
                                        <input type="files" name="file" id="file" class="form-control">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="edit" name="edit" class="btn btn-primary">Save Change</button>
                                            
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                            ';
                        }
                        ?>
                    </tbody>

                    
                    <!-- Button trigger modal -->

                   
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number"
                                                class="form-control" placeholder="Enter Phone_Number">
                                        </div>
                                        <label for="" class="form-label">Location</label>
                                        <select id="province" name="province" class="form-select">
                                            <option value="" selected disabled>Select Province</option>
                                            <option value="Phnom Penh">Phnom Penh</option>
                                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                                            <option value="Battambang">Battambang</option>
                                            <option value="Kampong Cham">Kampong Cham</option>
                                            <option value="Kampong Chhnang">Kampong Chhnang</option>
                                            <option value="Kampong Speu">Kampong Speu</option>
                                            <option value="Kampong Thom">Kampong Thom</option>
                                            <option value="Kampot">Kampot</option>
                                            <option value="Kandal">Kandal</option>
                                            <option value="Kep">Kep</option>
                                            <option value="Koh Kong">Koh Kong</option>
                                            <option value="Kratie">Kratie</option>
                                            <option value="Mondulkiri">Mondulkiri</option>
                                            <option value="Oddar Meanchey">Oddar Meanchey</option>
                                            <option value="Pailin">Pailin</option>
                                            <option value="Preah Sihanouk">Preah Sihanouk</option>
                                            <option value="Preah Vihear">Preah Vihear</option>
                                            <option value="Prey Veng">Prey Veng</option>
                                            <option value="Pursat">Pursat</option>
                                            <option value="Ratanakiri">Ratanakiri</option>
                                            <option value="Siem Reap">Siem Reap</option>
                                            <option value="Stung Treng">Stung Treng</option>
                                            <option value="Svay Rieng">Svay Rieng</option>
                                            <option value="Takeo">Takeo</option>
                                            <option value="Tboung Khmum">Tboung Khmum</option>
                                        </select>
                                        <label for="" class="form-label mt-3">Choose Position</label>
                                        <select name="position" class="form-select mb-3" id="position">
                                            <option value="Others" selected>Others</option>
                                            <option value="Frontend developer">Frontend developer</option>
                                            <option value="Backend developer">Backend developer</option>
                                            <option value="Full stack devloper">Full stack devloper</option>
                                        </select>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">Salary</label>
                                            <input type="text" name="salary" id="salary" class="form-control"
                                                placeholder="Enter salary">
                                        </div>
                                        <img id="image"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTar_ouGael5ODlrC1kbFbKLpEPSJtTQqdaIg&s"
                                            alt="" width="200px" height="200px"> <br>
                                        <input type="file" name="file" id="file" class="form-control">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="upload" name="upload" class="btn btn-primary">Save Change</button>
                                            
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- html -->
    <!-- <script>
        // Add some interactivity
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                alert('Edit functionality would be implemented here');
            });
        });

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this employee?')) {
                    alert('Delete successfully');
                }
            });
        });
    </script> -->
    <!-- jQuery -->
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
                    $('#image').attr('src', img);
                }
            })
               
            $("#upload").click(function() {               
                let file = $('#file')[0].files[0];
                let filename = file ? file.name : "";
                let name = $('#name').val();
                let email = $('#email').val();
                let phone_number = $('#phone_number').val();
                let location = $('#province').val();;
                let position = $('#position').val();
                let salary = $('#salary').val();
                if (!file) {
                    alert('please Input image...!')
                }

                let formdata = new FormData();
                formdata.append('file', file);
                formdata.append('name', name);
                formdata.append('email', email);
                formdata.append('phone_number', phone_number);
                formdata.append('province', location);
                formdata.append('position', position);
                formdata.append('salary', salary);



                $.ajax({
                    url: 'insert.php',
                    type: 'post',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#myform')[0].reset();
                        $('#image').attr('src', "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTar_ouGael5ODlrC1kbFbKLpEPSJtTQqdaIg&s");
                        $('tbody').append(`
                          <tr>
                                <td>
                                    ${response}
                                </td>
                                <td>
                                    <div class="fw-semibold">${name}</div>
                                </td>
                                <td>
                                    <img src="./image/${filename}" alt="" class="profile-img" width="80px" height="80px">
                                </td>
                                <td>

                                    <div>${email}</div>
                                    <div class="contact-info">${phone_number}</div>
                                </td>
                                <td>
                                    <div class="location-text">${location}</div>
                                </td>
                                <td>
                                    <span class="position-badge position-developer">${position}</span>
                                </td>
                                <td>
                                    <div class="salary-text">${salary}$</div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn-action btn-delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `)
                    }

                })
               
            })
            $('btn-delete').click(function(){
                let row=$(this).closest("tr");
                let id=row.find('td:first').text().trim();
                $.ajax({
                    url:'delete.php',
                    type:'POST',
                    data:{id:id},
                    success:function(response){
                        row.remove();
                    }
                })
            })
            // $('#files').hide();  
            // $('#images').click(function(){
            //     $('#files').click();
            // })
            $('#edit').click(function(){
                let file=this.files[0];
                let id=$('#id').val();
                let name=$('#name').val();
                let email=$('#email').val();
                let phone_number=$('#phone_number').val();
                let location=$('#province').val();
                let position=$('#position').val();
                let salary=$('#salary').val();
                $.ajax({
                    url:"edit.php",
                    type:"POST",
                    data:{
                        id:id,
                        name:name,
                        email:email,
                        phone_number:phone_number,
                        location:location,
                        position:position,
                        salary:salary,
                        file:file

                    },
                    cache:false,
                    success:function(){
                        alert('hello')
                    }
                })
            })
        })
    </script>
</body>

</html>