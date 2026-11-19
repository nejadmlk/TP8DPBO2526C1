# Janji
Saya Nezhad Ahmad Maliki dengan NIM 2503880 mengerjakan Tugas Praktikum 8 pada Mata Kuliah Desain dan Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Struktur File

```
C:.
│   bootstrap.bundle.min.js
│   bootstrap.min.css
│   bootstrap.min.js
│   config.php
│   courses.php
│   db_lectures.sql
│   index.php
│   jquery.min.js
│   popper.min.js
│
├───controllers
│       coursesController.php
│       lecturesController.php
│
├───models
│       Courses.php
│       DB.php
│       Lectures.php
│
├───templates
│       courses.html
│       index.html
│
└───views
        coursesView.php
        lecturesView.php
        Template.php
```

# Fungsi program & Alur Program
Program pengelolaan data Lectures dan Courses dibuat untuk membantu pengguna dalam mengelola data dosen dan mata kuliah melalui sebuah website. Program ini menyediakan fitur untuk menampilkan, menambahkan, mengubah, dan menghapus data yang tersimpan di dalam database.

Program ini memiliki dua bagian utama, yaitu pengelolaan data Lectures dan pengelolaan data Courses. Pada bagian Lectures, pengguna dapat mengelola informasi dosen, seperti nama, NIDN, nomor telepon, dan tanggal bergabung. Sementara itu, pada bagian Courses, pengguna dapat mengelola informasi mata kuliah, seperti nama mata kuliah, kode mata kuliah, jumlah SKS, serta dosen pengampu.

Program ini dibuat menggunakan bahasa pemrograman PHP dengan konsep Object-Oriented Programming (OOP), menerapkan pola arsitektur Model-View-Controller (MVC), serta menggunakan MySQL sebagai database untuk menyimpan seluruh data.

Program ini dibuat menggunakan PHP dengan konsep Object-Oriented Programming (OOP) dan database MySQL sebagai tempat penyimpanan seluruh data.

### Desain Class
Program ini menggunakan beberapa class yang memiliki tugas dan tanggung jawab masing-masing. Setiap class dipisahkan ke dalam folder berdasarkan fungsinya agar kode program lebih terstruktur dan mudah dikelola.

Berikut merupakan penjelasan class yang digunakan:
- Class DB: Bertugas untuk mengatur koneksi antara program PHP dengan database MySQL menggunakan MySQLi, menjalankan perintah SQL, mengambil hasil query, dan menutup koneksi database.
- Class Lectures: Bertugas untuk mengelola data dosen, seperti menampilkan seluruh data dosen, mengambil data berdasarkan ID, menambahkan, mengubah, dan menghapus data dosen.
- Class Courses: Bertugas untuk mengelola data mata kuliah, seperti menampilkan seluruh data mata kuliah, mengambil data berdasarkan ID, menambahkan, mengubah, dan menghapus data mata kuliah.
- Class lecturesController: Bertugas untuk mengatur alur pengelolaan data dosen. Controller menerima permintaan dari pengguna, memanggil method pada model Lectures, kemudian mengirimkan data ke View.
- Class coursesController: Bertugas untuk mengatur alur pengelolaan data mata kuliah dengan memanggil method pada model Courses serta mengambil data dosen yang diperlukan.
- Class lecturesView: Bertugas untuk menampilkan halaman pengelolaan data dosen, termasuk form tambah dan edit serta tabel data dosen.
- Class coursesView: Bertugas untuk menampilkan halaman pengelolaan data mata kuliah, termasuk form tambah dan edit serta tabel mata kuliah beserta informasi dosen pengampu.
- Class Template: Bertugas untuk membaca file template HTML dan mengganti bagian tertentu menggunakan data yang dikirimkan oleh View.
- Class Config: Bertugas untuk menyimpan konfigurasi koneksi database, seperti host, username, password, dan nama database.

### Alur Program (Flow Kode), Alur Design

Alur program dimulai ketika pengguna membuka website melalui file index.php. File tersebut berfungsi sebagai pintu masuk untuk mengakses halaman pengelolaan data Lectures. Selanjutnya, index.php memanggil lecturesController untuk memproses permintaan pengguna.

Pada halaman Lectures, program menampilkan data dosen yang diambil dari database. Pengguna dapat melakukan beberapa tindakan, yaitu:

Menampilkan data (Read)
Controller memanggil method untuk mengambil seluruh data dosen dari model Lectures. Data yang diperoleh kemudian dikirimkan ke lecturesView untuk ditampilkan dalam bentuk tabel.

Menambahkan data (Create)
Pengguna mengisi form yang tersedia dengan informasi dosen. Setelah tombol Simpan ditekan, data dikirim melalui method POST ke index.php. Controller kemudian memanggil method tambah pada model Lectures untuk menyimpan data ke database.

