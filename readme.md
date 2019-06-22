# Smart Home Hub

This is a repository used as hub in custom smart home system. It requires raspberry pi zero with php 7.1+ and apache server.


### Installation

1. install apache using `sudo apt-get install apache2`
2. install php using `sudo apt-get install php libapache2-mod-php`
3. clone this repository to `var/www/html`
4. run `php composer.phar install`
5. copy `.env-sample` into `.env` and change it's content for your purposes 

You also need to edit sudoers file and grant sudo access without password to `gpio-controller` file. You can do this in following steps:
1. Type in terminal `sudo visudo`
2. At the bottom add `www-data ALL=NOPASSWD:path_to_gpio_controller_file/gpio-controller`

This will allow www-data user to run gpio-controller file as sudo without typing the password.


### Endpoints

url: `/` <br>
method: `GET` <br>
params: `pin` <br>
This will return current state of the pin passed as param. `1 = ON, 0 = OFF`


url: `/` <br>
method: `POST` <br>
params: `pin, action` <br>
This will change state of pin passed in params based on action. There are 2 accepted actions: `TURN_ON` and `TURN_OFF`


### Logs
By specifying `LOGS=1` in `.env` file you can determine if you want to output logs into `logs` directory. `logs/logs.log` is a default log file and will be always contain logs from all files. 