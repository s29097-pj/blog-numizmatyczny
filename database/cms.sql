-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 18, 2024 at 10:12 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `summary`, `content`) VALUES
(1, '2024/06/18', 'Historia i tajemnice starożytnych monet', 'W tym artykule odkryjemy fascynujący świat starożytnych monet, które nie tylko służyły jako środek wymiany handlowej, ale także pełniły rolę ważnych źródeł historycznych i artystycznych.', 'Starożytne monety nie tylko odzwierciedlają gospodarcze i polityczne realia swoich czasów, ale często posiadają także głębsze znaczenie kulturowe i symboliczne. Prześledzimy historię od starożytnego Egiptu, gdzie pierwsze monety pojawiły się jako zapis wartości towarów, aż po epokę grecką i rzymską, gdzie monety stały się świadectwem potęgi imperium oraz platformą do upamiętnienia ważnych wydarzeń i postaci.\r\n\r\nMonety starożytne nie tylko pełniły funkcję ekonomiczną, ale także były nośnikami symboli religijnych, mitologicznych i politycznych. Każdy wizerunek, który można znaleźć na tych monetach, ma swoją historię do opowiedzenia, od personifikacji bogów po portrety władców.\r\n\r\nW artykule omówimy również techniki, jakimi posługiwali się starożytni mennicy, aby wykonać monety oraz materiały, z których je produkowano. Poznamy tajniki numizmatyki, czyli nauki zajmującej się zbieraniem i badaniem monet, która pozwala nam lepiej zrozumieć zarówno dzieje, jak i estetykę starożytnych cywilizacji.\r\n\r\nJeśli chcesz zgłębić tajemnice, jakie skrywają starożytne monety, zapraszam do dalszej lektury. Dowiedz się, jak numizmatyka może otworzyć drzwi do fascynującej przeszłości!');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
