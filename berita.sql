-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2024 pada 08.06
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `ringkasan` text NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `view` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `konten`, `ringkasan`, `gambar`, `tanggal`, `view`, `id_user`) VALUES
(9, 'Tutorial Instaling CodeIgniter 4', '<p>CodeIgniter 4 adalah kerangka kerja pengembangan aplikasi web yang ringan dan efisien, ditulis dalam bahasa pemrograman PHP,Codeigniter 4 adalah sebuah framework PHP yang digunakan untuk mengembangkan aplikasi web12. CodeIgniter tergolong sebuah toolkit yang berguna untuk membantu developer dalam membangun project dalam bahasa PHP.</p><p><br></p><p>1. Cara Mendownload aplikasi CodeIgniter</p><p>- Untuk mengunduh CodeIgniter 4, pertama-tama kunjungi situs resmi CodeIgniter di codeigniter.com kita bisa buka di chroom ataupun google.</p><p><br></p><p><img src=\"http://localhost:8080/uploads/berkas/1719028796_2821453f8c40aa5fca9f.png\" style=\"width: 50%;\"><br></p><p><br></p><p>- Setelah berada di halaman utama, navigasikan ke bagian unduhan atau cari tautan \"Download\". Klik tautan tersebut, lalu kita akan diarahkan ke halaman unduhan di GitHub.&nbsp;</p><p>- Di sana, pilih versi terbaru dari CodeIgniter 4 dan klik tombol \"Download\" untuk mengunduh file zip.&nbsp;</p><p>- Setelah unduhan selesai, ekstrak file zip tersebut ke direktori pilihan kita di komputer, setelah itu salin file yang sudah di zip dan masukkan kedalam folder root yang berada di file htdocs.</p><p>- lalu ubah nama folder tersebut sesuai yang kita inginkan misalkan ci4web</p><p>- lalu kita coba, kita klik chroom kita ketik folder yang kita buat tadi, misalkan localhost/ci4web klik enter lalu tampilan akan muncul seperti di bawah ini.</p><p><img src=\"http://localhost:8080/uploads/berkas/1719028886_b4627a0a82fc8bd0487d.png\" style=\"width: 50%;\"></p><p><br></p><p><br></p><p>2. Instal menggunakan composser</p><p></p><p>Composer adalah program aplikasi package manager yang digunakan memanajemen projek php, atau sebuah tools dependency untuk manajemen bahasa pemograman php. Berikut ini adalah cara bagaimana menginstall ci4 menggunakan composer</p><p>- download composer terlebih dahulu di laptop kalian</p><p>- sebelum itu kalian pastikan terlebih dahulu koneksi internet kalian itu berjalan dengan baik, karna menginstall composer ini menggunakan internet</p><p>- setelah itu kalian buka website atau link composer yaitu <u>https://getcomposer.org/download/</u></p><p>- setelah sudah di instal, kalian masukkan file php kalian kedalam composer tersebut, setelah suda dimasukkan tamplan akan muncul seperti dibawah ini</p><p><img src=\"http://localhost:8080/uploads/berkas/1719029320_4e3946da02916b01eb43.png\" style=\"width: 50%;\"><img src=\"http://localhost:8080/uploads/berkas/1719029332_eae98bf1c08058647233.png\" style=\"width: 50%;\"></p><p><br></p><p>- Lalu setelah itu kita buka CMD lalu kita ketik composer -v jika berhasil tampilan akan seperti dibawah ini</p><div><img src=\"http://localhost:8080/uploads/berkas/1719029397_31fb2ca4b3700685038d.png\" style=\"width: 50%;\"></div><div><br></div><div><div>- selanjutya install ci4 menggunakan composer</div><div>- klik tombol shift dan klik kanan pada file Codeigniter yang telah kalian download, lalu ubah nama codeigniter menjadi codeigniter4, pastikan bahwa url atau link yang digunakan dalam perintah dan di komputer sama.</div></div><div><br></div><div><img src=\"http://localhost:8080/uploads/berkas/1719029622_b8cbb8cade2bef49db82.png\" style=\"width: 50%;\"></div><div><br></div><div><div>- setelah itu kita klik cmd lagi, lalu ketik composer install tunggu sampai proses nya selesai</div><div>- jika sudah selesai ketik PHP SPARK SERVE di cmd kalian</div><div><br></div><div><img src=\"http://localhost:8080/uploads/berkas/1719029682_728e283442995a5924d3.png\" style=\"width: 50%;\"></div><div><br></div><div><div>- Jika sudah selesai selanjutnya kita buka google atau chroom kita keik http://localhost:8080 dan jika berhasil tampilan akan&nbsp; seperti dibawah ini</div></div></div><div><br></div><div><img src=\"http://localhost:8080/uploads/berkas/1719029723_4b7134169b0e44dcfab1.png\" style=\"width: 50%;\"><br></div><p><br></p><div><br></div><p><br></p>', 'Tutorial cara menginstal CodeIgniter 4 menggunakan composer untuk para pemula', '1719029885_e727a6aa01bb3c76b66b.png', '2024-06-22', 2, 5),
(12, 'Tutorial Cara Memasukan ci4 ke Koneksi Database', '<p>CodeIgniter 4 (CI4) adalah framework PHP yang ringan dan kuat yang menyediakan alat untuk membangun aplikasi web dengan cepat dan efisien. Salah satu fitur penting dari aplikasi web adalah kemampuannya untuk berinteraksi dengan basis data. Dengan CI4, Anda dapat dengan mudah menghubungkan aplikasi Anda ke berbagai jenis basis data, seperti MySQL, PostgreSQL, SQLite, dan lainnya.</p><p><br>1.Langkah pertama untuk menghubungkan CI4 ke database adalah dengan mengkonfigurasi koneksi database di file terlebih dahulu:<br>-Masuk ke file env yang sudah kita buat<br>-klik kanan lalu klik open gith base here<br>&nbsp;<img style=\"width: 50%;\" src=\"http://localhost:8080/uploads/berkas/1719035975_49f6d09e0fcaffce1c6e.jpeg\"></p><p>Dengan menggunakan model, Anda dapat mengambil, menyimpan, memperbarui, dan menghapus data dari basis data dengan mudah. CI4 juga menyediakan Query Builder yang kuat, yang memungkinkan Anda membuat kueri basis data menggunakan sintaks yang lebih ekspresif dan aman dibandingkan dengan kueri langsung SQL. Ini membantu mencegah serangan SQL injection dan memudahkan pemeliharaan kode.<br>Setelah konfigurasi database selesai, pastikan untuk memuat library database secara otomatis dalam file app/Config/Autoload.php. Ini memastikan bahwa kelas-kelas yang diperlukan untuk koneksi database dimuat secara otomatis ketika aplikasi dimulai.<br></p><p><br>Selanjutnya, jika Anda ingin berinteraksi dengan database melalui model, Anda perlu membuat model untuk setiap tabel yang akan Anda gunakan. Anda dapat membuat model baru dengan menjalankan perintah CLI CodeIgniter, atau secara manual. Model ini berfungsi sebagai penghubung antara aplikasi Anda dan basis data, memungkinkan Anda untuk melakukan operasi seperti insert, update, delete, dan select dengan mudah.</p><p><br>Terakhir, Anda dapat menggunakan koneksi database Anda dalam aplikasi Anda, baik melalui model atau secara langsung di dalam controller. Anda dapat menjalankan query SQL langsung atau menggunakan metode yang disediakan oleh CI4 untuk melakukan operasi database. Pastikan untuk memeriksa dokumentasi resmi CI4 untuk memahami lebih lanjut tentang cara menggunakan model dan operasi database yang didukung.<br>Dengan mengikuti langkah-langkah ini, Anda akan berhasil menghubungkan CodeIgniter 4 ke koneksi database Anda dan siap untuk membangun aplikasi web yang kuat dan dinamis.</p><p>Selain itu, CI4 memiliki dukungan yang kuat untuk transaksi basis data, validasi data, dan relasi basis data. Ini memungkinkan Anda untuk mengelola data Anda dengan lebih efisien dan aman. Dengan menggunakan CI4, Anda dapat membangun aplikasi web yang tangguh dan andal dengan cepat dan mudah.<br>Dengan demikian, menghubungkan CI4 ke database adalah langkah penting dalam pengembangan aplikasi web dengan CI4. Dengan mengikuti langkah-langkah yang tepat dan memanfaatkan fitur-fitur kuat dari CI4, Anda dapat dengan mudah mengintegrasikan aplikasi Anda dengan berbagai jenis basis data dan membangun aplikasi web yang kuat dan efisien.<br><br><br><br><br></p><p><br></p><p><br></p>', 'CodeIgniter 4 (CI4) adalah framework PHP yang ringan dan kuat yang menyediakan alat untuk membangun aplikasi web dengan cepat dan efisien. Salah satu fitur penting dari aplikasi web adalah kemampuannya untuk berinteraksi dengan basis data. Dengan CI4, Anda dapat dengan mudah menghubungkan aplikasi Anda ke berbagai jenis basis data, seperti MySQL, PostgreSQL, SQLite, dan lainnya.', '1719036126_71e40baea0fe1fe472d6.jpeg', '2024-06-22', 0, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'Renal', '$2a$12$PlnLT8eiHZMGuobd0bGW7Oi9vmeZM.qwfaz/PNYcihCvY.ayRawKO', 'Renaldi Muhammad Fauzi', 'tes@gmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bayu', '$2y$10$7PmRCatf60xCv5Q3d/TTPeYw6ORy9d5K/IMOaTEnAS5EXAHz5daAK', 'Bayu Sebastian', 'sebastianbayu01@gmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Friska', '$2y$10$rtr.2Y./1SIjcSdJ1MDYlu/t8rMmKPHwZ3K7QS6rHfjGSgp/8aCOS', 'Friska Sasti', 'friskasasti28@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Syifa', '$2y$10$0lqogzWZW6JDe8AqtZZvOO9evVyLEF0YPRylRQ9kNujzlOqpKC7j6', 'Siti Nursyifa', 'nursyifa1234@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Meli', '$2y$10$buwoYyOdBcsrQXDQ6t2F6O0gctQzqEv.2luNYtFwiuoHBOGPRnw0.', 'Meli Anggraeni', 'meli@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Iqbal', '$2y$10$pmucxtS8nVRnEvGMaUvlT.Ikrc3BK4VE5aEJuZVPj.QOLltL4iRvu', 'Muhammad Iqbal Saputra', 'iqbal@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
