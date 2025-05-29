<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Installation Cowork-api (requires docker installed)

1. Clone the repository
```bash 
    git clone https://github.com/hectordev-uy/cowork-api.git
```     

2. Go to the project folder 
```bash 
    cd cowork-api    
```

3. Run the docker-compose
```bash 
    docker compose up -d --build
```	

4. Go to the docker container
```bash 
    docker exec -it laravel_app bash
```	

5. Install the dependencies
```bash 
    composer install
    exit
```	

6. Create the environment file
```bash 
    cp .env.example .env
```	

7. Configure the database environment file
```bash 
    DB_CONNECTION=mariadb
    DB_HOST=mariadb
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=laravel_user
    DB_PASSWORD=secret
```

8. Create the database
```bash 
    docker exec -it laravel_app bash
    php artisan migrate --seed
```	
