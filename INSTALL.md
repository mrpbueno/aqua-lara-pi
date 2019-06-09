# aqua-lara-pi


- sudo apt-get update
- sudo apt-get upgrade
- sudo apt-get install apache2
- sudo apt-get install mariadb-server mariadb-client
- sudo apt-get install php7.0-common php7.0-cli php7.0-gd php7.0-mysql php7.0-curl php7.0-intl php7.0-mbstring php7.0-bcmath php7.0-imap php7.0-xml php7.0-zip
- sudo apt-get install libapache2-mod-php7.0
- sudo apt-get install composer
- sudo apt-get install fswebcam ffmpeg
- sudo apt install python-pip
- sudo pip install psutil
- sudo pip install Adafruit_DHT
- sudo pip install hcsr04sensor
- Instalar pi-blaster https://github.com/sarfata/pi-blaster/

- crontab -e * * * * * php /var/www/aqua-lara-pi/artisan schedule:run >> /dev/null 2>&1