-- events: table
CREATE TABLE `events` (
  `id`           int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `title`        varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organiser`    varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about`        text COLLATE utf8mb4_unicode_ci         NOT NULL,
  `start_date`   timestamp                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date`     timestamp                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dead_line`    timestamp                               NULL     DEFAULT NULL,
  `address`      varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage`      varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_file` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flyer`        varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at`   timestamp                               NULL     DEFAULT NULL,
  `updated_at`   timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;


-- users: table
CREATE TABLE `users` (
  `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `first_name`        varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name`         varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo`             varchar(190) COLLATE utf8mb4_unicode_ci          DEFAULT '/storage/users/avatars/default.png',
  `phone`             varchar(12) COLLATE utf8mb4_unicode_ci           DEFAULT NULL,
  `address`           varchar(190) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
  `storage`           varchar(190) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
  `email`             varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp                               NULL     DEFAULT NULL,
  `password`          varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin`             varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
  `created_at`        timestamp                               NULL     DEFAULT NULL,
  `updated_at`        timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- galleries: table
CREATE TABLE `galleries` (
  `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id`   int(10) unsigned NOT NULL,
  `created_at` timestamp        NULL     DEFAULT NULL,
  `updated_at` timestamp        NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_event_id_foreign` (`event_id`),
  CONSTRAINT `galleries_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: galleries_event_id_foreign (index)
-- commitees: table
CREATE TABLE `commitees` (
  `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id`   int(10) unsigned NOT NULL,
  `created_at` timestamp        NULL     DEFAULT NULL,
  `updated_at` timestamp        NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commitees_event_id_foreign` (`event_id`),
  CONSTRAINT `commitees_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: commitees_event_id_foreign (index)

-- images: table
CREATE TABLE `images` (
  `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned                        NOT NULL,
  `path`       varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp                               NULL     DEFAULT NULL,
  `updated_at` timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 10
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: images_gallery_id_foreign (index)

-- members: table
CREATE TABLE `members` (
  `id`          int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id`     int(10) unsigned NOT NULL,
  `commitee_id` int(10) unsigned NOT NULL,
  `created_at`  timestamp        NULL     DEFAULT NULL,
  `updated_at`  timestamp        NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_commitee_id_foreign` (`commitee_id`),
  KEY `members_user_id_foreign` (`user_id`),
  CONSTRAINT `members_commitee_id_foreign` FOREIGN KEY (`commitee_id`) REFERENCES `commitees` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: members_user_id_foreign (index)

-- No native definition for element: members_commitee_id_foreign (index)

-- migrations: table
CREATE TABLE `migrations` (
  `id`        int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch`     int(11)                                 NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 13
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;


-- participations: table
CREATE TABLE `participations` (
  `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `participant_id` int(10) unsigned                        NOT NULL,
  `event_id`       int(10) unsigned                        NOT NULL,
  `file`           varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name`      varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session`        varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title`          varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authors`        varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliation`    varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation`   tinyint(1)                              NOT NULL DEFAULT '0',
  `created_at`     timestamp                               NULL     DEFAULT NULL,
  `updated_at`     timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participations_participant_id_foreign` (`participant_id`),
  KEY `participations_event_id_foreign` (`event_id`),
  CONSTRAINT `participations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `participations_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: participations_participant_id_foreign (index)

-- notifications: table
CREATE TABLE `notifications` (
  `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `participation_id` int(10) unsigned                        NOT NULL,
  `context`          varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen`             tinyint(1)                              NOT NULL DEFAULT '0',
  `created_at`       timestamp                               NULL     DEFAULT NULL,
  `updated_at`       timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_participation_id_foreign` (`participation_id`),
  CONSTRAINT `notifications_participation_id_foreign` FOREIGN KEY (`participation_id`) REFERENCES `participations` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: notifications_participation_id_foreign (index)

-- No native definition for element: participations_event_id_foreign (index)

-- password_resets: table
CREATE TABLE `password_resets` (
  `email`      varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token`      varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp                               NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: password_resets_email_index (index)

-- sliders: table
CREATE TABLE `sliders` (
  `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `event_id`   int(10) unsigned                        NOT NULL,
  `name`       varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp                               NULL     DEFAULT NULL,
  `updated_at` timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_event_id_foreign` (`event_id`),
  CONSTRAINT `sliders_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: sliders_event_id_foreign (index)

-- sponsors: table
CREATE TABLE `sponsors` (
  `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `event_id`   int(10) unsigned                        NOT NULL,
  `path`       varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name`       varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp                               NULL     DEFAULT NULL,
  `updated_at` timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- videos: table
CREATE TABLE `videos` (
  `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned                        NOT NULL,
  `path`       varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title`      varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail`  varchar(190) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
  `created_at` timestamp                               NULL     DEFAULT NULL,
  `updated_at` timestamp                               NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `videos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- No native definition for element: videos_gallery_id_foreign (index)