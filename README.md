# WampMono: A Light Manager for WampServer
> A minimalist dashboard for WampServer. Fast, elegant, and multilingual.

WampMono is a lightweight manager designed to enhance your [WampServer](https://www.wampserver.com/) experience. It simplifies localhost development with an intuitive interface and seamless virtual host management.
[WampServer](https://www.wampserver.com/) is an iconic Windows dev tool. It’s simple, lightweight and still powering localhost projects.

👉 [Live Demo](https://lab.crc.studio/tool/wampmono/demo/)


![Wampmono](https://github.com/user-attachments/assets/2e82ac8b-ad9c-407a-bfd9-eea908a5ffab)

## 📚 Table of Contents
1. [Introduction](#wampmono-a-light-manager-for-wampserver)
2. [Features](#features)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Multilingual Support](#multilingual-support)
6. [Contributing](#contributing)
7. [About ToolToys™ and crc.studio](#about-tooltoys-and-crcstudio)


## Features

WampMono provides several useful features to enhance your local development environment:

- Simplified Vhost Management
- Instant Vhost Search
- Quick Login Links
- Git-aware
- Dark / Light Theme
- Custom Tools Panel
- Update Checker
- Multilingual Support

👉 [Read More](https://lab.crc.studio/tooltoys/wampmono)

## Installation

1. **Create a Virtual Host**:
   Add the following configuration to your WampServer's virtual hosts file (usually located at `wamp/bin/apache/apache2.x.x/conf/extra/httpd-vhosts.conf`):

   ```apache
   <VirtualHost *:80>
       ServerName wampmono.lcl
       DocumentRoot "C:/wamp64/www/wampmono.lcl"
       <Directory "C:/wamp64/www/wampmono.lcl/">
           Options Indexes FollowSymLinks MultiViews
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

2. **Modify the `index.php` File**:
   Update the `index.php` file in your WampServer root directory (typically `C:/wamp64/www/`) with the following lines at the top:

   ```php
   // Redirects to WampMono, a light Manager for WampServer
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
- To view the standard WampServer homepage, add `?wampmono=no` to the URL, like `http://localhost/?wampmono=no`.

## Multilingual Support

WampMono is available in:
- 🇬🇧 English
- 🇫🇷 Français
- 🇯🇵 日本語

Want to help translate WampMono into another language?  
It’s easy: contact us and we’ll guide you through the process.

## Contributing

We welcome feedback, ideas, and language contributions.  
If you’d like to improve WampMono or add a new translation, feel free to reach out.

## About ToolToys™ and crc.studio

WampMono is one of [crc.studio](https://crc.studio/)’s ToolToys™, small web apps designed to make design and development faster, easier, and more joyful.

[crc.studio](https://crc.studio/) is a design & development studio founded in 2019 by Yoko Homareda and Rémi B. Loizeau. Based in France, we collaborate with artists and designers worldwide to design timeless visual identities, websites, posters, books, packaging, and merchandise. Our work explores the intersections of print and digital, tradition and innovation, guided by a strong sense of composition, materiality, and code.