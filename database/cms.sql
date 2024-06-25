-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 25, 2024 at 11:17 PM
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
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Gosc',
  `content` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `date`, `created_at`) VALUES
(2, 1, 'Michał', 'Bardzo ciekawy artykuł na 5+', '0000-00-00 00:00:00', '2024-06-25 20:30:23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `summary`, `content`, `image`) VALUES
(1, '2024-06-25', 'Historia i tajemnice starożytnych monet', 'W tym artykule odkryjemy fascynujący świat starożytnych monet, które nie tylko służyły jako środek wymiany handlowej, ale także pełniły rolę ważnych źródeł historycznych i artystycznych.', 'Starożytne monety nie tylko odzwierciedlają gospodarcze i polityczne realia swoich czasów, ale często posiadają także głębsze znaczenie kulturowe i symboliczne. Prześledzimy historię od starożytnego Egiptu, gdzie pierwsze monety pojawiły się jako zapis wartości towarów, aż po epokę grecką i rzymską, gdzie monety stały się świadectwem potęgi imperium oraz platformą do upamiętnienia ważnych wydarzeń i postaci. Monety starożytne nie tylko pełniły funkcję ekonomiczną, ale także były nośnikami symboli religijnych, mitologicznych i politycznych. Każdy wizerunek, który można znaleźć na tych monetach, ma swoją historię do opowiedzenia, od personifikacji bogów po portrety władców. W artykule omówimy również techniki, jakimi posługiwali się starożytni mennicy, aby wykonać monety oraz materiały, z których je produkowano. Poznamy tajniki numizmatyki, czyli nauki zajmującej się zbieraniem i badaniem monet, która pozwala nam lepiej zrozumieć zarówno dzieje, jak i estetykę starożytnych cywilizacji. Jeśli chcesz zgłębić tajemnice, jakie skrywają starożytne monety, zapraszam do dalszej lektury. Dowiedz się, jak numizmatyka może otworzyć drzwi do fascynującej przeszłości!', 'antyk_b.jpg'),
(3, '2024-06-25', 'Polskie monety obiegowe', 'W tym wpisie zajmę się polskimi monetami obiegowymi', '1, 2 i 5 gr wykonane są z mosiądzu manganowego (MM59), 10, 20 i 50 gr oraz 1 zł wykonane są z miedzioniklu (MN25), 2 i 5 zł wykonane są z miedzioniklu (rdzeń monety 2 zł i pierścień monety 5 zł) oraz z brązalu (rdzeń monety 5 zł i pierścień monety 2 zł).', 'polskie_monety.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','author','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `name`) VALUES
(1, 'Jan', '$2y$10$7p39DbJkGZoeFL4H84pXAuBf4ZWqVPs2ykX262ZKictwgfuTNkmEu', 'jan@wp.pl', 'user', '2024-06-25 18:51:49', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
