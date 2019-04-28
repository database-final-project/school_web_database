/*******************************************************************
* This script creates the database named k_12_school
********************************************************************/

DROP DATABASE IF EXISTS k_12_school;
CREATE DATABASE k_12_school;
USE k_12_school;

-- create the tables for the database
CREATE TABLE student (
  student_id		VARCHAR(10)		PRIMARY KEY,
  s_password		VARCHAR(10)			NOT NULL,
  first_name		VARCHAR(50)		NOT NULL,
  last_name		VARCHAR(50)		NOT NULL
);

CREATE TABLE teacher (
  teacher_id		VARCHAR(10)			PRIMARY KEY,
  t_password		VARCHAR(10)			NOT NULL,
  first_name		VARCHAR(50)		NOT NULL,
  last_name		VARCHAR(50)		NOT NULL
);

CREATE TABLE course (
  course_id		VARCHAR(10)			PRIMARY KEY,
  teacher_id	VARCHAR(10)			NOT NULL,
  course_name	VARCHAR(50)		NOT NULL,
  course_schedule	VARCHAR(250)	DEFAULT NULL
);

CREATE TABLE enrolls_in (
	student_id		VARCHAR(10)	,
    course_id		VARCHAR(10)	,
    grade		VARCHAR(2)		DEFAULT NULL
);

-- Insert data into the tables
INSERT INTO student(student_id, first_name, last_name, s_password) VALUES
('101', 'Jesus', 'Arredondo', '1101'),
('102', 'Semeredin', 'Hamza', '1102'),
('103', 'Reginald', 'Peoples', '1103'),
('104', 'Peter', 'Smith', '1104'),
('105', 'Emily', 'Clark', '1105'),
('106', 'Joseph', 'Penrod', '1106'),
('107', 'Samuel', 'Cooke', '1107'),
('108', 'Ketty', 'Howard', '1108'),
('109', 'Lada', 'Rolle', '1109'),
('110', 'Jessica', 'Watson', '1110');

INSERT INTO teacher(teacher_id, first_name, last_name, t_password) VALUES
('1', 'Barack', 'Obama', '1001'),
('2', 'Michelle', 'Obama', '1002'),
('3', 'Malia', 'Obama', '1003'),
('4', 'Sasha', 'Obama', '1004');

INSERT INTO course(course_id, teacher_id, course_name, course_schedule) VALUES
('1', '2', 'Algebra','7:30 am - 8:45 am'),
('2', '2', 'Precalculus','8:50 am - 10:05 am'),
('3','1', 'American Literature','10:10 am - 11:25 am'),
('4', '1', 'World Literature','12:30 pm - 1:45 pm'),
('5','3', 'Inorganic Chemistry','1:50 pm - 2:05 pm'),
('6', '4', 'Environmental Science','2:10 pm - 2:25 pm');

INSERT INTO enrolls_in(student_id, course_id, grade) VALUES
('101', '1', 'A'), ('101', '3', 'B+'), ('101', '5', 'A'), ('101', '6', 'A'),
('102', '2', 'A+'), ('102', '3', 'A'), ('102', '5', 'A'), ('102', '6', 'A'),
('103', '1', 'B+'), ('103', '4', 'A'), ('103', '5', 'A'), ('103', '6', 'A'),
('104', '2', 'A'), ('104', '4', 'C'), ('104', '5', 'A'), ('104', '6', 'B'),
('105', '1', 'A'), ('105', '3', 'B'), ('105', '5', 'A'), ('105', '6', 'A'),
('106', '1', 'B-'), ('106', '3', 'A'), ('106', '5', 'A'), ('106', '6', 'A'),
('107', '1', 'A'), ('107', '3', 'A'), ('107', '5', 'A+'), ('107', '6', 'A'),
('108', '2', 'B'), ('108', '4', 'C'), ('108', '5', 'A'), ('108', '6', 'A'),
('109', '2', 'A'), ('109', '4', 'B'), ('109', '5', 'A'), ('109', '6', 'A'),
('110', '2', 'A'), ('110','4', 'A'), ('110', '5', 'A-'), ('110', '6', 'A');
