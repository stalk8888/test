
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных db
CREATE DATABASE IF NOT EXISTS `db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `db`;


-- Дамп структуры для таблица db.task
CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД задачи',
  `task_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Наименование задачи',
  `task_user_id` int(11) DEFAULT NULL COMMENT 'ИД назначенного пользователя',
  `task_status` int(11) NOT NULL DEFAULT 0 COMMENT 'Статус задачи: \r\n 0 - не выполнено\r\n 1 - выполнено\r\n',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы db.task: ~5 rows (приблизительно)
DELETE FROM `task`;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` (`task_id`, `task_title`, `task_user_id`, `task_status`) VALUES
	(1, 'Задача 1', NULL, 0),
	(2, 'Задача 2', 1, 0),
	(3, 'Задача 3', 2, 1),
	(4, 'Задача 4', 3, 0),
	(5, 'Задача 5', NULL, 0);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;


-- Дамп структуры для таблица db.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД пользователя',
  `user_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя пользователя',
  `user_fio` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ФИО пользователя',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы db.user: ~4 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_name`, `user_fio`) VALUES
	(1, 'i.ivanov', 'Иванов Иван'),
	(2, 'p.petrov', 'Петров Петр'),
	(3, 'm.ivanova', 'Иванова Мария'),
	(5, 'e.petrova', 'Петрова Елена');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
