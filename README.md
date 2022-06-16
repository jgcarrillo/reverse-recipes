![image](docs/images/cover.JPG)

<div align="center">
    <b>🍕🍔🍟 Reverse recipes. A basic web app to manage a database of recipes 🍕🍔🍟</b>
</div>

## Table of contents 👇

- [✨ How to install](#-how-to-install)
- [🚀 Git Workflow](#-git-workflow)
- [🕸️ How to contribute](#-how-to-contribute)
- [🚩 Cheatsheet](#-cheatsheet)
- [🔒 Database](#-database)
- [🔥 Production mode](#-production-mode)
- [🌎 Test the app in your phone](#-test-the-app-in-your-phone)
- [🔧 PHP GD library](#-php-gd-library)
- [📧 Email verification](#-email-verification)
- [🎢 Deploymment](#-deployment)
- [😖 Throubleshooting with deployment](#-throubleshooting-with-deployment)
- [💣 Graphical access to Heroku Database](#-graphical-access-to-heroku-database)

## ✨ How to install

1. `Git clone`.
2. Execute `npm install and composer install`.
3. Copy *.env.example* file to *.env* on the root folder.
4. Change database name to `laravel_vue_reverse_recipes`.
5. Create a file `.env` in the root and copy the content of `.env.example` inside it.
6. Run `php artisan key:generate`. 
7. Run `php artisan migrate`.
8. Run `php artisan serve`.

To run scripts from package.json when files change (TailwindCSS) execute `npm run watch` in another terminal. **Don't close it.**

### 🚀 Git Workflow

- **Main branch**: this branch includes the last version of the web (production).
- **Develop branch**: this branch has all the changes waiting to be merged into the *main branch*.
- **Feature branch**: new feature until it is complete.

## 🕸️ How to contribute

If you want to make changes into the project, do the following:

1. Create a new feature branch, for example, `feature/create-navbar`.
2. Make changes and test them.
3. If everything is correct, commit those changes and push to Github.
4. Switch to the `develop` branch and merge those changes. For example, `git checkout develop`, to switch to develop branch, and then `git merge feature/create-navbar`.
5. Test everything and, if it's ok, commit and push to GitHub.
6. Once several changes have been made to the `develop branch` it's time to merge with `main` to create stable version of the project. `git checkout main` and `git merge develop`. Then `git push`.
7. Delete the feature branch `git branch -d feature/create-navbar`.

## 🚩 Cheatsheet

- Show branches: `git branch`
- Create branch: `git branch <branch>`
- Create branch and switch: `git checkout -b <branch>`
- Switch to another branch: `git checkout <branch>`
- Delete branch: `git branch -d <branch>`
- Push branch to Github: `git push --set-upstream origin <branch>`
- Delete remote branch: `git push origin -d <branch>`
- Update remote branches: `git remote update origin --prune`
- Create tag: `git tag v0.1.0`
- List tags: `git tag -l`
- Push tag to Github: `git push origin <tag>`

To create the **storage link** you need to type `php artisan storage:link` and then change the current `APP_URL` inside `.env` file to `APP_URL=http://localhost:8000` or whatever you use.

## 🔒 Database

In order to create database you need to run `php artisan migrate`. After that, execute `php artisan db:seed`. Make sure you only execute that last command **once**.

## 🔥 Production mode 

To test the app in production mode set those variables in `.env` file:
```env
APP_ENV=production
APP_DEBUG=false
```

Restart the server to apply the changes.

## 🌎 Test the app in your phone

Run a local serve with: `php artisan serve --host [YOUR IP] --port 8000`. Now, you will be able to access from *http://[YOUR IP]:8000*.

## 🔧 PHP GD Library

If you are a Windows user, and you are using XAMPP, in order to see the images when you export a recipe as PDF you need to go to your *PHP folder* inside XAMPP, open `php.ini` and uncomment the option `;extension=gd`.

The set the GD extension available also in deployment, you need to add it into the `composer.json` file.

```json
{
    "require": {
        "ext-gd": "*"
    }
}
```

Then, run a `composer update` command.

## 📧 Email verification

**DEPRECATED**

⚠️ Since May 2022 Google doesn't allow you to access third-party apps, so you can't set up *email verification* using Google Services. You need to use another provider such as Mailtrap. ⚠️

The proper configuration is similar to this:

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<Your Mailtrap username>
MAIL_PASSWORD=<Your Mailtrap password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="<Your custom address>"
MAIL_FROM_NAME="${APP_NAME}"
```

You need to configure your `.env` file with something like this (if you are using Gmail):

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<Enter your Gmail address>
MAIL_PASSWORD=<Enter your Gmail password>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="<Enter your custom address>"
MAIL_FROM_NAME="${APP_NAME}"
```

In Gmail configuration, you need to activate the `Less secure app access` option.

## 🎢 Deployment

Add the project to Heroku using the Heroku CLI or by connecting the project to GitHub. Follow the steps shown in Heroku documentation. For a Laravel/Vue project do:

1. Create `Procfile` for Laravel with `web: vendor/bin/heroku-php-apache2 public/` inside of it. See [documentation](https://devcenter.heroku.com/articles/getting-started-with-laravel) for more info.
2. Add Node JS buildpack using Heroku interface or running in Heroku CLI this command: `heroku buildpacks:add heroku/nodejs`.
3. Go inside console in Activity > Open app > Run console and execute the `Heroku run bash`. Then do a `php artisan key:generate --show`.
4. Add database plugin, in this case, **ClearDB**. Probably you will need to add a credit card (but it's free).
5. Add variables without **double quotes**.

| Variable name     | Value                        |
|-------------------|------------------------------|
| APP_NAME          | Reverse Recipes              |
| APP_ENV           | production                   |
| APP_DEBUG         | true                         |
| APP_KEY           | the key of step 2 (base:...) |
| DATABASE_URL      | your cleardb url             |
| MAIL_MAILER       | smtp                         |
| MAIL_HOST         | smtp.mailtrap.io             |
| MAIL_PORT         | 2525                         |
| MAIL_USERNAME     | your username                |
| MAIL_PASSWORD     | your password                |
| MAIL_ENCRYPTION   | tls                          |
| MAIL_FROM_ADDRESS | your custom address          |
| MAIL_FROM_NAME    | your app name                |

5. In the Heroku console (see step 2) run `heroku run php artisan migrate`, `heroku run php artisan db:seed` and `heroku run php artisan storage:link`.

## 😖 Throubleshooting with deployment

### Add HTTPS

In  `app/Provides/AppServiceProvider.php` add:

```php
use Illuminate\Support\Facades\URL;

public function boot()
{
    if(env('APP_ENV') !== 'local') {
        URL::forceScheme('https');
    }
}
```

### Post script

In `packaje.json` add:

```json
{
    "scripts": {
        "postinstall": "npm run production"
    }
}
```

### Allow proxies

In `app/Http/Middleware/TrustProxies.php` add:

```php
protected $proxies = '*';

protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
```

See [documentation](https://laravel.com/docs/5.7/requests#configuring-trusted-proxies) for more information at the end of the post.

### Storage

Heroku doesn't persist images in storage folder due to [documentation](https://help.heroku.com/K1PPS2WM/why-are-my-file-uploads-missing-deleted-from-the-application), so you will need to set up, for example, an Amazon S3 service to storage files.

### Secure assets

I'm not sure if this is mandatory, but we added the `secure_asset()` function in `app.blade.php` as follows. Probably it's necessary to add in `styles` and `scripts` too.

```php
<link rel="icon" type="image/x-icon" {{ secure_asset('./favicon.ico') }}>
```

## 💣 Graphical access to Heroku database

In order to use a graphical database interface (such as Heidi SQL) you need to run `heroku config --app=YOURAPPNAME` inside your project, then use the data in the `DATABASE_URL` variable as following to connect with Heidi SQL. This configuration was tested using **ClearDB** plugin inside Heroku.

`mysql://<username>:<password>@<host>/<database>?reconnect=true`

| Name       | Value        |
|------------|--------------|
| Host name  | `<host>`     |
| User       | `<user>`     |
| Password   | `<password>` |
| Port       | 3306         |
| Database   | `<database>` |
