CREATE TABLE Users (
userid MEDIUMINT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
username VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
address VARCHAR(255),
ccnum INT(16),
ccdate VARCHAR(5),
cccode INT(4),
PRIMARY KEY (userid)
);

CREATE TABLE Items (
itemid MEDIUMINT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
quantity INT NOT NULL,
ctype VARCHAR(255),
color VARCHAR(255),
snum INT,
PRIMARY KEY (itemid)
);

CREATE TABLE Orders (
orderid MEDIUMINT NOT NULL AUTO_INCREMENT,
userid INT NOT NULL,
itemid INT NOT NULL,
count INT NOT NULL,
PRIMARY KEY (orderid)
/*FOREIGN KEY (userid) REFERENCES User(userid)
FOREIGN KEY (itemid) REFERENCES Item(itemid)*/
);

CREATE TABLE Cart (
userid INT NOT NULL,
itemid INT NOT NULL,
count INT NOT NULL,
/*FOREIGN KEY (userid) REFERENCES User(userid)
FOREIGN KEY (itemid) REFERENCES Item(itemid)*/
);
