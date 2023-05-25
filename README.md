# Bedrock + Sage (Blade) WordPress Local Development Environment on Windows with Docker & Docker Compose

Links:

1. Docker https://docs.docker.com/get-docker/ | https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04
2. WSL Setup https://learn.microsoft.com/de-de/windows/wsl/install | https://learn.microsoft.com/de-de/windows/wsl/about
3. PHP [ Extentions | Composer ] https://www.digitalocean.com/community/tutorials/how-to-install-php-8-1-and-set-up-a-local-development-environment-on-ubuntu-22-04
4. PHP-Zip https://www.digitalocean.com/community/tutorials/install-7zip-ubuntu

Setting up WSL:

1. start Ubuntu bash / sh (or whatever linux dispo you've picked)
2. `sudo apt-get install`
3. Install php 8.1
4. Install composer
5. Install nodeJs 16.0 +
6. Install php-zp
7. Install 7z-zip 
8. Install Docker (or via WSL extention)

Setting up the local Docker Env:

1. Create your project folder (for example: `ykk-template` or `y-world`)
2. Download the files or clone the repo to your project folder
3. [OPTIONAL] Replace the 'env-files/.env.localdev' database variables and the 'WP_HOME'
4. [OPTIONAL] Replace the 'server-conf/nginx/nginx.conf' server_name with the same name you used on WP_HOME (without 'http://')
5. [OPTIONAL] Replace all the containers' names, and database variables in the docker-compose.yml file
6. Use your terminal to `cd` into your cloned project folder and run the command `docker-compose up -d`
7. Open the Docker Desktop UI to check all 4 containers are mounted and running
8. Run `./wp-app/bedrock/composer install` or `cd` into `/wp-app/bedrock/` and run `composer install` from there. 
9. Edit your computer hosts file to add your new project server name so it will map to your application. The hosts file is a simple text file that contains any hostnames or domain names used in your local system. At the bottom of this file you should add the following lines:

   ```
   127.0.0.1 ykk-template.local 
   127.0.0.1 www.ykk-template.local 
   ```

   You will find it under 'C:\Windows\System32\drivers\etc' on Windows (open as administrator).
   './etc/hosts' on mac & linux.

10. Now you can use any browser to access your application using http://ykk-template.local/. As the hostname is set up in your system and hosted in your system (inside a docker container) it is not published on the internet. Only your machine/system will be able to access this url.
11. To access the website go to: http://ykk-template.local
12. To access the WordPress admin got to: http://ykk-template.local/wp/wp-admin
13. To access the PHPMyAdmin go to: http://ykk-template.local:8080

To activate the y-design theme:
1. Run `sudo chmod -R goa=rwx /path/to/directory`
2. Run `./wp-app/bedrock/web/app/themes/y-design/composer install` or `cd` into `/wp-app/bedrock/web/app/themes/y-design/` and run `composer install` from there. 
3. Run `./wp-app/bedrock/web/app/themes/y-design/npm install` or `cd` into `/wp-app/bedrock/web/app/themes/y-design/` and run `npm install` from there. 
4. Within `/wp-app/bedrock/web/app/themes/y-design/` run `npm run dev` and open the hyperlink for localhost:3000. 

## Containers/Services

The docker-compose.yml file will mount 4 containers/services:

- DB (database)
- PHP (PHP 8.1)
- NGinx (server)
- PHPMyAdmin (for managing the database)