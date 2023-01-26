<?php
require('connect_database.php');


$sql1= "CREATE TABLE Users
(
userID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(userID),
username varchar(15) UNIQUE,
acc_password varchar(15)
)";

$sql2 = "CREATE TABLE Task
(
taskID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(taskID),
title varchar(15),
start_time date,
due_time date ,
done_status boolean,
userID int,
FOREIGN KEY (userID) REFERENCES Users(userID),
catagoryID int,
FOREIGN KEY (catagoryID) REFERENCES Catagory(catagoryID)
)";

$sql3 = "CREATE TABLE Catagory
(
catagoryID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(catagoryID),
title varchar(15) UNIQUE,
userID int,
FOREIGN KEY (userID) REFERENCES Users(userID)
)";

if (mysqli_query($con,$sql1))
{
echo "Table created";
}
else
{
echo "Error creating table: " . mysqli_error($con);
}
if (mysqli_query($con,$sql2))
{
echo "Table created";
}
else
{
echo "Error creating table: " . mysqli_error($con);
}
if (mysqli_query($con,$sql3))
{
echo "Table created";
}
else
{
echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);
?>