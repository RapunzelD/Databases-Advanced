-- Maak table 'Users'.
-- Drop de table als hij al bestaat.
IF OBJECT_ID('Users', 'U') IS NOT NULL
 DROP TABLE Users;
GO

CREATE TABLE Users
(
 CustomerId int NOT NULL PRIMARY KEY, -- primary key column
 Email NVARCHAR(50) NOT NULL,
 Name nvarchar(50) NOT NULL,
 Username nvarchar(50) NOT NULL,
 dhash nvarchar(50),
 Salt nvarchar(10)
 );
GO

INSERT INTO Users
 ([CustomerId], [Email], [Name], [Username])
VALUES
 ( 1, N'test.test@tddest.com', N'memeh', N'JamesBond')
GO