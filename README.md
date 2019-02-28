# LAP-Server

A simple LAP (Linux+Apache2+PHP) server without M (Mysql).

### Dependency

- apache2
- php

### Installation

In Ubuntu:

1. Install apache2 and php: `sudo apt install apache2 libapache2-mod-php`

2. clone this repo to some $dir

3. change apache2 config's root directory to this $dir, e.g. 

   ```bash
   cd /etc/apache2
   vim apache2.conf
   # change "/var/www/html" to $dir, and remove "Indexes" to disable directly access to subdir
   vim sites-available/000-default.conf
   # change "/var/www/html" to $dir
   vim sites-available/default-ssl.conf
   # change "/var/www/html" to $dir
   ```

4. change php's config to enlarge file size's limitation, e.g.

   ```bash
   cd /etc/php/7.2/apache2/
   vim php.ini
   # change max_execution_time, max_input_time, memory_limit, post_max_size, upload_max_filesize, and default_socket_timeout
   ```

5. restart apache2 service: `service apache2 restart`

### Usage

Open your browser and look at `http://localhost`

### Features

1. Transfer files within LAN: `http://localhost/files.php`
2. A simple pastebin: `http://localhost/pastebin.php`
