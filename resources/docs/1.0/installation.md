# Installation

---

- [Linux](#section-1)
- [Windows](#section-2)
- [MacOS](#section-3)

<a name="section-1"></a>
## Linux 

### A. Ubuntu (Debian Based Linux Distro)

1. install git on your local machine with this command,

    a. update your repo local machine with
    
    ```$xslt
    sudo apt-get update
    ```
    b. and install git with
    
    ```$xslt
    sudo apt-get install git
    ```
2. and install php with extension 
    
    ```$xslt
    sudo apt-get install php7.1 php7.1-bcmath php7.1-mbstring php7.1-xml php7.1-pgsql 
    ```
3. and install postgresql 
    ```$xslt
    sudo apt install postgresql postgresql-contrib 
    ```
4. and next install composer globally, composer is package manager for php.
    ```$xslt
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ```
    ```$xslt
    php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" 
    ```
    ```$xslt
    sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
    ```
    
5. after all requirement has been installed on your machine, next thing is clone the repo with
    ```$xslt
    git clone URL_REPOSITORY
    ```
6. go to directory project with 
    ```$xslt
    cd/name_folder_where_you_clone_the_repo/
    ```
7. on the inside project directory install package with
    ```$xslt
    composer install
    ```
8. make environtment from existing example file with
    ```$xslt
    cp .env.example .env
    ```
9. and generate key laravel
    ```$xslt
    php artisan key:generate
    ```
10. adding new database on postgres and add the value userdatabase and the password on the .env file
    
11. 
    ```$xslt
    php artisan passport:install
    ```
