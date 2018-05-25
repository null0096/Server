
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_name` text NOT NULL,
  `album_release_date` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `discs`
--

CREATE TABLE `discs` (
  `disc_id` int(11) NOT NULL,
  `disc_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `disc_movie`
--

CREATE TABLE `disc_movie` (
  `disc_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `disc_music`
--

CREATE TABLE `disc_music` (
  `disc_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int(11) NOT NULL,
  `movie_genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `movie_genres`
--

CREATE TABLE `movie_genres` (
  `movie_genre_id` int(11) NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `movie_producer`
--

CREATE TABLE `movie_producer` (
  `movie_id` int(11) NOT NULL,
  `movie_producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `music_id` int(11) NOT NULL,
  `music_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `music_album`
--

CREATE TABLE `music_album` (
  `music_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `music_genre`
--

CREATE TABLE `music_genre` (
  `music_id` int(11) NOT NULL,
  `music_genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `music_genres`
--

CREATE TABLE `music_genres` (
  `music_genre_id` int(11) NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `music_performer`
--

CREATE TABLE `music_performer` (
  `music_id` int(11) NOT NULL,
  `performer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `person_id` int(11) NOT NULL,
  `person_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Индексы таблицы `discs`
--
ALTER TABLE `discs`
  ADD PRIMARY KEY (`disc_id`);

--
-- Индексы таблицы `disc_movie`
--
ALTER TABLE `disc_movie`
  ADD PRIMARY KEY (`disc_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Индексы таблицы `disc_music`
--
ALTER TABLE `disc_music`
  ADD PRIMARY KEY (`disc_id`,`music_id`),
  ADD KEY `music_id` (`music_id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Индексы таблицы `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Индексы таблицы `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`movie_id`,`movie_genre_id`),
  ADD KEY `movie_genre_id` (`movie_genre_id`);

--
-- Индексы таблицы `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`movie_genre_id`);

--
-- Индексы таблицы `movie_producer`
--
ALTER TABLE `movie_producer`
  ADD PRIMARY KEY (`movie_id`,`movie_producer_id`),
  ADD KEY `movie_producer_id` (`movie_producer_id`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`);

--
-- Индексы таблицы `music_album`
--
ALTER TABLE `music_album`
  ADD PRIMARY KEY (`music_id`,`album_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Индексы таблицы `music_genre`
--
ALTER TABLE `music_genre`
  ADD PRIMARY KEY (`music_id`,`music_genre_id`),
  ADD KEY `music_genre_id` (`music_genre_id`);

--
-- Индексы таблицы `music_genres`
--
ALTER TABLE `music_genres`
  ADD PRIMARY KEY (`music_genre_id`);

--
-- Индексы таблицы `music_performer`
--
ALTER TABLE `music_performer`
  ADD PRIMARY KEY (`music_id`,`performer_id`),
  ADD KEY `performer_id` (`performer_id`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`person_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `discs`
--
ALTER TABLE `discs`
  MODIFY `disc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `movie_genre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `music_genres`
--
ALTER TABLE `music_genres`
  MODIFY `music_genre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `disc_movie`
--
ALTER TABLE `disc_movie`
  ADD CONSTRAINT `disc_movie_ibfk_1` FOREIGN KEY (`disc_id`) REFERENCES `discs` (`disc_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disc_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `disc_music`
--
ALTER TABLE `disc_music`
  ADD CONSTRAINT `disc_music_ibfk_1` FOREIGN KEY (`disc_id`) REFERENCES `discs` (`disc_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disc_music_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `people` (`person_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`movie_genre_id`) REFERENCES `movie_genres` (`movie_genre_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `movie_producer`
--
ALTER TABLE `movie_producer`
  ADD CONSTRAINT `movie_producer_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_producer_ibfk_2` FOREIGN KEY (`movie_producer_id`) REFERENCES `people` (`person_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `music_album`
--
ALTER TABLE `music_album`
  ADD CONSTRAINT `music_album_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `music_album_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `music_genre`
--
ALTER TABLE `music_genre`
  ADD CONSTRAINT `music_genre_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `music_genre_ibfk_2` FOREIGN KEY (`music_genre_id`) REFERENCES `music_genres` (`music_genre_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `music_performer`
--
ALTER TABLE `music_performer`
  ADD CONSTRAINT `music_performer_ibfk_1` FOREIGN KEY (`performer_id`) REFERENCES `people` (`person_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `music_performer_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
