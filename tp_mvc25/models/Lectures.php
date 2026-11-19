<?php

class Lectures extends DB
{
    function getLectures()
    {
        $query = "SELECT * FROM lectures";
        return $this->execute($query);
    }

    function getlecturesById($id)
    {
        $query = "SELECT * FROM lectures WHERE id = '$id'";
        $this->execute($query);

        return $this->getResult();
    }

    function add($data)
    {
        $nama = $data['nama'];
        $nidn = $data['NIDN'];
        $phone = $data['phone'];
        $join_date = $data['joindate'];

        $query = "INSERT INTO lectures (nama, NIDN, phone, joindate) VALUES ('$nama', '$nidn', '$phone', '$join_date')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM lectures WHERE id = '$id'";

        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $nama = $data['nama'];
        $nidn = $data['NIDN'];
        $phone = $data['phone'];
        $join_date = $data['joindate'];

        $query = "UPDATE lectures SET nama = '$nama', NIDN = '$nidn', phone = '$phone', joindate = '$join_date' WHERE id = '$id'";

        return $this->execute($query);
    }

    // Mengambil courses berdasarkan lecturer
    function getCoursesByLecture($lecture_id)
    {
        $query = "SELECT * FROM courses WHERE lecture_id = '$lecture_id'";

        return $this->execute($query);
    }

    function getCoursesWithLecture()
    {
        $query = "SELECT courses.*, lectures.nama
                FROM courses
                JOIN lectures ON courses.lecture_id = lectures.ID";

        return $this->execute($query);
    }
}