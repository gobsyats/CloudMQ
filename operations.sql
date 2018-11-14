use cloudmq;
show tables;

drop database cloudmq;
create database cloudmq;

desc registration;
desc sensedata;
drop table sensedata;

insert into sensedata (devid, lpg, smoke, co, datetime, vin) values
('1', 0.008155, 0.00541302, 0.0218512, '2018/10/10:10:10:10', 'AAAAAAAAAAAAAAAA' );
insert into sensedata (devid, lpg, smoke, co, datetime, vin) values
('1', 1.008155, 0.00541302, 1.0218512, '2018/10/10:10:10:10', 'AAAAAAAAAAAAAAAA' );
insert into sensedata (devid, lpg, smoke, co, datetime, vin) values
('1', 2.008155, 3.00541302, 2.0218512, '2018/10/10:10:10:10', 'AAAAAAAAAAAAAAAA' );
insert into sensedata (devid, lpg, smoke, co, datetime, vin) values
('1', 2.008155, 2.00541302, 2.0218512, '2018/10/10:10:10:10', 'AAAAAAAAAAAAAAAA' );
insert into sensedata (devid, lpg, smoke, co, datetime, vin) values
('1', 1.008155, 1.00541302, 1.0218512, '2018/10/10:10:10:10', 'AAAAAAAAAAAAAAAA' );




select * from registration;
select * from sensedata;