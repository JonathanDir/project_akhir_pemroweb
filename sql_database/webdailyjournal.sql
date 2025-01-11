-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2025 pada 12.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_daily_journal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(12, 'Momen Bersejarah!', 'Kami akhirnya mencapai puncak tertinggi, trofi Liga Inggris kini di tangan kami. Perjuangan tanpa lelah, kerja keras, dan dukungan luar biasa dari para penggemar menjadi bahan bakar semangat kami.\r\n\r\nIni bukan sekadar trofi—ini adalah bukti bahwa mimpi besar dapat diraih dengan tekad yang besar. Hari ini, kita semua adalah juara! Terima kasih untuk setiap sorakan, doa, dan kepercayaan. Ini kemenangan kita bersama! ', '20250108124724.jpg', '2025-01-08', 'danny'),
(13, 'Masa Depan Cerah di Tangan Mereka', 'Hojlund, Garnacho, dan Kobbie Mainoo—trio muda penuh potensi yang membawa harapan baru. Dengan semangat tak kenal takut, energi melimpah, dan bakat luar biasa, mereka menunjukkan bahwa masa depan klub ini berada di tangan yang tepat.\r\n\r\nSetiap langkah mereka di lapangan adalah cerita baru yang menginspirasi, setiap aksi adalah janji untuk kejayaan yang lebih besar. Bersiaplah, dunia, karena generasi ini siap membuat sejarah!', '20250108124736.jpg', '2025-01-08', 'danny'),
(14, 'Satu Tim, Satu Tujuan', 'Bersama kami berdiri, penuh kebanggaan dan tekad. Squad ini adalah gabungan dari pengalaman, semangat muda, dan dedikasi tanpa batas. Dari para veteran yang memimpin dengan kebijaksanaan, hingga pemain muda yang lapar akan kesuksesan—kami adalah satu keluarga, satu visi.\r\n\r\nMusim ini, kami tidak hanya bermain untuk kemenangan, tetapi untuk lambang di dada, untuk sejarah yang kami tulis bersama.', '20250108124749.jpg', '2025-01-08', 'danny'),
(15, 'Legenda Sepanjang Masa', 'Ini bukan sekadar squad, ini adalah kumpulan nama-nama yang telah menorehkan sejarah dan membawa kebanggaan tak terhingga. Mereka adalah simbol loyalitas, kerja keras, dan kejayaan yang abadi.\r\n\r\nDari para kiper tak tergantikan, bek kokoh yang jadi tembok pertahanan, gelandang kreatif pengatur irama, hingga penyerang haus gol yang tak kenal ampun—mereka adalah warisan kebanggaan yang tak akan pernah pudar.', '20250108131948.jpg', '2025-01-08', 'danny'),
(16, 'Theatre of Dreams: Old Trafford', 'Lebih dari sekadar stadion, Old Trafford adalah rumah bagi sejarah, kebanggaan, dan mimpi yang menjadi nyata. Di sinilah generasi pemain telah menciptakan momen-momen magis yang tak terlupakan, dan di sinilah ribuan suara penggemar bersatu untuk mendukung klub tercinta.\r\n\r\nDari kejayaan di masa lalu hingga ambisi untuk masa depan, setiap sudut stadion ini memancarkan jiwa dan semangat Manchester United. Old Trafford adalah simbol dari kebersamaan, kekuatan, dan harapan yang tak pernah padam.', '20250108124930.jpg', '2025-01-08', 'danny'),
(17, 'Lambang Kebanggaan: Logo Manchester United', 'Lebih dari sekadar simbol, logo ini adalah identitas kami—lambang kejayaan, sejarah, dan tradisi yang tak tergoyahkan. Setiap detailnya mewakili perjalanan panjang, kerja keras, dan semangat tak kenal menyerah yang telah membentuk klub ini.\r\n\r\nDengan warna merah yang menyala, setan ikonik yang menggambarkan keberanian, dan kapal yang melambangkan akar pelabuhan Manchester, logo ini menjadi pengingat bahwa kita adalah satu tim, satu keluarga, satu kebanggaan.', '20250108124951.jpg', '2025-01-08', 'danny');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `deskripsi`, `gambar`, `tanggal`, `username`) VALUES
(8, 'trophy', 'momen kemenangan', '20250108123606.jpg', '2025-01-08', 'danny'),
(9, 'logo', 'manchester united', '20250108124307.jpg', '2025-01-08', 'danny'),
(10, 'squad', '-', '20250108124325.jpg', '2025-01-08', 'danny'),
(11, 'trophy', 'momen kemenangan', '20250108124354.jpg', '2025-01-08', 'danny'),
(12, 'trophy', 'premier league', '20250108124440.jpg', '2025-01-08', 'danny'),
(13, 'squad', 'all time', '20250108124626.jpg', '2025-01-08', 'danny');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(26, 'danny', '21232f297a57a5a743894a0e4a801fc3', '20250108123734.jpg'),
(28, 'sulthan', '21232f297a57a5a743894a0e4a801fc3', '20250108124117.jpg'),
(29, 'yustr', '21232f297a57a5a743894a0e4a801fc3', '20250108130656.jpg'),
(30, 'agus', '21232f297a57a5a743894a0e4a801fc3', '20250108130720.jpg'),
(31, 'tio', '21232f297a57a5a743894a0e4a801fc3', '20250108130745.jpg'),
(32, 'alex', '21232f297a57a5a743894a0e4a801fc3', '20250108130809.jpg'),
(33, 'riski', '21232f297a57a5a743894a0e4a801fc3', '20250108130828.jpg'),
(34, 'davi', '21232f297a57a5a743894a0e4a801fc3', '20250108130849.jpg'),
(35, 'djiwo', '21232f297a57a5a743894a0e4a801fc3', '20250108130913.jpg'),
(36, 'legowo', '21232f297a57a5a743894a0e4a801fc3', '20250108130949.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
