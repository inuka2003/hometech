-- CREATE TABLE Product
CREATE TABLE Product (
  prodId INT AUTO_INCREMENT,
  prodName VARCHAR(200) NOT NULL,
  prodPicNameSmall VARCHAR(200) NOT NULL,
  prodPicNameLarge VARCHAR(200) NOT NULL,
  prodDescripShort VARCHAR(1000),
  prodDescripLong VARCHAR(2000),
  prodPrice DECIMAL(8,2) NOT NULL DEFAULT '0.00',
  prodQuantity INT NOT NULL DEFAULT '100',
  CONSTRAINT p_pid_pk PRIMARY KEY (prodId)
);

-- Product 1: Dell XPS 13
INSERT INTO Product
(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
('Dell XPS 13', 'dellxps13_small.jpg', 'dellxps13_large.jpg',
 'The Dell XPS 13 is a sleek and portable 13-inch laptop that offers top-notch performance with its Intel Core i7 processor.',
 'The Dell XPS 13 features a stunning 13-inch InfinityEdge display, powered by an Intel Core i7 processor, 16GB of RAM, and 512GB of SSD storage. This laptop is designed for professionals who need performance on the go, making it perfect for both work and entertainment.',
 1399.99, 50);

-- Product 2: Apple MacBook Air M2
INSERT INTO Product
(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
('Apple MacBook Air M2', 'macbookairm2_small.jpg', 'macbookairm2_large.jpg',
 'The Apple MacBook Air M2 is a lightweight, powerful laptop with a 13.6-inch Retina display and Apple\'s new M2 chip.',
 'The MacBook Air M2 offers exceptional performance and efficiency with its M2 chip, providing up to 18 hours of battery life. The 13.6-inch Retina display offers stunning visuals, and the fanless design ensures silent operation. Perfect for creative professionals, students, and everyday users.',
 1199.99, 30);

-- Product 3: HP Spectre x360
INSERT INTO Product
(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
('HP Spectre x360', 'hpspectrex360_small.jpg', 'hpspectrex360_large.jpg',
 'The HP Spectre x360 is a convertible 2-in-1 laptop with excellent performance and an ultra-stylish design.',
 'The HP Spectre x360 is a 13.3-inch laptop that converts into a tablet, making it highly versatile. Powered by an Intel Core i7 processor and featuring 16GB of RAM and 512GB of SSD storage, this laptop is designed for those who want performance, style, and flexibility in a single device.',
 1599.99, 40);

-- Product 4: ASUS ZenBook 14
INSERT INTO Product
(prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
('ASUS ZenBook 14', 'asuszenbook14_small.jpg', 'asuszenbook14_large.jpg',
 'The ASUS ZenBook 14 is an ultra-thin laptop with a 14-inch Full HD display, making it ideal for productivity and portability.',
 'The ASUS ZenBook 14 features a 14-inch Full HD display, an Intel Core i7 processor, 16GB of RAM, and 512GB SSD storage. It is built for productivity on the go, with a slim design and long-lasting battery life. This laptop is perfect for users who need a powerful, lightweight device for daily tasks and work.',
 1099.99, 60);

CREATE TABLE Users (
    userId INT AUTO_INCREMENT NOT NULL,
    userType VARCHAR(1) NOT NULL,
    userFName VARCHAR(100) NOT NULL,
    userSName VARCHAR(100) NOT NULL,
    userAddress VARCHAR(200) NOT NULL,
    userPostCode VARCHAR(20) NOT NULL,
    userTelNo VARCHAR(20) NOT NULL,
    userEmail VARCHAR(100) NOT NULL UNIQUE,
    userPassword VARCHAR(100) NOT NULL,
    PRIMARY KEY (userId)
);
