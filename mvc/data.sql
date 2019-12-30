create database mvc_study;
use mvc_study;
create table `student` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `age` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
);
insert into `student` values
  (NULL, 'Leon', 'male', '20'),
  (NULL, 'Claire', 'female', '18');
