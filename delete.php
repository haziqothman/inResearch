<?php
include 'database.php';
$id = $_GET['ids'];
$delete = "DELETE FROM users WHERE id = $id";
$deletequery = mysqli_query($conn, $delete);
if($deletequery){
    ?>
<script>
    window.location.replace("addUser.php");
</script>

<?php 

}else{
    echo 'Not deleted';
}

?>
