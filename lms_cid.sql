-- data base lms_cid
CREATE DATABASE IF NOT EXISTS `lms_cid`;

-- table course start
CREATE TABLE IF NOT EXISTS `course`
(
    `id`                       INT          NOT NULL AUTO_INCREMENT,
    `title`                    VARCHAR(255) NOT NULL,
    `short_description`        LONGTEXT     NOT NULL,
    `description`              TEXT         NOT NULL,
    `outcomes`                 LONGTEXT     DEFAULT NULL,
    `language`                 INT          DEFAULT NULL,
    `category_id`              INT          DEFAULT NULL,
    `sub_category_id`          INT          DEFAULT NULL,
    `section`                  LONGTEXT     DEFAULT NULL,
    `requirements`             LONGTEXT     DEFAULT NULL,
    `price`                    VARCHAR(10)      NOT NULL,
    `discount_flag`            INT          DEFAULT NULL,
    `discount_price`           VARCHAR(10)      NOT NULL,
    `level`                    INT          DEFAULT NULL,
    `user_id`                  INT          DEFAULT NULL,
    `thumbnail`                VARCHAR(255) DEFAULT NULL,
    `thumbnail_old`            VARCHAR(255) DEFAULT NULL,
    `video_url`                VARCHAR(255) DEFAULT NULL,
    `date_added`               DATETIME     DEFAULT NULL,
    `last_modified`            DATETIME     DEFAULT NULL,
    `visibility`               INT          DEFAULT NULL,
    `is_top_course`            INT          DEFAULT NULL,
    `is_admin`                 INT          DEFAULT NULL,
    `status`                   INT          NOT NULL,
    `course_overview_provider` VARCHAR(255) DEFAULT NULL,
    `meta_keywords`            LONGTEXT     DEFAULT NULL,
    `meta_description`         LONGTEXT     DEFAULT NULL,
    `is_free_course`           INT          NOT NULL,
    PRIMARY KEY (`id`)
#     FOREIGN KEY (`id_fk`) REFERENCES `id_fk` (`id_fk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
#     FOREIGN KEY (`id_fk`) REFERENCES `id_fk` (`id_fk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
#     FOREIGN KEY (`id_fk`) REFERENCES `id_fk` (`id_fk`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table course end

-- table users start
CREATE TABLE IF NOT EXISTS `users`
(
    `id`                INT          NOT NULL AUTO_INCREMENT,
    `dni`               VARCHAR(8)   NOT NULL,
    `name`              VARCHAR(255) NOT NULL,
    `first_parent`      VARCHAR(255) NOT NULL,
    `last_parent`       VARCHAR(255) NOT NULL,
    `email`             VARCHAR(255) NOT NULL,
    `password`          VARCHAR(255) NOT NULL,
    `social_link`       LONGTEXT     NOT NULL,
    `biography`         TEXT         NOT NULL,
    `user_image`        MEDIUMTEXT   NOT NULL,
    `role_id`           INT          NOT NULL,
    `date_added`        DATETIME     NOT NULL,
    `last_modified`     DATETIME     NOT NULL,
    `watch_history`     LONGTEXT     NOT NULL,
    `wishlist`          LONGTEXT     NOT NULL,
    `title`             LONGTEXT     NOT NULL,
    `paypal_keys`       LONGTEXT     NOT NULL,
    `stripe_keys`       LONGTEXT     NOT NULL,
    `verification_code` LONGTEXT     NOT NULL,
    `status`            INT          NOT NULL,
    `is_instructor`     INT          NOT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table users end

-- table lesson start
CREATE TABLE IF NOT EXISTS `lesson`
(
    `id`              INT NOT NULL AUTO_INCREMENT,
    `title`           VARCHAR(255) DEFAULT NULL,
    `duration`        VARCHAR(255) DEFAULT NULL,
    `course_id`       INT          DEFAULT NULL,
    `section_id`      INT          DEFAULT NULL,
    `icon_type`       VARCHAR(56)  DEFAULT NULL,
#     `video_type`      VARCHAR(255) DEFAULT NULL,
    `video_url`       VARCHAR(255) DEFAULT NULL,
    `date_added`      DATETIME     DEFAULT NULL,
    `last_modified`   DATETIME     DEFAULT NULL,
    `lesson_type`     VARCHAR(255) DEFAULT NULL,
    `attachment`      MEDIUMTEXT   DEFAULT NULL,
    `attachment_type` VARCHAR(255) DEFAULT NULL,
    `summary`         LONGTEXT     DEFAULT NULL,
    `order`           INT NOT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table lesson end

-- table alter lesson start
ALTER TABLE lesson
    ADD container_embed LONGTEXT DEFAULT NULL;
-- table alter lesson end

-- table question start
CREATE TABLE IF NOT EXISTS `question`
(
    `id`                INT NOT NULL AUTO_INCREMENT,
    `quiz_id`           INT NOT NULL,
    `title`             VARCHAR(255) DEFAULT NULL,
    `type`              VARCHAR(255) DEFAULT NULL,
    `number_of_options` INT          DEFAULT NULL,
    `options`           LONGTEXT     DEFAULT NULL,
    `correct_answers`   LONGTEXT     DEFAULT NULL,
    `order`             INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table question end

-- table rating start
CREATE TABLE IF NOT EXISTS `rating`
(
    `id`            INT         NOT NULL AUTO_INCREMENT,
    `rating`        DOUBLE      NOT NULL,
    `user_id`       INT         NOT NULL,
    `ratable_id`    INT         NOT NULL,
    `ratable_type`  VARCHAR(50) NOT NULL,
    `date_added`    DATETIME    NOT NULL,
    `last_modified` DATETIME    NOT NULL,
    `review`        TEXT        NOT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table rating end

-- table rating start
CREATE TABLE IF NOT EXISTS `section`
(
    `id`        INT          NOT NULL AUTO_INCREMENT,
    `title`     VARCHAR(124) NOT NULL,
    `course_id` INT          NOT NULL,
    `user_id`   INT          NOT NULL,
    `order`     INT          NOT NULL,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table rating end


-- table category start
CREATE TABLE IF NOT EXISTS `category`
(
    `id`                 INT          NOT NULL AUTO_INCREMENT,
    `code`               VARCHAR(255) NOT NULL,
    `name`               VARCHAR(255) NOT NULL,
    `parent`             INT          NOT NULL,
    `slug`               VARCHAR(255) NOT NULL,
    `color`              VARCHAR(7)   NOT NULL,
    `date_added`         DATETIME     NOT NULL,
    `last_modified`      DATETIME     NOT NULL,
    `font_awesome_class` VARCHAR(255) NOT NULL,
    `thumbnail`          VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table category end

-- table level start
CREATE TABLE IF NOT EXISTS `level`
(
    `id_level` INT         NOT NULL AUTO_INCREMENT,
    `level`    VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id_level`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table level end

-- table course_language start
CREATE TABLE IF NOT EXISTS `course_language`
(
    `id_coursel`      INT         NOT NULL AUTO_INCREMENT,
    `course_language` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id_coursel`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table course_language end


-- table course archive start
CREATE TABLE IF NOT EXISTS `course_archive`
(
    `id`            INT NOT NULL AUTO_INCREMENT,
    `course_id`     INT         DEFAULT NULL,
    `course`        VARCHAR(16) DEFAULT NULL,
    `user_id`       INT         DEFAULT NULL,
    `date_delete`   DATETIME    DEFAULT NULL,
    `author_delete` INT         DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table course archive end


-- table role start
CREATE TABLE IF NOT EXISTS `role`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(124) NOT NULL,
    `date_added`    DATETIME     NOT NULL,
    `last_modified` DATETIME     NOT NULL,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table role end


-- table enrol start
CREATE TABLE IF NOT EXISTS `enrol`
(
    `id`            INT      NOT NULL AUTO_INCREMENT,
    `user_id`       INT      NOT NULL,
    `course_id`     INT      NOT NULL,
    `date_added`    DATETIME NOT NULL,
    `last_modified` DATETIME NOT NULL,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table enrol end


-- table language start
CREATE TABLE IF NOT EXISTS `language`
(
    `phrase_id`  INT      NOT NULL AUTO_INCREMENT,
    `phrase`     INT      NOT NULL,
    `spanish`    INT      NOT NULL,
    `english`    DATETIME NOT NULL,
    `portuguese` DATETIME NOT NULL,
    `quechua`    DATETIME NOT NULL,

    PRIMARY KEY (`phrase_id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table language end

-- table slider start
CREATE TABLE IF NOT EXISTS `slider`
(
    `id`             INT        NOT NULL AUTO_INCREMENT,
    `title`          TINYTEXT   NOT NULL,
    `phrase`         TINYTEXT   NOT NULL,
    `slide_img`      MEDIUMTEXT NOT NULL,
    `link_read_more` MEDIUMTEXT NOT NULL,
    `order`          int        NOT NULL,
    `date_added`     DATETIME   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
-- table slider end
