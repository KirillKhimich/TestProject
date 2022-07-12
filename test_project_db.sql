-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 12 2022 г., 13:19
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_project_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `categoryTitle`) VALUES
(2, 'Деловые/Найм'),
(3, 'Деловые/Реклама'),
(4, 'Деловые/Управление бизнесом'),
(5, 'Деловые/Управление людьми'),
(6, 'Деловые/Управление проектами'),
(7, 'Детские/Воспитание'),
(8, 'Дизайн/Общее'),
(9, 'Дизайн/Logo'),
(10, 'Дизайн/Web дизайн'),
(11, 'Разработка/PHP'),
(12, 'Разработка/HTML и CSS'),
(13, 'Разработка/Проектирование'),
(14, 'Общее/Мировая литература'),
(15, 'Саморазвитие / Личная эффективность'),
(16, 'Разработка/C#'),
(29, 'Деловые/Бизнес-процессы');

-- --------------------------------------------------------

--
-- Структура таблицы `cloudtags`
--

CREATE TABLE `cloudtags` (
  `materialId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cloudtags`
--

INSERT INTO `cloudtags` (`materialId`, `tagId`) VALUES
(2, 3),
(2, 12),
(2, 25),
(3, 3),
(3, 12),
(4, 12),
(9, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `materialId` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(755) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`id`, `materialId`, `title`, `link`) VALUES
(4, 2, 'Ссылка на интернет-магазин для покупки', 'https://www.mann-ivanov-ferber.ru/books/put-dzhedaya/?buytab=paperbook&amp;etext=2202.lj4G2VCVs8qF3dZe_wVQamYLUWGfBNVRgn7QG0uZKNBm-wgVZKTpNwEjl9NJCTJB_XTR_INCeuRBSjZDAQdQum1yeGZscGpzeXZja2l4eGg.26a3fd532dbc70e7934e2bcb65c139f0dec85e2e&amp;yclid=3750752450404733776&amp;utm_source=yandex&amp;utm_medium=cpc&amp;utm_campaign=Товарная%20кампания&amp;utm_term=&amp;utm_content=pid_2537006|rid_filter|cid_75086194|gid_4935648617|aid_12307895501|adp_no|pos_premium2|src_search_none|dvc_desktop|dsa_2537006'),
(6, 4, 'Отзыв на книгу', 'https://www.livelib.ru/book/1000307698/reviews-tsvety-dlya-eldzhernona-deniel-kiz'),
(12, 9, 'Ссылка на покупку', 'https://www.chitai-gorod.ru/catalog/book/987086/'),
(17, 3, 'Марковь', 'https://www.livelib.ru/book/1000307698/reviews-tsvety-dlya-eldzhernona-deniel-kiz'),
(18, 9, 'Капуста', 'https://www.livelib.ru/book/1000307698/reviews-tsvety-dlya-eldzhernona-deniel-kiz');

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `title`, `author`, `description`, `typeId`, `categoryId`) VALUES
(2, 'Путь джедая', 'Максим Дорофеев', 'Почитать стоит для чинного роста', 1, 15),
(3, 'Полное руководство по Yii 2.0', 'Александр Макаров', '', 4, 11),
(4, 'Цветы для Элджернона', 'Дэниел Киз', 'Хорошая книга', 1, 14),
(9, 'Ревизор', 'Н.В Гоголь', '', 1, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tagsTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `tagsTitle`) VALUES
(3, 'Саморазвитие'),
(12, 'Продуктивность'),
(19, 'Отдых'),
(25, 'Личная эффективность');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `typeTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `typeTitle`) VALUES
(1, 'Книга'),
(2, 'Статья'),
(3, 'Видео'),
(4, 'Сайт/Блог'),
(5, 'Подборка'),
(6, 'Ключевые идеи книги');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cloudtags`
--
ALTER TABLE `cloudtags`
  ADD PRIMARY KEY (`materialId`,`tagId`),
  ADD KEY `materialIdIdx` (`materialId`),
  ADD KEY `fkTaglId` (`tagId`);

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkMaterialIdLinks` (`materialId`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCategorsId` (`categoryId`),
  ADD KEY `fkTypeId` (`typeId`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cloudtags`
--
ALTER TABLE `cloudtags`
  ADD CONSTRAINT `fkMaterialId` FOREIGN KEY (`materialId`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkTaglId` FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `fkMaterialIdLinks` FOREIGN KEY (`materialId`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `fkCategorsId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkTypeId` FOREIGN KEY (`typeId`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
