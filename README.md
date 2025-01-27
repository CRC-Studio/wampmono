# WampMono: A Light Manager for WampServer

WampMono is a lightweight manager designed to enhance your WampServer experience. Created by **CRC Studio**, a design and development studio, WampMono simplifies local development by offering an easy-to-use interface and seamless management of virtual hosts.

![001](https://github.com/user-attachments/assets/21406d6a-3fcd-4213-b5e3-344730d72fe2)
![002](https://github.com/user-attachments/assets/09ebd364-8d2d-4418-b1a2-80848e2a90ed)


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
   if (!isset($_GET['monowamp']) || $_GET['monowamp'] !== 'no') {
       header("Location: http://wampmono.lcl/");
       exit;
   }
   ```

3. **Restart Apache**:
   Restart your WampServer's Apache service to apply the changes.

---

## Usage

- Access the WampMono Manager by visiting [http://wampmono.lcl/](http://wampmono.lcl/) in your browser.
- To view the standard WampServer homepage, add `?monowamp=no` to the URL (e.g., `http://localhost/?monowamp=no`).

---

## About CRC Studio

[crc.studio](https://crc.studio/) is a design & development studio founded in 2019 by Yoko Homareda and Rémi B. Loizeau. Based in France, we travel all over the world to discover beauty and good ideas. For each project, such as visual identities, websites, posters, books, packaging or merchandise, we enjoy working as a team with other artists and designers.

