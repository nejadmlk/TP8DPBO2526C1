
<?php
class coursesView
{
    public function render($data, $editData = null)
    {
        $no = 1;

        // Menampilkan halaman HTML
        echo "<!DOCTYPE html>";
        echo "<html lang='id'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Courses</title>";
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>";
        echo "</head>";
        echo "<body class='container mt-4'>";

        // Header halaman
        echo "<div class='d-flex justify-content-between align-items-center mb-4'>";
        echo "<h2>Data Courses</h2>";
        echo "<a href='index.php' class='btn btn-secondary'>Lectures</a>";
        echo "</div>";

        // Menentukan form tambah atau edit
        if ($editData != null) {
            echo "<h4>Edit Course</h4>";
            echo "<form action='courses.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $editData['ID'] . "'>";
            echo "<input type='hidden' name='aksi' value='edit'>";
        } else {
            echo "<h4>Tambah Course</h4>";
            echo "<form action='courses.php' method='POST'>";
            echo "<input type='hidden' name='aksi' value='create'>";
        }

        // Input nama mata kuliah
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>Nama Mata Kuliah</label>";
        echo "<input type='text' name='nama_matkul' class='form-control' value='" . ($editData['nama_matkul'] ?? '') . "' required>";
        echo "</div>";

        // Input kode mata kuliah
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>Kode Mata Kuliah</label>";
        echo "<input type='text' name='kode_matkul' class='form-control' value='" . ($editData['kode_matkul'] ?? '') . "' required>";
        echo "</div>";

        // Input SKS
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>SKS</label>";
        echo "<input type='number' name='sks' class='form-control' value='" . ($editData['sks'] ?? '') . "' required>";
        echo "</div>";

        // Pilihan lecturer
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>Lecturer</label>";
        echo "<select name='lecture_id' class='form-select' required>";
        echo "<option value=''>Pilih Lecturer</option>";

        foreach ($data['lectures'] as $val) {
            list($id, $nama, $nidn, $phone, $joindate) = $val;

            $selected = "";

            if ($editData != null && $editData['lecture_id'] == $id) {
                $selected = "selected";
            }

            echo "<option value='" . $id . "' " . $selected . ">" . $nama . "</option>";
        }

        echo "</select>";
        echo "</div>";

        // Tombol submit
        echo "<button type='submit' class='btn btn-primary'>";
        echo ($editData != null) ? "Update" : "Simpan";
        echo "</button>";
        echo "</form>";

        // Menampilkan tabel Courses
        echo "<hr>";
        echo "<h4>Daftar Courses</h4>";
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>
                <th>No</th>
                <th>Nama Mata Kuliah</th>
                <th>Kode Mata Kuliah</th>
                <th>SKS</th>
                <th>Lecturer</th>
                <th>Aksi</th>
            </tr>";
        echo "</thead>";
        echo "<tbody>";

        // Membuat daftar ID lecturer dan nama lecturer
        $lectureMap = array();

        foreach ($data['lectures'] as $val) {
            list($id, $nama, $nidn, $phone, $joindate) = $val;
            $lectureMap[$id] = $nama;
        }

        // Menampilkan data Courses
        foreach ($data['courses'] as $val) {
            list($id, $nama_matkul, $kode_matkul, $sks, $lecture_id) = $val;

            $namaLecture = isset($lectureMap[$lecture_id])
                ? $lectureMap[$lecture_id]
                : "Tidak diketahui";

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $nama_matkul . "</td>";
            echo "<td>" . $kode_matkul . "</td>";
            echo "<td>" . $sks . "</td>";
            echo "<td>" . $namaLecture . "</td>";
            echo "<td>";
            echo "<a href='courses.php?id_edit=" . $id . "' class='btn btn-warning me-1'>Edit</a>";
            echo "<a href='courses.php?id_hapus=" . $id . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        echo "</body>";
        echo "</html>";
    }
}
