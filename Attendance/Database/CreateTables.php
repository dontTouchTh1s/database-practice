<?php
/** @var mysqli $mysql */

include "Config.php";
$mysql = new mysqli(HOST, USER, PASSWORD, DATABASE);

$query =
    "
CREATE TABLE IF NOT EXISTS employees(
    id INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(60) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    group_policies_id INT NOT NULL,
    manager_id INT,
    PRIMARY KEY (`id`),
    UNIQUE employees_email_unique (email),
    INDEX employees_manager_id_foreign (`manager_id`),
    CONSTRAINT `employees_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `employees`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `leave_requests`(
    id INT AUTO_INCREMENT NOT NULL,
    `type` ENUM(\"daily\",\"hourly\") NOT NULL,
    `from_date` timestamp NOT NULL,
    `to_date` timestamp NOT NULL,
    `from_hour` timestamp,
    `to_hour` timestamp,
    PRIMARY KEY (`id`)    
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `requests`(
    id INT AUTO_INCREMENT NOT NULL ,
    requestable_id INT NOT NULL,
    requestable_type VARCHAR(255) NOT NULL,
    employee_id INT NOT NULL,
    status ENUM(\"accepted\", \"declined\", \"pending\") DEFAULT 'pending',
    feedback TEXT,
    description TEXT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX requests_employee_id_foreign (`employee_id`),
    INDEX requests_requestable_type_requestable_id_index	 (`employee_id`),
    CONSTRAINT `requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `attendance_leave_times`(
    id INT AUTO_INCREMENT NOT NULL,
    `date` TIMESTAMP NOT NULL,
    `type` ENUM(\"leave\", \"attendance\"),
    employee_id INT,
    PRIMARY KEY (`id`),
    INDEX attendance_leave_times_employee_id_foreign (`employee_id`),
    CONSTRAINT `attendance_leave_times_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `group_policies`(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL,
    max_leave_month INT NOT NULL,
    max_leave_year INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `penalty_conditions`(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL,
    type ENUM(\"delay\", \"cuttingOut\", \"leaveAttendance\"),
    duration INT NOT NULL,
    penalty INT NOT NULL,
    group_policy_id INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX penalty_conditions_group_policy_id_foreign (`group_policy_id`),
    CONSTRAINT `penalty_conditions_group_policy_id_foreign` FOREIGN KEY (`group_policy_id`) REFERENCES `group_policies`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB;


";

$mysql->multi_query($query);