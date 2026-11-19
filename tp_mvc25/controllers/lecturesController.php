<?php
include_once("config.php");
include_once("models/DB.php");
include_once("models/Lectures.php");
include_once("views/lecturesView.php");

class lecturesController
{
  // Properti kontroller
  private $lectures;

  // Konstruktor Controller Artist
  function __construct()
  {
    $this->lectures = new Lectures(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller lectures
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->lectures->open();

    // Meneruskan request umum dari views (mengambil data lectures) 
    $this->lectures->getLectures();

    // Inisiasi variabel untuk menyimpan data lectures
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->lectures->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->lectures->close();

    // Meneruskannya ke view
    $view = new lecturesView();
    $view->render($data);
  }

  function add()
  {
    // Lengkapi controller untuk melakukan add data
    $this->lectures->open();

    $data = array('nama' => $_POST['nama'], 'NIDN' => $_POST['NIDN'], 'phone' => $_POST['phone'], 'joindate' => $_POST['joindate']);

    $this->lectures->add($data);

    $this->lectures->close();

    header("Location: index.php");
    exit;
  }

  function formEdit()
  {
    $this->lectures->open();

    $id = $_GET['id_edit'];

    $editData = $this->lectures->getlecturesById($id);

    $this->lectures->getLectures();

    $data = array();

    while ($row = $this->lectures->getResult()) {
        array_push($data, $row);
    }

    $this->lectures->close();

    $view = new lecturesView();
    $view->render($data, $editData);
  }

  function edit()
  {
    $this->lectures->open();

    // Mengambil ID data yang akan diubah
    $id = $_POST['ID'];

    // Mengambil data baru dari form
    $data = array(
        'nama' => $_POST['nama'],
        'NIDN' => $_POST['NIDN'],
        'phone' => $_POST['phone'],
        'joindate' => $_POST['joindate']
    );

    // Menjalankan proses update
    $this->lectures->edit($id, $data);

    $this->lectures->close();

    // Kembali ke halaman Lectures
    header("Location: index.php");
    exit;
  }

  function delete()
  {
    // Lengkapi controller untuk melakukan delete data
    $this->lectures->open();

    $id = $_GET['id_hapus'];

    $this->lectures->delete($id);

    $this->lectures->close();

    header("Location: index.php");
    exit;
  }
}
