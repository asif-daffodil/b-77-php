<?php
include_once("./navbar.php");
$read_query = "SELECT * FROM `students`";
$read = $conn->query($read_query);

if ($read->num_rows > 0) {
?>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Name</td>
            <td>Gender</td>
            <td>Phone</td>
            <td>City</td>
            <td>dtls</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($data = $read->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $data['name'] ?></td>
                <td><?= $data['gender'] ?></td>
                <td><?= $data['phone'] ?></td>
                <td><?= $data['city'] ?></td>
                <td><?= $data['dtls'] ?></td>
                <td>
                    <a href="./update.php?id=<?= $data['id'] ?>"><button>Update</button></a>
                    <a href="./delete.php?id=<?= $data['id'] ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

<?php
} else {
?>
    <h2>No Student Data Found</h2>
<?php } ?>