- Run


```bash
$ npm start

> shopper@0.0.0 start
> node ./server/bin/start

Successfully connected to Redis
Successfully connected to MongoDB
shopper listening on port 3000
Executing (default): SELECT 1+1 AS result
Executing (default): CREATE TABLE IF NOT EXISTS `Orders` (`id` INTEGER NOT NULL auto_increment , `userId` VARCHAR(24), `email` VARCHAR(255), `status` VARCHAR(255), `createdAt` DATETIME NOT NULL, `updatedAt` DATETIME NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB;
Successfully connected to MySQL
Executing (default): SHOW INDEX FROM `Orders` FROM `shopper`
Executing (default): CREATE TABLE IF NOT EXISTS `OrderItems` (`id` INTEGER NOT NULL auto_increment , `sku` INTEGER, `qty` INTEGER, `name` VARCHAR(255), `price` DECIMAL(10,2), `createdAt` DATETIME NOT NULL, `updatedAt` DATETIME NOT NULL, `OrderId` INTEGER, PRIMARY KEY (`id`), FOREIGN KEY (`OrderId`) REFERENCES `Orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE) ENGINE=InnoDB;
Executing (default): SHOW INDEX FROM `OrderItems` FROM `shopper`
```


- UI

![](.images/tables-created.png)