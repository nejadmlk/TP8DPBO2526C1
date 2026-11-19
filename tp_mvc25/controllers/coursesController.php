
<?php

include_once("config.php");
include_once("models/DB.php");
include_once("models/Courses.php");
include_once("models/Lectures.php");
include_once("views/Template.php");
include_once("views/coursesView.php");

class coursesController
{
    // Properti controller
    private $courses;
    private $lectures;

    // Konstruktor controller Courses
    function __construct()
    {
        $this->courses = new Courses(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);

        $this->lectures = new Lectures(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    // Menampilkan halaman Courses
    public function index()
    {
        $this->courses->open();

        // Mengambil data Courses
        $this->courses->getCourses();

        $dataCourses = array();

        while ($row = $this->courses->getResult()) {
            array_push($dataCourses, $row);
        }

        $this->courses->close();

        // Mengambil data Lectures
        $this->lectures->open();

        $this->lectures->getLectures();

        $dataLectures = array();

        while ($row = $this->lectures->getResult()) {
            array_push($dataLectures, $row);
        }

        $this->lectures->close();

        // Menggabungkan data Courses dan Lectures
        $data = array(
            'courses' => $dataCourses,
            'lectures' => $dataLectures
        );

        // Mengirim data ke View
        $view = new coursesView();
        $view->render($data);
    }

    // Menambahkan data Courses
    function add()
    {
        $this->courses->open();

        $data = array(
            'nama_matkul' => $_POST['nama_matkul'],
            'kode_matkul' => $_POST['kode_matkul'],
            'sks' => $_POST['sks'],
            'lecture_id' => $_POST['lecture_id']
        );

        $this->courses->add($data);

        $this->courses->close();

        header("Location: index.php");
        exit;
    }

    // Menampilkan form Edit Courses
    function formEdit()
    {
        $this->courses->open();

        // Mengambil data Courses yang akan diedit
        $id = $_GET['id_edit'];

        $editData = $this->courses->getCoursesById($id);

        // Mengambil seluruh data Courses
        $this->courses->getCourses();

        $dataCourses = array();

        while ($row = $this->courses->getResult()) {
            array_push($dataCourses, $row);
        }

        $this->courses->close();

        // Mengambil seluruh data Lectures
        $this->lectures->open();

        $this->lectures->getLectures();

        $dataLectures = array();

        while ($row = $this->lectures->getResult()) {
            array_push($dataLectures, $row);
        }

        $this->lectures->close();

        // Menggabungkan data
        $data = array(
            'courses' => $dataCourses,
            'lectures' => $dataLectures
        );

        // Mengirim data ke View
        $view = new coursesView();
        $view->render($data, $editData);
    }

    // Memproses perubahan data Courses
    function edit()
    {
        $this->courses->open();

        $id = $_POST['ID'];

        $data = array(
            'nama_matkul' => $_POST['nama_matkul'],
            'kode_matkul' => $_POST['kode_matkul'],
            'sks' => $_POST['sks'],
            'lecture_id' => $_POST['lecture_id']
        );

        $this->courses->edit($id, $data);

        $this->courses->close();

        header("Location: index.php");
        exit;
    }

    // Menghapus data Courses
    function delete()
    {
        $this->courses->open();

        $id = $_GET['id_hapus'];

        $this->courses->delete($id);

        $this->courses->close();

        header("Location: index.php");
        exit;
    }
}
