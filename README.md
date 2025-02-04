# WampMono: A Light Manager for WampServer

WampMono is a lightweight manager designed to enhance your [WampServer](https://www.wampserver.com/) experience. Created by [crc.studio](https://crc.studio/), a design and development studio, WampMono simplifies local development by offering an easy-to-use interface and seamless management of virtual hosts.

![Wampmono](https://github.com/user-attachments/assets/2e82ac8b-ad9c-407a-bfd9-eea908a5ffab)

# Table of Contents  
1. [Introduction](#wampmono-a-light-manager-for-wampserver)  
2. [Features](#features)  
3. [Installation](#installation)  
4. [Usage](#usage)  
5. [About CRC Studio](#about-crc-studio)  

## Features

WampMono provides several useful features to enhance your local development environment:

- Virtual Host Management – View and manage all your virtual hosts effortlessly.
- Dark Theme / Light Theme – Customize the interface to your preference.
- Custom Tool Section – Easily manage and access your development tools.
- 🆕 Link to Login – Quickly access your CMS or admin login pages.


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
   // Redirects to WampMono™, a light Manager for WampServer
   // by CRC Studio: A design & development studio
   if (!isset($_GET['wampmono']) || $_GET['wampmono'] !== 'no') {
       header("Location: http://wampmono.lcl/");
       exit;
   }
   ```

3. **Restart Apache**:
   Restart your WampServer's Apache service to apply the changes.


## Usage

- Access the WampMono Manager by visiting [http://wampmono.lcl/](http://wampmono.lcl/) in your browser.
- To view the standard WampServer homepage, add `?wampmono=no` to the URL (e.g., `http://localhost/?wampmono=no`).

## About CRC Studio

[crc.studio](https://crc.studio/) is a design & development studio founded in 2019 by Yoko Homareda and Rémi B. Loizeau. Based in France, we travel all over the world to discover beauty and good ideas. For each project, such as visual identities, websites, posters, books, packaging or merchandise, we enjoy working as a team with other artists and designers.

