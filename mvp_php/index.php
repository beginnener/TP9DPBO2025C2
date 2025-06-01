<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

$post = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : null;

$tp = new TampilMahasiswa($post);
$data = $tp->tampil();