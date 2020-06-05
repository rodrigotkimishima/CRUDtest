<?php
    $db = mysqli_connect('localhost', 'root', '', 'crud');
    if (isset($_GET['del'])) {
	    $id = $_GET['del'];
	    mysqli_query($db, "DELETE FROM aluno WHERE id='$id'"); 
	    header('location: index.php');
} ?>