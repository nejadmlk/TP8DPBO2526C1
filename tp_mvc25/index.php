<?php

include_once("controllers/lecturesController.php");

$lectures = new lecturesController();

if (isset($_GET['id_edit'])) {
    $lectures->formEdit();
} else if (isset($_GET['id_hapus'])) {
    $lectures->delete();
} else if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'create') {
        $lectures->add();
    } else if ($_POST['aksi'] == 'edit') {
        $lectures->edit();
    }
} else {
    $lectures->index();
}