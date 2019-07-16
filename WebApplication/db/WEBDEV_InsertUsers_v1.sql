BEGIN TRANSACTION;
insert into "User" (user_name, user_password, user_password_hash, user_email ) 
values  ('Ultron', 'evilone', '5555', 'ultron@evilones.com');
COMMIT;
