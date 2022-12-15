create database `major_internship`;
use `major_internship`;
create table `company_post_adverts`(
    `id` int not null primary key auto_increment,
    `company_id` varchar(20) not null,
    `job_title` varchar(255) not null,
    `job_details` longtext,
    `deadline` varchar(255) not null,
    `doe` timestamp
);

create table `apply_company_advert`(
    `id` int not null primary key auto_increment,
    `company_id` varchar(20) not null,
    `student_id` varchar(20) not null,
    `student_email` varchar(225) not null,
    `student_telephone` varchar(20) not null,
    `company_post_adverts_id` varchar(20) not null,
    `internship_letter` varchar(255) not null,
    `status` varchar(20) not null,
    `doe` timestamp
);

create table `users`(
    `id` int not null primary key auto_increment,
    `username` varchar(255) not null,
    `pin` varchar(20) not null,
    `access_level` varchar(20) not null,
    `doe` timestamp
);

create table `news`(
    `id` int not null primary key auto_increment,
    `news_title` varchar(255) not null,
    `news_details` longtext,
    `posted_by` varchar(255) not null,
    `start_date` varchar(255) not null,
    `end_date` varchar(255) not null,
    `news_image` varchar(255) not null,
    `doe` timestamp
);

create table `department_post_adverts`(
    `id` int not null primary key auto_increment,
    `job_title` varchar(255) not null,
    `job_details` longtext,
    `deadline` varchar(255) not null,
    `company_name` varchar(255) not null,
    `company_email` varchar(255) not null,
    `company_address` varchar(255) not null,
    `company_tel` varchar(255) not null,
    `company_website` varchar(255) not null,
    `doe` timestamp
);

create table `apply_department_advert`(
    `id` int not null primary key auto_increment,
    `student_id` varchar(20) not null,
    `student_email` varchar(225) not null,
    `student_telephone` varchar(20) not null,
    `department_post_adverts_id` varchar(20) not null,
    `internship_letter` varchar(255) not null,
    `status` varchar(20) not null,
    `doe` timestamp
);

create table `company`(
    `comp_id` varchar(10) not null primary key,
    `company_name` varchar(255) not null,
    `region` varchar(255) not null,
    `work_phone` varchar(20) not null,
    `email` varchar(255) not null,
    `website` varchar(255) not null,
    `about` longtext,
    `date_of_registration` timestamp,
    `reg_ref_number` varchar(255) not null
);