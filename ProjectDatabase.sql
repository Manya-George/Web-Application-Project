Create schema if not exists DrugDispensingDatabase;

Create table if not exists Admins(
adminID int(15) primary key,
adminName varchar(40),
email varchar(40),
username varchar(45) unique,
passwords varchar(50)
);
drop table admins;
insert into Admins values (001,'Admin1','1nimdA');

Create table if not exists Patients(
SSN int(15) primary key,
fullName varchar(40),
dateofBirth date,
gender varchar(20),
addresses varchar(45),
phoneNumber varchar(20),
eMail varchar(45),
username varchar(45) unique,
passwords varchar(50)
);
drop table patients;

Create table if not exists Doctor(
SSN int(15) primary key,
fullName varchar(40),
speciality varchar(50),
firstDateAsDoctor date,
ranks varchar(10),
phoneNumber varchar(20),
eMail varchar(45),
username varchar(45) unique,
passwords varchar(50)
);

Create table if not exists Pharmacy(
pharmacistID varchar(10) unique primary key,
pharmacistName varchar(40),
orgName varchar(45),
phoneNumber int(20),
addresses varchar(45),
email varchar(45),
username varchar(45) unique,
passwords varchar(45)
);

drop table pharmacy;
Create table if not exists PharmaceuticalCompany(
businessID varchar(10) unique primary key,
companyName varchar(45),
phoneNumber int(20),
email varchar(45),
username varchar(45) unique,
passwords varchar(45)
);
Drop table PharmaceuticalCompany;

Create table if not exists Prescription(
Accept boolean
);

Create table if not exists Drugs(
tradeName varchar(40),
drugID int not null auto_increment primary key,
weight varchar(15),
companyID varchar(10),
price int(10),
stock int(10),
constraint foreign key (companyID) references PharmaceuticalCompany (businessID)
);
Drop table drugs;

Create table if not exists Prescriptions(
prescriptionID int not null auto_increment primary key,
patientSSN int(15) ,
Symptoms text,
Drug int(10),
Dosage varchar(10),
duration varchar(10),
datePrescribed date,
doctorSSN int(15),
Approved varchar(3),
Dispensed varchar(3) default 'NO',
constraint foreign key (patientSSN) REFERENCES patients(SSN),
foreign key (doctorSSN) REFERENCES doctor(SSN),
foreign key (Drug) REFERENCES drugs(drugID)
);
Create table if not exists dispenseddrugs(
patientSSN int(15),
DrugID int(10),
PharmacistID varchar(10),
dateDispensed date,
Price int(10),
units int(10) default 1,
constraint foreign key (patientSSN) REFERENCES patients(SSN),
foreign key (PharmacistID) REFERENCES Pharmacy(pharmacistID),
foreign key (DrugID) REFERENCES drugs(drugID)
);
drop table dispenseddrugs;


delete from prescriptions where prescriptionID=2;
drop table Prescriptions;
drop table patients;
delete from doctor where SSN=654;
insert into patient values (133,'dw','dw','23','wwe','321312313');
drop table Pharmacy;
drop table doctor;
drop table patient;
insert into patientlogin values(123,"abc@gmail.com","Phil","345");
insert into patientlogin values(124,"zxy@gmail.com","Suletta","654");
Select dd.*,d.*,p.* from dispensedDrugs dd,Prescriptions p,drugs d where d.drugID=p.Drug and p.drug is not null and dd.patientSSN=p.patientSSN and d.drugID=dd.DrugID;