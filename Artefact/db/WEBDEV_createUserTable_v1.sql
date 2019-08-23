CREATE TABLE User
(
	user_ID			    integer		    not null	PRIMARY KEY AUTOINCREMENT,
	user_name		    varchar(100)	not null,
	user_password	    varchar(255)	not null,
	user_password_hash	varchar(255)	not null,
	user_email		    varchar(100)	not null
);
