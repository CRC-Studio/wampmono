# WampMono: A Light Manager for WampServer

WampMono is a lightweight manager designed to enhance your WampServer experience. Created by **CRC Studio**, a design and development studio, WampMono simplifies local development by offering an easy-to-use interface and seamless management of virtual hosts.

---

## Features
- **Automatic Virtual Host Creation**: Adds a virtual host `wampmono.lcl` for streamlined access.
- **Customizable Redirection**: Automatically redirects to WampMono, with an option to display the standard WampServer homepage using a query string.
- **Lightweight Design**: Minimalistic and efficient, focused on usability.

---

## Installation

1. **Create a Virtual Host**:
   Add the following configuration to your WampServer's virtual hosts file (usually located at `wamp/bin/apache/apache2.x.x/conf/extra/httpd-vhosts.conf`):

   ```apache
   <VirtualHost *:80>
       ServerName wampmono.lcl
       DocumentRoot "C:/wamp64/www/wampmono"
       <Directory "C:/wamp64/www/wampmono">
           Options Indexes FollowSymLinks MultiViews
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

2. **Modify the `index.php` File**:
   Update the `index.php` file in your WampServer root directory (typically `C:/wamp64/www/`) with the following lines at the top:

   ```php
   // Redirects to MonoWamp™, a light Manager for WampServer
   // by CRC Studio: A design & development studio
   if (!isset($_GET['skin']) || $_GET['skin'] !== 'origine') {
       header("Location: http://wampmono.lcl/");
       exit;
   }
   ```

3. **Restart Apache**:
   Restart your WampServer's Apache service to apply the changes.

---

## Usage

- Access the WampMono Manager by visiting [http://wampmono.lcl/](http://wampmono.lcl/) in your browser.
- To view the standard WampServer homepage, add `?skin=origine` to the URL (e.g., `http://localhost/index.php?skin=origine`).

---

## About CRC Studio

**CRC Studio** is a creative design and development studio specializing in web solutions and user-centric tools. Learn more at [crc.studio](https://crc.studio/).

