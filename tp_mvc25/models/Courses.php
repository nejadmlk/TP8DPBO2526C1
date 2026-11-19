
<?php

class Courses extends DB
{
    // Mengambil seluruh data courses
    function getCourses()
    {
        $query = "SELECT * FROM courses";
        return $this->execute($query);
    }

    // Mengambil data courses berdasarkan ID
    function getCoursesById($id)
    {
        $query = "SELECT * FROM courses WHERE ID = '$id'";
        $this->execute($query);

        return $this->getResult();
    }

    // Menambahkan data courses
    function add($data)
    {
        $matkul = $data['nama_matkul'];
        $kodematkul = $data['kode_matkul'];
        $sks = $data['sks'];
        $lecture_id = $data['lecture_id'];

        $query = "INSERT INTO courses (nama_matkul, kode_matkul, sks, lecture_id) VALUES ('$matkul', '$kodematkul', '$sks', '$lecture_id')";

        return $this->execute($query);
    }

    // Menghapus data courses
    function delete($id)
    {
        $query = "DELETE FROM courses WHERE ID = '$id'";

        return $this->execute($query);
    }

    // Mengubah data courses
    function edit($id, $data)
    {
        $matkul = $data['nama_matkul'];
        $kodematkul = $data['kode_matkul'];
        $sks = $data['sks'];
        $lecture_id = $data['lecture_id'];

        $query = "UPDATE courses
                SET nama_matkul = '$matkul',
                    kode_matkul = '$kodematkul',
                    sks = '$sks',
                    lecture_id = '$lecture_id'
                WHERE ID = '$id'";

        return $this->execute($query);
    }
}
