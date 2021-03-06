USE phpadvclass2015lab;

CREATE TABLE IF NOT EXISTS Customers (
CustomerID TINYINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
CustomerName VARCHAR(50) NOT NULL UNIQUE KEY, 
Description VARCHAR(255) NOT NULL,
active TINYINT(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Projects (
ProjectID INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
ProjectName VARCHAR(50) NOT NULL, 
ProjectHours INT(10) NOT NULL,
CustomerID TINYINT UNSIGNED DEFAULT NULL,
FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
logged DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
lastupdated DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
active tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS TimeEntry (
TimeEntryID INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
CustomerID TINYINT UNSIGNED DEFAULT NULL,
FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
ProjectID INT UNSIGNED DEFAULT NULL,
FOREIGN KEY (ProjectID) REFERENCES Projects(ProjectID),
TaskDescription VARCHAR(50) NOT NULL, 
HoursSpent INT(10) NOT NULL,
logged DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
lastupdated DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
active tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS signup (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar(150) COLLATE utf8_unicode_ci NOT NULL UNIQUE KEY,
    password varchar(60) COLLATE utf8_unicode_ci NOT NULL,
    created DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    active tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;
