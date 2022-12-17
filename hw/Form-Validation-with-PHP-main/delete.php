<!-- delete data easy way -->


<?php
include_once('./header.php');
$id = $_GET['id'];
$delte_query = "DELETE FROM `user_data` WHERE `id` = $id";
$delete = $connet->query($delte_query);
if(!$delete){
    echo "<span>hhahahah</span>";
}else{
    echo "<script>alert('Data deleted succsessfull');location.href='./read.php'</script>";
}

include_once('./footer.php');
?>