1) download and unzip

2) rename server/connection-sample.php to connection.php

3) add your mysql connection details

4) rename fragments/login-sample.php to fragments/login.php

Here's the mysql I used to create a 'users' table if you need it:

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=520 DEFAULT CHARSET=latin1;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=520;
