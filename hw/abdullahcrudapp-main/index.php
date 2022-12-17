<?php include_once("header.php");
$conn = mysqli_connect("localhost", "root", "", "students");
$read_query = "SELECT * FROM `students`";
$read = $conn->query($read_query);


?>
<h2 class="text-uppercase text-center py-3" style="background: #00ff5573">php complete crud app</h1>
    <div class="container my-4">
        <h2 class="text-center ">Crud Application</h2>
        <p class="text-center text-secondary">Made By Abdullah Al Ahad Bhuiyan</p>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn btn-primary my-4"><a href="./add.php" class="text-light"><i class="fa-solid fa-user-plus pe-2"></i>Add Student</a></button>
            <!-- <input type="text" class="form-control" style="width: 300px;" placeholder="Search for Students...." id="myInput" onkeyup="myFunction()"> -->
            <div class="d-flex">
                <div class="card d-flex flex-row align-items-center py-2 px-3 text-center bg-warning text-dark me-2" style="width: max-content;">
                    <i class="fa-solid fa-people-group pe-2" style="font-size: 40px;"></i>
                    <div>
                        <h4>Total Students</h4>
                        <h3><?= $read->num_rows ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <span id="se"></span>
        <table class="table table-hover" id="myTable">
            <thead>
                <tr>
                    <th scope="col" colspan="2" style="width: 30%">Student Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = $read->fetch_assoc()) {
                ?>
                    <tr>
                        <td scope="row" colspan="2" class="name"><?= $data['first'] . " " . $data['last'] ?></td>
                        <td><?= $data['gender'] ?></td>
                        <td><?= "+880" . $data['phone'] ?></td>
                        <td class="d-flex justify-content-center">
                            <a href="./update.php?id=<?= $data['id'] ?>" class="me-2">
                                <button class="btn btn-success d-flex align-items-center">
                                    <i class="fa-solid fa-user-pen pe-2"></i>
                                    Update
                                </button>
                            </a>
                            <a href="./delete.php?id=<?= $data['id'] ?>">
                                <button class="btn btn-danger d-flex align-items-center">
                                    <i class="fa-solid fa-trash pe-2"></i>
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once("footer.php") ?>