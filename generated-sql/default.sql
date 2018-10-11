
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Archer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Archer`;

CREATE TABLE `Archer`
(
    `id` VARCHAR(36) NOT NULL,
    `booking_id` VARCHAR(36) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `class` VARCHAR(10) NOT NULL,
    `gender` VARCHAR(1) NOT NULL,
    `age` VARCHAR(20) NOT NULL,
    `club` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `booking_id` (`booking_id`, `name`, `class`, `gender`, `age`, `club`),
    CONSTRAINT `fk_archer_constraint`
        FOREIGN KEY (`booking_id`)
        REFERENCES `Booking` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Booking
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Booking`;

CREATE TABLE `Booking`
(
    `id` VARCHAR(36) NOT NULL,
    `shoot_id` VARCHAR(36) NOT NULL,
    `shoot_together` TINYINT(1) DEFAULT 0 NOT NULL,
    `shoot_days` VARCHAR(30),
    `permission` TINYINT(1) DEFAULT 0 NOT NULL,
    `booker_email` VARCHAR(150) NOT NULL,
    `notes` TEXT(1000),
    `date_booked` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `shoot_id` (`shoot_id`),
    INDEX `date_booked` (`date_booked`),
    CONSTRAINT `fk_booking_constraint`
        FOREIGN KEY (`shoot_id`)
        REFERENCES `Shoot` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Club
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Club`;

CREATE TABLE `Club`
(
    `id` VARCHAR(36) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(125) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `name` (`name`),
    INDEX `email` (`email`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Licence
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Licence`;

CREATE TABLE `Licence`
(
    `id` VARCHAR(36) NOT NULL,
    `club_id` VARCHAR(36) NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    `start` DATE NOT NULL,
    `end` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `club_id` (`club_id`),
    CONSTRAINT `fk_licence_constraint`
        FOREIGN KEY (`club_id`)
        REFERENCES `Club` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Shoot
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Shoot`;

CREATE TABLE `Shoot`
(
    `id` VARCHAR(36) NOT NULL,
    `club_id` VARCHAR(36) NOT NULL,
    `date_start` DATE NOT NULL,
    `date_end` DATE,
    `description` TEXT,
    `status` VARCHAR(6),
    `times_round` INTEGER(2),
    `targets` INTEGER(3),
    `max_per_target` INTEGER(2),
    PRIMARY KEY (`id`),
    INDEX `club_id` (`club_id`),
    CONSTRAINT `fk_shoot_constraint`
        FOREIGN KEY (`club_id`)
        REFERENCES `Club` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
