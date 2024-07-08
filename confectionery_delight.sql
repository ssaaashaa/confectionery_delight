-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2024 г., 13:45
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `confectionery_delight`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(14, 'admin', 'admin@admin.admin', '$2y$12$7rLE0s6gijscPHflllToZ.ZZ4ghZVnRM8B7RIPCiTNPnIVwRRwuwS', NULL, '2024-05-25 12:29:26'),
(23, 'Aleksandra', 'aleksa-vesna@mail.ru', '$2y$12$AxQuKGsbAy0bnI1OwchfE.xD8iwj0reM3nT3i/Uf3suYYFgSV8Hzu', '2024-05-28 12:58:51', '2024-06-02 05:07:17');

-- --------------------------------------------------------

--
-- Структура таблицы `biscuits`
--

CREATE TABLE `biscuits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `calories` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `biscuits`
--

INSERT INTO `biscuits` (`id`, `name`, `img`, `ingredients`, `calories`, `created_at`, `updated_at`) VALUES
(6, 'Сникерс', 'snickers.png', 'Сахарный песок, мука пшеничная (высший сорт), молоко коровье пастеризованное 3,2%, растительное масло, какао-порошок, куриные яйца, разрыхлитель, творожный сыр, сахарная пудра, сливки пастеризованные 33%, арахисовая паста, сливочное масло 82,5%, вафельная крошка, молочный шоколад, жареный арахис соленый.', 'белки 6.2 г, жиры 20.3 г, углеводы 27 г, 316 Ккал', NULL, NULL),
(7, 'Миндальный', 'almond.png', 'Мука пшеничная (высший сорт), сахарный песок, растительное масло, миндальная паста, молоко коровье пастеризованное 3,2%, яйца куриные, разрыхлитель, творожный сыр, сахарная пудра, сливки пастеризованные 33%.', 'белки 6 г, жиры 15.5 г, углеводы 30 г, 282 Ккал', NULL, NULL),
(8, 'Ванильный', 'vanilla.png', 'Мука пшеничная (высший сорт), сахарный песок, растительное масло, сливочное масло 82,5%, яйца куриные, разрыхлитель, сода пищевая, творожный сыр, сахарная пудра, сливки пастеризованные 33%.', 'белки 5.3 г, жиры 22.8 г, углеводы 31.6 г, 350 Ккал', NULL, NULL),
(9, 'Красный бархат', 'red_velvet.png\n', 'Мука пшеничная (высший сорт), растительное масло, кефир 3,2%, сахарный песок, яйца куриные, какао-порошок, разрыхлитель, сода пищевая, соль, пищевой краситель (красный), творожный сыр, сахарная пудра, сливки пастеризованные 33%.', 'белки 4.2 г, жиры 16.7 г, углеводы 28,  280 Ккал', NULL, NULL),
(16, 'Гиннесс', 'Гиннесс.png', NULL, NULL, '2024-06-03 04:30:07', '2024-06-03 04:30:07'),
(17, 'Кокосовый', 'Кокосовый.png', NULL, NULL, '2024-06-03 04:31:08', '2024-06-03 04:31:08'),
(18, 'Фисташковый', 'Фисташковый.png', NULL, NULL, '2024-06-03 05:44:58', '2024-06-03 05:44:58');

-- --------------------------------------------------------

--
-- Структура таблицы `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `design_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ratio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `designs`
--

INSERT INTO `designs` (`id`, `name`, `img`, `product_category_id`, `design_category_id`, `created_at`, `updated_at`, `ratio`) VALUES
(0, 'Торт со своим дизайном', 'design.png', 3, NULL, NULL, NULL, '1.00'),
(1, 'Капкейки с ягодками', 'design_1.png', 1, 4, NULL, NULL, '1.30'),
(2, 'Капкейки с ягодками', 'design_2.png', 1, 4, NULL, NULL, '1.20'),
(3, 'Торт DELIGHT 3 ', 'design_3.png', 3, 5, NULL, NULL, '1.05'),
(4, 'Торт DELIGHT 4', 'design_4.png', 3, 5, NULL, NULL, '1.05'),
(5, 'Торт DELIGHT 5', 'design_5.png', 3, 5, NULL, NULL, '1.00'),
(6, 'Торт DELIGHT 6', 'design_6.png', 3, 5, NULL, NULL, '1.00'),
(7, 'Подарочный бенто-бокс', 'bento.png', 4, NULL, NULL, NULL, '1.00'),
(8, 'Капкейки с шоколадками', 'design_7.png', 1, 1, NULL, NULL, '1.00'),
(9, 'Капкейки DELIGHT', 'design_8.png', 1, 3, NULL, NULL, '1.00'),
(10, 'Трайфлы с клубникой', 'design_9.png', 2, 7, NULL, NULL, '1.20'),
(11, 'Трайфлы с ягодным декором', 'design_10.png', 2, 7, NULL, NULL, '1.30'),
(12, 'Трайфлы с голубикой', 'design_11.png', 2, 7, NULL, NULL, '1.30'),
(13, 'Трайфлы с шоколадками', 'design_13.png', 2, 8, NULL, NULL, '1.20'),
(14, 'Капкейки с шоколадками и пожеланиями', 'image 45.png', 1, 1, NULL, NULL, '1.10'),
(15, 'Капкейки с шоколадками и печеньем', 'image 46.png', 1, 1, NULL, NULL, '1.00'),
(16, 'Капкейки с toffee', 'image 47.png', 1, 1, NULL, NULL, '1.05'),
(17, 'Капкейки с бабочками', 'image 50.png', 1, 2, NULL, NULL, '1.10'),
(18, 'Капкейки с единорогами', 'image 51.png', 1, 2, NULL, NULL, '1.15'),
(19, 'Капкейки с фламинго', 'image 52.png', 1, 2, NULL, NULL, '1.20'),
(20, 'Капкейки с цветочками', 'image 53.png', 1, 2, NULL, NULL, '1.15'),
(21, 'Капкейки \"MINECRAFT\"', 'image 54.png', 1, 3, NULL, NULL, '1.00'),
(22, 'Капкейки с футболом', 'image 55.png', 1, 3, NULL, NULL, '1.00'),
(23, 'Капкейки с печеньками', 'image 56.png', 1, 3, NULL, NULL, '1.00'),
(24, 'Капкейки с ягодным ассорти', 'image 57.png', 1, 4, NULL, NULL, '1.15'),
(25, 'Капкейки с клубникой', 'image 58.png', 1, 4, NULL, NULL, '1.15'),
(26, 'Трайфлы с клубникой и сердечками', 'image 59.png', 2, 7, NULL, NULL, '1.15'),
(27, 'Трайфлы с шоколадками', 'image 60.png', 2, 9, NULL, NULL, '1.05'),
(32, 'Трайфлы с кремовой надписью', 'image 62.png', 2, 9, NULL, NULL, '1.00'),
(33, 'Трайфлы с голубикой', 'image 63.png', 2, 7, NULL, NULL, '1.15'),
(34, 'Трайфлы \"love\"', 'image 65.png', 2, 9, NULL, NULL, '1.00'),
(35, 'Торт DELIGHT 7', 'design_15.png', 3, NULL, NULL, NULL, '1.00'),
(36, 'Торт DELIGHT 8', 'design_16.png', 3, NULL, NULL, NULL, '1.15'),
(37, 'Торт DELIGHT 9', 'design_17.png', 3, NULL, NULL, NULL, '1.20'),
(38, 'Торт DELIGHT 10', 'design_18.png', 3, NULL, NULL, NULL, '1.20'),
(39, 'Торт DELIGHT 11', 'design_19.png', 3, NULL, NULL, NULL, '1.10'),
(40, 'Торт DELIGHT 12', 'design_20.png', 3, NULL, NULL, NULL, '1.00'),
(41, 'Торт DELIGHT 13', 'design_21.png', 3, NULL, NULL, NULL, '1.10'),
(42, 'Торт DELIGHT 14', 'design_22.png', 3, NULL, NULL, NULL, '1.10'),
(43, 'Торт DELIGHT 15', 'design_23.png', 3, NULL, NULL, NULL, '1.00'),
(44, 'Торт DELIGHT 16', 'design_24.png', 3, NULL, NULL, NULL, '1.00'),
(45, 'Торт DELIGHT 17', 'design_25.png', 3, NULL, NULL, NULL, '1.00');

-- --------------------------------------------------------

--
-- Структура таблицы `design_categories`
--

CREATE TABLE `design_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `design_categories`
--

