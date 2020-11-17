USE restApp;
CREATE TABLE IF NOT EXISTS User1
( UserID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
FirstName CHAR(50) NOT NULL,
LastName CHAR(50) NOT NULL,
Email VARCHAR(80) NOT NULL,
Phone CHAR(30) NOT NULL,
Password CHAR(50) NOT NULL,
CreatedOn DATE NOT NULL,
Role VARCHAR (15) DEFAULT 'Customer'
);

CREATE TABLE IF NOT EXISTS Order1
( OrderID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  UserID INT NOT NULL,

FOREIGN KEY (UserID) REFERENCES User1(UserID)

);

CREATE TABLE IF NOT EXISTS Payment
( PaymentID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
OrderID INT NOT NULL,
TotalAmount FLOAT(6,2),
CreatedOn DATE NOT NULL,

FOREIGN KEY (OrderID) REFERENCES Order1(OrderID)

);

CREATE TABLE IF NOT EXISTS Menu
( FoodID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
FoodName CHAR(50) NOT NULL,
food_image varchar(300), 
Price FLOAT(6,2),
CreatedOn DATE NOT NULL

);

CREATE TABLE IF NOT EXISTS Orderline
( PRIMARY KEY(OrderID, FoodID),
Quantity INT,
CreatedOn DATE,
OrderID INT,
FoodID INT,


FOREIGN KEY (OrderID) REFERENCES Order1(OrderID),
FOREIGN KEY (FoodID) REFERENCES Menu(FoodID)

);
