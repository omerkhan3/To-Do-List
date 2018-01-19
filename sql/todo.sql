create database todo;

use todo;
 
drop table if exists tasks;

create table tasks (
	task varchar(200),
    completed varchar(50),
    dueDate date,
    id int NOT NULL AUTO_INCREMENT,
    Primary Key (id)
);

