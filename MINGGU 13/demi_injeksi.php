<?php 
$nim = $_POST['nim'];
// input: ' OR '1'='1
$sql = "SELECT nama FROM mahasiswa
        WHERE nim = '$nim'";