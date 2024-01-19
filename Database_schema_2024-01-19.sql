CREATE TABLE `users`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);
CREATE TABLE `posts`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `body` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `posts` ADD INDEX `posts_user_id_index`(`user_id`);
CREATE TABLE `likes`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `comment_id` BIGINT NOT NULL
);
ALTER TABLE
    `likes` ADD INDEX `likes_user_id_index`(`user_id`);
ALTER TABLE
    `likes` ADD INDEX `likes_comment_id_index`(`comment_id`);
CREATE TABLE `comments`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `post_id` BIGINT NOT NULL,
    `parent_id` BIGINT NULL,
    `body` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `comments` ADD INDEX `comments_user_id_index`(`user_id`);
ALTER TABLE
    `comments` ADD INDEX `comments_post_id_index`(`post_id`);
ALTER TABLE
    `comments` ADD INDEX `comments_parent_id_index`(`parent_id`);
ALTER TABLE
    `likes` ADD CONSTRAINT `likes_comment_id_foreign` FOREIGN KEY(`comment_id`) REFERENCES `comments`(`id`);
ALTER TABLE
    `posts` ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `comments` ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY(`post_id`) REFERENCES `posts`(`id`);
ALTER TABLE
    `comments` ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY(`parent_id`) REFERENCES `comments`(`id`);
ALTER TABLE
    `likes` ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);