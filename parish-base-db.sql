CREATE DATABASE parishdata;

CREATE TABLE Events(
    eventID int AUTO_INCREMENT,
    eventName varchar(20),
    eventDesc text,
    eventStartDate DATE,
    eventEndDate DATE,
    eventImage varchar(50),
    eventStatus boolean,
    donationGoal float,
    PRIMARY KEY(eventID)
);
CREATE TABLE Categories(
    catID int AUTO_INCREMENT,
    catName varchar(20),
    catDesc text,
    PRIMARY KEY(catID)
);
CREATE TABLE Roles(
    roleID int AUTO_INCREMENT,
    roleName varchar(20),
    roleDesc text,
    PRIMARY KEY(roleID)
);
CREATE TABLE Users(
    userID int AUTO_INCREMENT,
    roleID int,
    fName varchar(20),
    lName varchar(20),
    mName varchar(20),
    age int,
    userAddress varchar(50),
    email varchar(30),
    userName varchar(20),
    userPass varchar(20),
    userStatus boolean,
    PRIMARY KEY(userID),
    FOREIGN KEY(roleID) references Roles(roleID)
);
CREATE TABLE Donations(
    donationID int AUTO_INCREMENT,
    userID int,
    catID int,
    eventID int,
    donationAmount float,
    donationDate date,
    donationType varchar(20),
    PRIMARY KEY(donationID),
    FOREIGN KEY(userID) references Users(userID),
    FOREIGN KEY(catID) references Categories(catID),
    FOREIGN KEY(eventID) references Events(eventID)
);
CREATE TABLE Reservations(
    reservationID int AUTO_INCREMENT,
    userID int,
    serviceID int,
    reserveInDate date,
    reserveOutDate date,
    reserveStatus boolean,
    PRIMARY KEY(reservationID),
    FOREIGN KEY(userID) references Users(userID),
    FOREIGN KEY(serviceID) references Church_Services(serviceID)
);
CREATE TABLE Church_Services(
    serviceID int AUTO_INCREMENT,
    serviceName varchar(30),
    serviceDesc text,
    servicePrice decimal,
    servicePic varchar(50),
    serviceReqs text,
    PRIMARY KEY(serviceID)
);
CREATE TABLE Marriage(
    serviceID int,
    groomName varchar(20),
    groomDadName varchar(20),
    groomMomName varchar(20),
    groomAge int,
    groomAddress text,
    brideName varchar(20),
    brideDadName varchar(20),
    brideMomName varchar(20),
    brideAge int,
    brideAddress text,
    PRIMARY KEY(serviceID),
    FOREIGN KEY(serviceID) references Church_Services(serviceID)
);
CREATE TABLE confirmation(
    serviceID int,
    confirmLname varchar(20),
    confirmFname varchar(20),
    confirmMname varchar(20),
    momName varchar(50),
    dadName varchar(50),
    birthplace varchar(50),
    birthdate date,
    baptismdate date,
    PRIMARY KEY(serviceID),
    FOREIGN KEY(serviceID) references Church_Services(serviceID)
);
CREATE TABLE Baptism(
    serviceID int,
    childFname varchar(20),
    childLname varchar(20),
    childMname varchar(20),
    momName varchar(50),
    dadName varchar(50),
    birthplace varchar(50),
    birthdate date,
    PRIMARY KEY(serviceID), 
    FOREIGN KEY(serviceID) references Church_Services(serviceID)
);
CREATE TABLE Mass(
    serviceID int,
    details text,
    nameOfDead varchar(50),
    PRIMARY KEY(serviceID),
    FOREIGN KEY(serviceID) references Church_Services(serviceID)
);