INSERT INTO `design_categories` (`id`, `name`, `product_category_id`, `created_at`, `updated_at`) VALUES
(1, 'С шоколадом', 1, NULL, NULL),
(2, 'Для девочки', 1, NULL, NULL),
(3, 'Для мальчика', 1, NULL, NULL),
(4, 'С ягодами', 1, NULL, NULL),
(5, 'Велюровое покрытие', 3, NULL, NULL),
(6, 'Кремовое покрытие', 3, NULL, NULL),
(7, 'С ягодами', 2, NULL, NULL),
(8, 'С орехами', 2, NULL, NULL),
(9, 'Без ягод', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `size`, `created_at`, `updated_at`) VALUES
(1, 'Скидка на 1-й заказ, (BYN)', '5', NULL, NULL),
(2, 'Скидка за 1 заказ, (%)', '2.5', NULL, NULL),
(3, 'Максимально возможная скидка, (%)', '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `time`, `price`, `event_count`, `event_type`, `created_at`, `updated_at`) VALUES
(1, 'Презентация новых начинок', 'В  кондитерской DELIGHT скоро пройдет захватывающее событие, наполненное ароматами сладости, радости и удивительных открытий – презентация новых начинок! Под прицелом внимания гостей окажется талантливый шеф-кондитер, который с гордостью представит перед собравшимися свои последние шедевры, созданные с изысканной любовью и высочайшим мастерством. После завораживающей презентации наступит долгожданный момент – время для самой захватывающей части мероприятия, дегустации, в ходе которой каждый гость окунется в мир новых вкусов и текстур начинок, испытывая настоящее восторг и неподдельное удовлетворение от каждого кусочка угощения. Волна гастрономического удовольствия накроет всех присутствующих, подарив каждому неповторимый кулинарный опыт и незабываемые впечатления, которые запомнятся на долгие годы.', '2024-06-21', '16:30', '80', '40', 'ПРЕЗЕНТАЦИЯ', NULL, '2024-06-02 19:00:51'),
(6, 'Дегустация начинок', NULL, '2024-06-08', '16:00', '80', '10', 'ДЕГУСТАЦИЯ', '2024-06-02 18:54:54', '2024-06-02 19:15:57'),
(7, 'Дегустация начинок', NULL, '2024-06-09', '16:00', '100', '15', 'ДЕГУСТАЦИЯ', '2024-06-02 19:12:50', '2024-06-02 19:12:50');

-- --------------------------------------------------------

--
-- Структура таблицы `event_records`
--

CREATE TABLE `event_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `event_records`
--

INSERT INTO `event_records` (`id`, `event_id`, `name`, `telephone`, `created_at`, `updated_at`) VALUES
(55, 6, 'Александра', '+375 (29) 132-63-72', '2024-06-03 00:20:41', '2024-06-03 00:20:41'),
(56, 7, 'Александра', '+375 (29) 132-63-72', '2024-06-03 00:21:08', '2024-06-03 00:21:08');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_requests`
--

CREATE TABLE `feedback_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback_requests`
--

INSERT INTO `feedback_requests` (`id`, `telephone`, `name`, `admin_comment`, `request_type`, `created_at`, `updated_at`) VALUES
(1, '+375 (29) 132-63-72', 'Александра', 'Новая заявка. Перезвонить', 'ДЕГУСТАЦИЯ', '2024-06-03 05:35:50', '2024-06-03 05:42:06'),
(2, '+375 (29) 132-63-72', 'Александра', 'Новая заявка.', 'ПРЕЗЕНТАЦИЯ', '2024-06-03 05:39:45', '2024-06-03 05:39:45');

-- --------------------------------------------------------

--
-- Структура таблицы `fills`
--

CREATE TABLE `fills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fills`
--

INSERT INTO `fills` (`id`, `name`, `ingredients`, `created_at`, `updated_at`) VALUES
(1, 'Малина', 'замороженная малина, сахарный песок, кукурузный крахмал', NULL, NULL),
(2, 'Клубника', 'замороженная клубника, сахарный песок, кукурузный крахмал', NULL, NULL),
(3, 'Вишня', 'замороженная вишня, сахарный песок, кукурузный крахмал', NULL, NULL),
(4, 'Ягодный микс', 'замороженный микс из ягод клубники, смородины, ежевики, сахарный песок, кукурузный крахмал', NULL, NULL),
(5, 'Домашняя карамель', 'сахарный песок, вода питьевая, сироп глюкозы, сливочное масло 82.5%, сливки пастеризованные 33%, желатин ', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Пирожные', NULL, NULL),
(2, 'Чизкейки', NULL, NULL),
(3, 'Кофе и чай', NULL, NULL),
(4, 'Напитки', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_products`
--

CREATE TABLE `menu_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_products`
--

INSERT INTO `menu_products` (`id`, `menu_category_id`, `name`, `description`, `price`, `weight`, `img`, `created_at`, `updated_at`) VALUES
(2, 3, 'ЭСПРЕССО', 'Классический черный кофе', '2.49', '30мл', 'espresso.jpg', NULL, NULL),
(3, 1, 'Сердце', 'Ванильный бисквит с муссом и клубничной начинкой', '4.49', '1шт./80г.', 'serdce.jpg', NULL, NULL),
(4, 1, 'Панна котта', 'Брауни с грецким орехом, шоколадный мусс, карамель', '5.89', '1шт./120г.', 'panna_kotta.jpg', NULL, NULL),
(5, 1, 'Десерт Павлова', 'Безе, крем с творожным сыром,\r\nлимонный курт, малина', '6.19', '1шт./140г.', 'desert_pavlova.jpg', NULL, NULL),
(6, 1, 'Три шоколада', 'Бисквит с муссом из трех видов\r\nшоколада', '4.89', '1шт./110г.', 'tri_shokolada.jpg', NULL, NULL),
(7, 2, 'Шоколадный с вишней', 'Песочная основа, шоколадный чизкейк, вишня в коньяке', '2.99', '1 шт./100г.', 'chizkeyk_shokoladnyy_s_vishney_razrez.jpg', NULL, NULL),
(8, 1, 'Баунти', 'Шоколадный бисквит покрытый ванильным муссом с кокосом', '2.99', '1шт./100г.', 'baunti.jpg', NULL, NULL),
(9, 1, 'Бэйкахус', 'Песочное тесто с кремом на основе вареного сгущенного молока', '2.59', '1шт./85г.', 'beykhaus.jpg', NULL, NULL),
(10, 1, 'Картошка', 'Нежная бисквитная крошка со сливочным кремом и какао', '2.39', '1шт./90г.', 'kartoshka.jpg', NULL, NULL),
(11, 1, 'Твикс с белым шоколадом', 'Песочная основа, кешью, сгущенное молоко и белая карамель', '3.49', '1шт./100г.', 'tviks_s_belym_shokoladom.jpg', NULL, NULL),
(12, 1, 'Твикс с темным шоколадом', 'Песочная основа, фундук, сгущенное молоко и карамель', '3.49', '1шт./100г.', 'tviks_s_temnym_shokoladom.jpg', NULL, NULL),
(13, 1, 'Эклер соленая карамель', 'Пирожное с заварным кремом соленая карамель', '2.69', '1шт./60г.', 'ekler_solenaya_karamelj.jpg', NULL, NULL),
(14, 1, 'Эклер маракуйя', 'Пирожное с заварным кремом на основе пюре маракуйя', '2.69', '1шт./60г.', 'ekler_marakuyya.jpg', NULL, NULL),
(15, 1, 'Эклер кокос', 'Пирожное с заварным кремом и кокосовой стружкой', '2.69', '1шт./60г.', 'ekler_kokos.jpg', NULL, NULL),
(16, 1, 'Каека', 'Воздушно-ореховые слои на основе жареного фундука с кусочками темного шоколада и сливочным кремом', '2.79', '1шт./100г.', 'kaeka.jpg', NULL, NULL),
(17, 1, 'Макарон', 'Воздушное миндальное безе с кремом', '2.59', '1шт./22г.', 'makaron.jpg', NULL, NULL),
(18, 2, 'С белым шоколадом', 'Песочная основа покрыта нежным кремом на основе творога и сливок со стружкой из белого шоколада', '3.19', '1 шт./100г.', 'chizkeyk_s_belym_shokoladom_razrez.jpg', NULL, NULL),
(19, 2, 'Стокгольм', 'Основа из бисквита брауни, покрытая шоколадно-ореховым пралине со сливками и шоколадным ганашем', '3.09', '1 шт./100г.', 'stokgoljm_razrez.jpg', NULL, NULL),
(20, 2, 'Нью-йорк', 'Песочная основа с нежной текстурой из творожного сыра', '2.99', '1 шт./100г.', 'chizkeyk_njyu_york_razrez.jpg', NULL, NULL),
(21, 3, 'Американо', 'Эспрессо с добавлением горячей воды', '2.69', '120мл', 'amerikano.jpg', NULL, NULL),
(22, 3, 'Капучино', 'Классический, с корицей', '3.19', '190мл', 'kapuchino.jpg', NULL, NULL),
(23, 3, 'Латте', 'Классический, с корицей, маккиато', '3.49', '350мл', 'latte.jpg', NULL, NULL),
(24, 3, 'Айс-латте', 'Холодный кофейный напиток', '3.49', '350мл', 'ays_latte.jpg', NULL, NULL),
(25, 3, 'Флэт уайт', 'Капучино с двойным эспрессо', '3.79', '350мл', 'flet_uayt.jpg', NULL, NULL),
(26, 3, 'Чай фирменный', 'В ассортименте', '3.49', '350мл', 'tea-cup.png', NULL, NULL),
(27, 4, 'Лимонад смородина-базилик', NULL, '2.99', '400мл', 'limonad_smorodina-bazilik.jpg', NULL, NULL),
(28, 4, 'Лимонад апельсин-розмарин', NULL, '3.49', '400мл', 'limonad_apeljsin-rozmarin.jpg', NULL, NULL),
(29, 4, 'Лимонад клубника-мята', NULL, '3.49', '400мл', 'limonad_klubnika-myata.jpg', NULL, NULL),
(30, 4, 'Морс смородиновый', NULL, '3.49', '400мл', 'mors_smorodinovyy.jpg', NULL, NULL),
(31, 4, 'Морс брусничный', NULL, '3.49', '400мл', 'mors_brusnichnyy.jpg', NULL, NULL),
(32, 4, 'Морс облепиховый', NULL, '3.49', '400мл', 'mors_oblepihovyy.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2014_10_12_000000_create_users_table', 1),
(25, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2024_04_10_202353_create_biscuits_table', 1),
(29, '2024_04_10_204515_create_admin_users_table', 1),
(30, '2024_04_11_073219_create_menu_categories_table', 1),
(31, '2024_04_11_074921_create_menu_products_table', 1),
(32, '2024_04_11_102113_create_product_categories_table', 1),
(33, '2024_04_11_104141_create_design_categories_table', 2),
(34, '2024_04_11_105337_create_designs_table', 3),
(35, '2024_04_11_115338_create_fills_table', 4),
(36, '2024_04_11_120303_create_taste_combinations_table', 5),
(38, '2024_04_11_121359_update_designs_table', 6),
(40, '2024_04_11_122054_create_products_table', 7),
(41, '2024_04_11_124253_create_feedback_requests_table', 8),
(42, '2024_04_11_124734_create_events_table', 9),
(43, '2024_04_11_125303_create_event_records_table', 10),
(47, '2024_04_16_125135_create_products_table', 11),
(48, '2024_04_16_125155_create_orders_table', 11),
(49, '2024_04_16_125227_create_order_details_table', 11),
(50, '2024_04_20_113832_create_reviews_table', 12),
(51, '2024_04_24_102511_create_discounts_table', 13),
(52, '2014_10_12_100000_create_password_resets_table', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ожидает подтверждения',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `comment`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(103, 52, '2024-05-06', 'Самовывоз.', '52.6', 'Выполнен', '2024-06-03 00:46:15', '2024-06-03 00:46:52'),
(104, 53, '2024-05-31', 'Самовывоз.', '275', 'Выполнен', '2024-06-03 00:50:29', '2024-06-03 02:21:41'),
(105, 54, '2024-05-20', 'Самовывоз.', '275', 'Выполнен', '2024-06-03 00:55:53', '2024-06-03 02:21:37'),
(106, 55, '2024-05-15', 'Самовывоз.', '149', 'Выполнен', '2024-06-03 00:59:44', '2024-06-03 02:21:33'),
(111, 61, '2024-05-01', 'Самовывоз.', '70', 'Выполнен', '2024-06-03 01:10:37', '2024-06-03 02:21:30'),
(113, 63, '2024-06-08', 'Самовывоз.', '62.4', 'Подтвержден', '2024-06-03 05:38:24', '2024-06-03 05:43:03');

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `count`, `quantity`, `created_at`, `updated_at`) VALUES
(76, 31, 103, '6 шт', '1', '2024-06-03 00:46:15', '2024-06-03 00:46:15'),
(77, 32, 104, 'ярусы: 3, вес: 7 кг', '1', '2024-06-03 00:50:29', '2024-06-03 00:50:29'),
(78, 27, 105, 'ярусы: 3, вес: 7 кг', '1', '2024-06-03 00:55:53', '2024-06-03 00:55:53'),
(79, 15, 106, '800 гр', '1', '2024-06-03 00:59:44', '2024-06-03 00:59:44'),
(84, 30, 111, '400 гр', '1', '2024-06-03 01:10:37', '2024-06-03 01:10:37'),
(86, 36, 113, '6 шт', '1', '2024-06-03 05:38:24', '2024-06-03 05:38:24');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taste_combination_id` bigint(20) UNSIGNED NOT NULL,
  `design_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `taste_combination_id`, `design_id`, `created_at`, `updated_at`) VALUES
(8, 4, 1, '2024-04-17 14:11:57', '2024-04-17 14:11:57'),
(9, 5, 1, '2024-04-17 14:18:19', '2024-04-17 14:18:19'),
(10, 10, 1, '2024-04-17 15:00:40', '2024-04-17 15:00:40'),
(11, 5, 6, '2024-04-19 07:29:37', '2024-04-19 07:29:37'),
(15, 3, 7, '2024-04-22 03:38:11', '2024-04-22 03:38:11'),
(17, 14, 2, '2024-04-24 16:54:00', '2024-04-24 16:54:00'),
(18, 13, 4, '2024-04-24 17:00:09', '2024-04-24 17:00:09'),
(22, 3, 4, '2024-05-31 07:10:24', '2024-05-31 07:10:24'),
(24, 48, 1, '2024-06-02 13:51:49', '2024-06-02 13:51:49'),
(25, 46, 2, '2024-06-02 16:19:56', '2024-06-02 16:19:56'),
(26, 48, 8, '2024-06-02 16:20:25', '2024-06-02 16:20:25'),
(27, 48, 0, '2024-06-02 16:23:00', '2024-06-02 16:23:00'),
(28, 6, 12, '2024-06-02 23:58:25', '2024-06-02 23:58:25'),
(29, 12, 5, '2024-06-03 00:01:37', '2024-06-03 00:01:37'),
(30, 48, 7, '2024-06-03 00:08:42', '2024-06-03 00:08:42'),
(31, 48, 13, '2024-06-03 00:46:15', '2024-06-03 00:46:15'),
(32, 46, 6, '2024-06-03 00:50:29', '2024-06-03 00:50:29'),
(33, 46, 0, '2024-06-03 01:00:38', '2024-06-03 01:00:38'),
(34, 48, 2, '2024-06-03 01:05:21', '2024-06-03 01:05:21'),
(35, 48, 37, '2024-06-03 03:32:23', '2024-06-03 03:32:23'),
(36, 61, 12, '2024-06-03 05:38:24', '2024-06-03 05:38:24');

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Капкейки', 5, NULL, NULL),
(2, 'Трайфлы', 8, NULL, NULL),
(3, 'Торт', 40, NULL, NULL),
(4, 'Бенто-бокс', 70, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `order_id`, `review`, `created_at`, `updated_at`) VALUES
(11, 52, 103, 'Все на высоте! Праздника удался! Оставайтесь такими же вкусными и красивыми', '2024-05-15 00:46:15', NULL),
(12, 54, 105, 'Все прекрасно! Спасибо! Торт вкуснейший', '2024-05-23 03:56:13', NULL),
(13, 53, 104, 'Все супер! Продолжайте в том же духе', '2024-06-01 03:57:51', NULL),
(14, 55, 106, 'Все отлично, как и всегда!', '2024-05-28 04:08:49', NULL),
(15, 61, 111, 'Подарочный бокс отличный! Сын в восторге', '2024-05-08 04:10:55', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `taste_combinations`
--

CREATE TABLE `taste_combinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biscuit_id` bigint(20) UNSIGNED NOT NULL,
  `fill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `ratio` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `taste_combinations`
--

INSERT INTO `taste_combinations` (`id`, `biscuit_id`, `fill_id`, `img`, `ratio`, `created_at`, `updated_at`) VALUES
(3, 8, 1, 'Лавандовый.png', '1.10', NULL, '2024-06-03 05:44:29'),
(4, 8, 2, 'vanilla.png', '1.10', NULL, NULL),
(5, 8, 3, 'vanilla.png', '1.10', NULL, NULL),
(6, 8, 4, 'vanilla.png', '1.10', NULL, NULL),
(9, 8, 5, 'vanilla.png', '1.00', NULL, NULL),
(10, 9, 1, 'red_velvet.png', '1.10', NULL, '2024-06-02 12:34:27'),
(11, 9, 2, 'red_velvet.png', '1.10', NULL, NULL),
(12, 9, 3, 'red_velvet.png', '1.10', NULL, NULL),
(13, 9, 4, 'red_velvet.png', '1.10', NULL, NULL),
(14, 9, 5, 'red_velvet.png', '1.00', NULL, NULL),
(46, 7, 3, 'almond.png', '1.00', '2024-06-02 11:01:29', '2024-06-02 11:01:29'),
(48, 6, NULL, 'snickers.png', '1.00', '2024-06-02 11:02:38', '2024-06-02 11:02:38'),
(56, 16, 1, 'Гиннесс.png', '1.00', '2024-06-03 04:30:07', '2024-06-03 04:30:07'),
(57, 16, 2, 'Гиннесс.png', '1.00', '2024-06-03 04:30:07', '2024-06-03 04:30:07'),
(58, 16, 3, 'Гиннесс.png', '1.00', '2024-06-03 04:30:07', '2024-06-03 04:30:07'),
(59, 16, 4, 'Гиннесс.png', '1.00', '2024-06-03 04:30:07', '2024-06-03 04:30:07'),
(60, 16, 5, 'Гиннесс.png', '1.00', '2024-06-03 04:30:07', '2024-06-03 04:30:07'),
(61, 17, 1, 'Кокосовый.png', '1.00', '2024-06-03 04:31:08', '2024-06-03 04:31:08'),
(63, 18, 2, 'Фисташковый.png', '1.00', '2024-06-03 05:44:58', '2024-06-03 05:44:58');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `email_verified_at`, `telephone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(52, 'avatar.png', 'Евгений', 'ev@test.test', NULL, '+375 (29) 111-11-11', '$2y$12$tLATVKd/misykWWwqWxs5uWD1nxbf9WZOvbPMzxCvg96.aJDliOEy', NULL, '2024-06-03 00:46:15', '2024-06-03 00:46:15'),
(53, 'avatar.png', 'Наталья', 'nat@test.test', NULL, '+375 (29) 784-56-12', '$2y$12$IM1HZCgU8p7WGUKQwgBHPOR/qj5dMjLw7DBpo2fhWWZs9kvfSlLy6', NULL, '2024-06-03 00:50:29', '2024-06-03 00:50:29'),
(54, 'avatar.png', 'Ольга', 'ol@test.test', NULL, '+375 (29) 444-44-44', '$2y$12$XkRrFi/d6r2Zzi7va1SucuV32hoz/0TTKFc1ML8XUlTMMF6kEF6/a', NULL, '2024-06-03 00:55:53', '2024-06-03 00:55:53'),
(55, 'avatar.png', 'Елена', 'helen@test.test', NULL, '+375 (29) 788-85-55', '$2y$12$l37Fwa/0bJeGpc4y3F3NGe3po8T5h.ZU/IJoHhxYF5oGQzB1Nl5CC', NULL, '2024-06-03 00:59:44', '2024-06-03 00:59:44'),
(61, 'avatar.png', 'Алексей', 'al@test.test', NULL, '+375 (29) 454-15-15', '$2y$12$kXGaUsnjVvppTgcTISbOUugspbL4g2sOd0gvhI6UVfoFX9XBVjhse', NULL, '2024-06-03 01:10:37', '2024-06-03 01:10:37'),
(63, 'user-63.png', 'Александра', 'aleksa-vesna@mail.ru', NULL, '+375 (29) 132-63-72', '$2y$12$w30KrK/sG.ZfKQE1zTYxDuyBuJuB4mkB165FYenFRDNLRPRwpw4Au', NULL, '2024-06-03 05:38:24', '2024-06-03 05:39:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Индексы таблицы `biscuits`
--
ALTER TABLE `biscuits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designs_product_category_id_foreign` (`product_category_id`),
  ADD KEY `designs_design_category_id_foreign` (`design_category_id`);

--
-- Индексы таблицы `design_categories`
--
ALTER TABLE `design_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_categories_product_category_id_foreign` (`product_category_id`);

--
-- Индексы таблицы `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_records`
--
ALTER TABLE `event_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_records_event_id_foreign` (`event_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `feedback_requests`
--
ALTER TABLE `feedback_requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fills`
--
ALTER TABLE `fills`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_products`
--
ALTER TABLE `menu_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_products_menu_category_id_foreign` (`menu_category_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_taste_combination_id_foreign` (`taste_combination_id`),
  ADD KEY `products_design_id_foreign` (`design_id`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `taste_combinations`
--
ALTER TABLE `taste_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taste_combinations_biscuit_id_foreign` (`biscuit_id`),
  ADD KEY `taste_combinations_fill_id_foreign` (`fill_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `biscuits`
--
ALTER TABLE `biscuits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `design_categories`
--
ALTER TABLE `design_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `event_records`
--
ALTER TABLE `event_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback_requests`
--
ALTER TABLE `feedback_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `fills`
--
ALTER TABLE `fills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu_products`
--
ALTER TABLE `menu_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT для таблицы `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `taste_combinations`
--
ALTER TABLE `taste_combinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `designs`
--
ALTER TABLE `designs`
  ADD CONSTRAINT `designs_design_category_id_foreign` FOREIGN KEY (`design_category_id`) REFERENCES `design_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `designs_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `design_categories`
--
ALTER TABLE `design_categories`
  ADD CONSTRAINT `design_categories_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `event_records`
--
ALTER TABLE `event_records`
  ADD CONSTRAINT `event_records_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_products`
--
ALTER TABLE `menu_products`
  ADD CONSTRAINT `menu_products_menu_category_id_foreign` FOREIGN KEY (`menu_category_id`) REFERENCES `menu_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_design_id_foreign` FOREIGN KEY (`design_id`) REFERENCES `designs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_taste_combination_id_foreign` FOREIGN KEY (`taste_combination_id`) REFERENCES `taste_combinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `taste_combinations`
--
ALTER TABLE `taste_combinations`
  ADD CONSTRAINT `taste_combinations_biscuit_id_foreign` FOREIGN KEY (`biscuit_id`) REFERENCES `biscuits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taste_combinations_fill_id_foreign` FOREIGN KEY (`fill_id`) REFERENCES `fills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
