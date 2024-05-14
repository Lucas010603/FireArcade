# about
FireArcace was the second practice exam that I made with two ther students in order to practice for my MBO exam.
This porject is a web application that helps a fictional compony called FireArcade to register and manage clients, products and repair requests comming from customers.

# installation

### software requirements:
- npm (8.19.2)
- composer (2.7.1)
- php (8.2.17)
- local server (for database)

To run this project in development mode you must first clone the github repo: 

`https://github.com/FireArcade/FireArcade.git `

Now you can configure your database by configuring the .env

example (actual values may varry depending on your setup):
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fire_arcade
DB_USERNAME=root
DB_PASSWORD=
```

to install the required packages for both the front and backend you can run the following commands: 

```
#backend dependencies
composer install

#frontend dependencies
npm install
```

to seed the database you can run the following command

```powershell
php artisan migrate:fresh --seed
```

next up you can run the following commands to start a development server

```powershell
php artisan serve

#in a new powershell terminal:
npm run dev

```