Mengubah data (Update)
Pengguna memilih tombol Edit pada salah satu data dosen. Program mengambil data berdasarkan ID, kemudian menampilkannya kembali ke dalam form. Setelah pengguna mengubah informasi dan menekan tombol Update, Controller memanggil method edit pada model Lectures untuk memperbarui data di database.

Menghapus data (Delete)
Pengguna memilih tombol Hapus pada data yang ingin dihapus. Controller mengambil ID data tersebut dan memanggil method delete pada model Lectures untuk menghapusnya dari database.

Selain halaman Lectures, terdapat halaman Courses yang dapat diakses melalui tombol navigasi Courses. Halaman ini menggunakan file courses.php sebagai pintu masuk untuk memanggil coursesController.

Pada halaman Courses, pengguna dapat melihat, menambahkan, mengubah, dan menghapus data mata kuliah. Setiap data mata kuliah juga memiliki hubungan dengan data dosen melalui kolom lecture_id. Dengan hubungan tersebut, pengguna dapat menentukan dosen pengampu untuk setiap mata kuliah.

Ketika pengguna memilih tombol Edit pada data mata kuliah, program mengambil data berdasarkan ID dan menampilkan informasi sebelumnya pada form. Pengguna juga dapat mengubah dosen pengampu melalui pilihan dosen yang tersedia. Setelah perubahan disimpan, data mata kuliah akan diperbarui di database.

Setelah proses tambah, edit, atau hapus dilakukan, program mengarahkan pengguna kembali ke halaman terkait agar data terbaru dapat ditampilkan.

Program ini menggunakan database MySQL dengan nama db_lectures sebagai tempat penyimpanan seluruh data.

Database tersebut memiliki dua tabel utama, yaitu:
Tabel lectures: Menyimpan informasi dosen yang terdiri dari ID, nama, NIDN, phone, dan joindate.
Tabel courses: Menyimpan informasi mata kuliah yang terdiri dari ID, nama_matkul, kode_matkul, sks, dan lecture_id.

Pada tabel Courses terdapat kolom lecture_id yang berfungsi sebagai foreign key dan menghubungkan data mata kuliah dengan tabel Lectures melalui kolom ID.

Dengan hubungan tersebut, satu dosen dapat dikaitkan dengan beberapa mata kuliah. Informasi dosen pengampu juga dapat ditampilkan pada halaman Courses berdasarkan hubungan kedua tabel.

Koneksi database dikelola melalui class DB yang terdapat pada file models/DB.php. Sementara itu, file config.php digunakan untuk menyimpan konfigurasi database, seperti alamat host, username, password, dan nama database.

Model Lectures dan Courses menggunakan class DB untuk menjalankan query ke database. Dengan demikian, proses koneksi dan pengolahan database dapat dilakukan melalui class yang sudah disediakan tanpa harus menuliskan koneksi MySQLi secara berulang pada setiap halaman.

### Penjelasan Desain Tampilan Program
Program ini menggunakan tampilan website berbasis HTML dan Bootstrap agar halaman lebih mudah digunakan dan memiliki susunan komponen yang terstruktur. Tampilan halaman menggunakan file HTML yang berada di folder templates, sedangkan proses pengisian data ke dalam tampilan dilakukan oleh class View.

Terdapat beberapa bagian utama pada tampilan program, yaitu:

Halaman Lectures: Digunakan untuk menampilkan seluruh data dosen dalam bentuk tabel.

Form Lectures: Digunakan untuk memasukkan data dosen baru maupun mengubah data dosen yang sudah tersimpan.

Halaman Courses: Digunakan untuk menampilkan seluruh data mata kuliah beserta informasi dosen pengampunya.

Form Courses: Digunakan untuk menambahkan dan mengubah data mata kuliah, termasuk memilih dosen pengampu.

Tombol Navigasi: Digunakan untuk berpindah antara halaman Lectures dan Courses.

Tombol Aksi: Digunakan untuk menjalankan proses tambah, edit, dan hapus data.

File index.html digunakan sebagai template halaman Lectures, sedangkan courses.html digunakan sebagai template halaman Courses. Class Template membaca file HTML tersebut dan mengganti placeholder dengan data yang telah diproses oleh View.

Penggunaan Bootstrap membantu mengatur tampilan tabel, form, tombol, dan tata letak halaman. Dengan pembagian halaman tersebut, pengguna dapat mengelola data dosen dan mata kuliah secara lebih terstruktur.

# Dokumentasi

## page lectures
<img src="Dokumentasi/proses lectures.gif" width="100%">

## page courses
<img src="Dokumentasi/proses courses.gif" width="100%">
