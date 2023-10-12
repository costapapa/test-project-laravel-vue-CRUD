# Installation Instructions

Download and install [Laravel Herd](https://herd.laravel.com)

**Clone the Repository**
```bash
    git clone git@bitbucket.org:newskillsacademy/boilerplate.git [app_name]
    cd [app_name]
```

- Clone to ~/Herd or link a new site from within the project directory by running:
```bash
herd link
```

**Install Dependencies**
```bash
    composer install
```

**Copy .env**
```bash
    cp .env.example .env
```

Update APP_URL to http://[app_name].test or leave as http://boilerplate.test if a name was not set.

**Generate App Key**
```bash
    php artisan key:generate
```

**Run Migrations**
```bash
    php artisan migrate
```

**Build Frontend Components**
```bash
    npm run dev
```

Access the application by visiting [app_name].test
