BEGIN TRANSACTION;
insert into Robots (Robot_ID, RobotName, RobotDescription, RobotCost, RobotImage) values  ('ROB001', 'Ultron', 'Evil take over the world android from the Marvel universe', '6000000', 'ultron.jpg');
insert into Robots (Robot_ID, RobotName, RobotDescription, RobotCost, RobotImage) values  ('ROB002', 'R2D2', 'Star Wars good guy', '567770', 'R2D2.jpeg');
insert into Robots (Robot_ID, RobotName, RobotDescription, RobotCost, RobotImage) values  ('ROB003', 'Optimus Prime', 'Leader of the transformers', '70098000', 'prime.jpeg');
insert into Robots (Robot_ID, RobotName, RobotDescription, RobotCost, RobotImage) values  ('ROB004', 'Wally', 'Disney robot left on earth to clean it up', '6000000', 'Wally.jpeg');
insert into Robots (Robot_ID, RobotName, RobotDescription, RobotCost, RobotImage) values  ('ROB005', 'Fender', 'Futurama robot - only cares about himself, most of the time', '0.1', 'fender.jpg');
COMMIT;