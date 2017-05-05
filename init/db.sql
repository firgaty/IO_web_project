-- Table posts
CREATE TABLE `IO2_web_project`.`posts` ( `id` INT NOT NULL AUTO_INCREMENT , `thread_id` INT NOT NULL , `user_id` INT NOT NULL , `text` TEXT NOT NULL , `answer_post_id` INT NULL DEFAULT NULL , `date_sent` DATE NOT NULL , `up_votes` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
