CREATE TABLE `slaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickName` varchar(255) DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `skinColor` enum('black','white','yellow','red') DEFAULT NULL,
  `origin` text,
  `description` text,
  `hourRentPrice` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `i-weight` (`weight`),
  KEY `i-categoryId-price` (`categoryId`,`price`) USING BTREE,
  CONSTRAINT `FK-slaves-categoryId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `i-parent_id` (`parentId`),
  CONSTRAINT `i-parent_id` FOREIGN KEY (`parentId`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


#   Получить минимальную, максимальную и среднюю стоимость всех рабов весом более 60 кг.
SELECT MIN(price), MAX(price), AVG(price)
FROM slaves
WHERE weight > 60;

#   Выбрать категории, в которых больше 10 рабов.
SELECT c.id FROM categories c
JOIN slaves s ON s.categoryId = c.id
GROUP BY s.categoryId
HAVING COUNT(*) > 10;

#   Выбрать категорию с наибольшей суммарной стоимостью рабов.
SELECT c.id FROM categories c
JOIN slaves s ON s.categoryId = c.id
GROUP BY s.categoryId
ORDER BY SUM(price) DESC
LIMIT 1;

#   Выбрать категории, в которых мужчин больше чем женщин.
SELECT sex, categoryId
FROM (SELECT s.sex, s.categoryId, COUNT(s.id) as count FROM slaves s
      GROUP BY s.sex, s.categoryId
      ORDER BY count DESC) as tbl
WHERE sex = 'male'
GROUP BY count

#   Количество рабов в категории "Для кухни" (включая все вложенные категории).