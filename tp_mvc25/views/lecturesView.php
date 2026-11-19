
<?php
class lecturesView
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
        echo "<title>Lectures</title>";
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>";
        echo "</head>";
        echo "<body class='container mt-4'>";

        // Header halaman
        echo "<div class='d-flex justify-content-between align-items-center mb-4'>";
        echo "<h2>Data Lectures</h2>";
        echo "<a href='courses.php' class='btn btn-primary'>Courses</a>";
        echo "</div>";

        // Menentukan form tambah atau edit
        if ($editData != null) {
            echo "<h4>Edit Lecturer</h4>";
            echo "<form action='index.php' method='POST'>";
            echo "<input type='hidden' name='ID' value='" . $editData['ID'] . "'>";
            echo "<input type='hidden' name='aksi' value='edit'>";
        } else {
            echo "<h4>Tambah Lecturer</h4>";
            echo "<form action='index.php' method='POST'>";
            echo "<input type='hidden' name='aksi' value='create'>";
        }

        // Input nama
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>Nama</label>";
        echo "<input type='text' name='nama' class='form-control' value='" . ($editData['nama'] ?? '') . "' required>";
        echo "</div>";

        // Input NIDN
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>NIDN</label>";
        echo "<input type='text' name='NIDN' class='form-control' value='" . ($editData['NIDN'] ?? '') . "' required>";
        echo "</div>";

        // Input phone
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>Phone</label>";
        echo "<input type='text' name='phone' class='form-control' value='" . ($editData['phone'] ?? '') . "' required>";
        echo "</div>";

        // Input join date
        echo "<div class='mb-3'>";
        echo "<label class='form-label'>Join Date</label>";
        echo "<input type='date' name='joindate' class='form-control' value='" . ($editData['joindate'] ?? '') . "' required>";
        echo "</div>";

        // Tombol submit
        echo "<button type='submit' class='btn btn-primary'>";
        echo ($editData != null) ? "Update" : "Simpan";
        echo "</button>";
        echo "</form>";

        // Menampilkan tabel Lectures
        echo "<hr>";
        echo "<h4>Daftar Lecturer</h4>";
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIDN</th>
                <th>Phone</th>
                <th>Join Date</th>
                <th>Aksi</th>
            </tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($data as $val) {
            list($id, $nama, $nidn, $phone, $joindate) = $val;

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $nama . "</td>";
            echo "<td>" . $nidn . "</td>";
            echo "<td>" . $phone . "</td>";
            echo "<td>" . $joindate . "</td>";
            echo "<td>";
            echo "<a href='index.php?id_edit=" . $id . "' class='btn btn-warning me-1'>Edit</a>";
            echo "<a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        echo "</body>";
        echo "</html>";
    }
}
