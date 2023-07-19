
# SEA Cinema

This cinema webapp project is a requirement for joining [COMPFEST's Software Engineering Academy](https://www.compfest.id/academy/sea). I used [Codeigniter 4](codeigniter.com) because it's  lightweight, simple, and easy to use. I also used [000webhost](000webhost.com) as the deployment site because it's free


## How to preview/run?
You can preview it [here](http://rizalandit.000webhostapp.com/).
Or, you can install the source code and follow the user guide [here](#run-locally) (For more information, you can check the [documentation](https://codeigniter4.github.io/userguide/))


## Features

- See curently playing movies
- Search any movies
- Registration and login
- Authorization
- Top up and withdraw balance
- Order up to 6 tickets
- Cancel and refund
- Edit your account information


## Run Locally

Clone the project
```bash
    git clone https://github.com/RizalAnditama/sea-cinema
```

Install composer
```bash
    apt install Composer
```

Go to the project directory
```bash
    cd sea-cinema
```

*Create database, run migration and seed
```bash
    php spark db:create sea-cinema
    php spark db:seed film
    php spark migrate
```
*note : Please check your username and password in app/Config/database.php (the default is username:'root' and password:'')*

Start the server
```bash
    php spark serve
```


## Server requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) for MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) for HTTP\CURLRequest library
