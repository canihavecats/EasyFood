CREATE TABLE Product (
    ProductID int NOT NULL,
    ProductName varchar(30),
    Price int(10),
    Category varchar(30),
    photo varchar(50),
    PRIMARY KEY (ProductID)
);

CREATE TABLE UserInfo (
  UserID int NOT NULL AUTO_INCREMENT,
  Email varchar(70) NOT NULL,
  Username varchar(40) NOT NULL,
  Password varchar(100) NOT NULL,
  PRIMARY KEY (UserID)
);

CREATE TABLE Shopping_cart (
  ProductID int NOT NULL,
  ProductName varchar(30),
  Price int(10),
  FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

CREATE TABLE Orders (
  ProductID int NOT NULL,
  ProductName varchar(30),
  Price int,
  FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);


INSERT INTO Product
VALUES
  (1, "Potato", 2, "Vegetables", "pics/potato_1.jpg"),
  (2, "Lettuce", 1, "Vegetables", "pics/lettuce.jpg"),
  (3, "Tomato", 0.5, "Vegetables", "pics/tomato_1.jpg"),
  (4, "Apple", 2, "Fruits", "pics/fruit_4.jpg"),
  (5, "Juice", 2.50, "Drinks", "pics/juice.jpg"),
  (6, "Cola Drink", 3.50, "Drinks", "pics/cola.jpg"),
  (7, "Bread", 2.95, "Bread", "pics/bread_1.jpg"),
  (8, "Donut", 1.99, "Pastry", "pics/donut.jpg"),
  (9, "Banana", 1, "Fruit", "pics/banana_1.jpg"),
  (10, "Kale", 2.70, "Vegetables", "pics/kale_1.jpg"),
  (11, "Cucumber", 1.99, "Vegetables", "pics/cucumber_1.jpg"),
  (12, "Cucumber", 0.99, "Vegetables", "pics/cucumber_2.jpg"),
  (13, "Mountain Dew", 1.99, "Drinks", "pics/soda_1.jpg"),
  (14, "Bunny Drink", 5.99, "Drinks", "pics/soda_2.jpg"),
  (15, "Cola Drink", 2.99, "Drinks", "pics/soda_3.jpg"),
  (16, "Orange Drink", 3.99, "Drinks", "pics/soda_4.jpg"),
  (17, "Orange", 1.99, "Fruit", "pics/fruit_1.jpg"),
  (18, "Pineapple", 6.99, "Fruit", "pics/fruit_2.jpg"),
  (19, "Mango", 2.99, "Fruit", "pics/fruit_3.jpg"),
  (20, "Banana", 1.99, "Fruit", "pics/banana_2.jpg");
