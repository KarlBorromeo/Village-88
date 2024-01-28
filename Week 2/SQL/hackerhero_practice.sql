USE hackerhero_practice;

-- What's the query for creating this new database table with the fields above?
-- CREATE SCHEMA `hacker_hero`;

-- What's the query for inserting new records into this table?  Write queries for inserting three fake users into the table (one query for each insert).
-- INSERT INTO users (id,first_name, last_name,email_address,encrypted_password,created_at,updated_at)
-- VALUES
-- (1,'Karl','Borromeo','lrakborromeo@gmail.com', '123','2022-01-23 08:55:00','2022-01-23 08:55:00'),
-- (2,'Jhaerix','Borromeo','jhaerix@gmail.com', '123','2022-01-23 08:55:00','2022-01-23 08:55:00'),
-- (3,'Lyam','Borromeo','yamyam@gmail.com', '123','2022-01-23 08:55:00','2022-01-23 08:55:00');

-- What's the query for updating one of the user records?  For example, if you wanted to update the user record for id = 1, with some fake data, what would the query be?
-- UPDATE users
-- SET first_name='edi wow'
-- where id=1;

-- What query would you run for updating all of the user records with the last_name of 'Choi'?
-- UPDATE users
-- SET first_name='haha'
-- where last_name='Choi';

-- What query would you run for updating all the user records where ID is 3, 5, 7, 12, or 19?
-- UPDATE users
-- SET first_name='haha'
-- where id IN (3, 5, 7, 12, 19);

-- What's the query for deleting a user record where id = 1?
-- DELETE FROM users
-- where id=1;

-- What's the query for deleting the entire users records in the users table?
-- DELETE FROM USERS

-- What's the query for dropping the entire users table?  What's the difference between dropping the table and deleting all records?
-- DROP TABLE  users;
-- dropping table is making deleting the entire table but deleting the record only deleltes the data inside of it but not the whole table

-- What's the query for altering the email field to have it be 'email_address' instead?
-- ALTER TABLE users
-- RENAME COLUMN email to email_address;

-- What's the query for altering the id so that it's a BIGINT instead?
-- ALTER TABLE users
-- MODIFY COLUMN id BIGINT

-- What's the query for adding a new field to the users table called is_active where it's a Boolean (meaning it's either a 0 or a 1).  
-- Imagine you wanted the default value of this to be 0 when a new record is created and you won't allow this field to ever be NULL.  
-- With this in mind, now come up with a query.
-- ALTER TABLE users
-- ADD is_active BOOLEAN DEFAULT 1;



-- ALTER TABLE users
-- DROP COLUMN is_active;

-- SELECT * FROM users;