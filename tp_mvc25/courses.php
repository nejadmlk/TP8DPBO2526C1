<?php

include_once("controllers/coursesController.php");

$courses = new coursesController();

if (isset($_GET['id_edit'])) {
    $courses->formEdit();
} else if (isset($_GET['id_hapus'])) {
    $courses->delete();
} else if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'create') {
        $courses->add();
    } else if ($_POST['aksi'] == 'edit') {
        $courses->edit();
    }
} else {
    $courses->index();
}