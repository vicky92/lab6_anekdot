-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 02 2014 г., 22:46
-- Версия сервера: 5.6.12-log
-- Версия PHP: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `anekdot`
--
CREATE DATABASE IF NOT EXISTS `anekdot` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `anekdot`;

-- --------------------------------------------------------

--
-- Структура таблицы `anekdots`
--

CREATE TABLE IF NOT EXISTS `anekdots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `time` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `anekdots`
--

INSERT INTO `anekdots` (`id`, `text`, `time`) VALUES
(9, '— Ты чего такая взвинченная? Что случилось? — Подарила мужу на 23 февраля набор рыболовных блесен. — Ну, все правильно. Он у тебя уже 10 лет каждые выходные на рыбалку уезжает. Чего не так? — Он его в руках вертел, вертел и спрашивает: "А что это такое?" anekdotov.net', 0),
(10, 'Вовочкин папа едет в Ленинград. — Дети, кто сочинит стихотворение со словом "Ленинград", тому я привезу то, что он в стихотворении попросит. — Папа едет в Ленинград, папа купит мармелад, — говорит младший брат Вовочки. — Молодец, куплю тебе мармелад. Вовочка: — Папа едет в Ленинград, папа купит мне мопед. — Не в рифму! — кричит папа. — Попробуй еще раз. — Папа едет в Ленинград, Мамин хахаль будет рад. Мамин хахаль наш сосед, Папа купит мне мопед. anekdotov.net', 0),
(11, 'Всем девушкам, ждущим принца на белом коне, сообщаю! Конь сдох, иду пешком, поэтому задерживаюсь.', 0),
(12, 'Широка страна моя родная. В ней простор, раздолье и уют. Я другой страны такой не знаю. Потому что визу не дают.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `favorit_anekdots`
--

CREATE TABLE IF NOT EXISTS `favorit_anekdots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anekdot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `favorit_anekdots`
--

INSERT INTO `favorit_anekdots` (`id`, `anekdot_id`, `user_id`) VALUES
(5, 9, 4),
(6, 11, 4),
(7, 10, 2),
(10, 11, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `labels`
--

INSERT INTO `labels` (`id`, `title`) VALUES
(2, 'Про Чапаева'),
(3, 'Про политиков'),
(4, 'Про Вовочку'),
(6, 'Про тещу'),
(7, 'Черный юмор'),
(8, 'Про детей'),
(9, 'Про врачей'),
(10, 'Про компьютерщиков'),
(11, 'Про семью');

-- --------------------------------------------------------

--
-- Структура таблицы `label_relations`
--

CREATE TABLE IF NOT EXISTS `label_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anekdot_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `label_relations`
--

INSERT INTO `label_relations` (`id`, `anekdot_id`, `label_id`) VALUES
(14, 9, 11),
(15, 10, 4),
(16, 10, 11),
(17, 11, 11),
(18, 12, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'writerr255@gmail.com', '987123', 'user'),
(2, 'wr255@gmail.com', '123456', 'user'),
(3, 'wrrr255@gmail.com', '123456', 'user'),
(4, 'admin@anekdot.ru', '123456', 'admin'),
(5, 'dev.molodoy@gmail.com', '987123', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
