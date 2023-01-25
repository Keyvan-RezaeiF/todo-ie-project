<?php
require('connect_database.php');


$sql1= "CREATE TABLE Users
(
userID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(userID),
username varchar(15),
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
FOREIGN KEY (userID) REFERENCES Users(userID)
)";

$sql3 = "CREATE TABLE Catagory
(
taskUserID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(taskUserID),
title varchar(15),
userID int ,
taskID int,
FOREIGN KEY (userID) REFERENCES Users(userID),
FOREIGN KEY (taskID) REFERENCES Users(taskID)
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