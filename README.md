
## About App

This is a simple CRUD Contact store app, using Laravel, Vuejs, Axios and sqlite to store data. i don't recommend using sqlite if you want to scale this:


## Laravel and Vuejs installation

- [git clone rep]
- [cd public]
- [Run artisan composer update]
- [Run artisan key:generate]
- [Run artisan migrate
- [Run npm i]
- [Run npm run dev]
- [Run artisan serve]
- Default [Localhost](127.0.0.1:8000).

## Setup localhost domain

- [go to drive:\xampp\apache\conf\extra\httpd-vhosts.conf]
- [Add following]
- [<VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs\Contactstore\public"
    ServerName contactstore.tut
</VirtualHost>]

- [Saven and Close httpd-vhosts.conf]
- [Open run notepad on administrator]
- [open on notepad (C:\Windows\System32\drivers\etc\hosts)]
- [Add the following at the end]
- [127.0.0.1 localhost
  127.0.0.1 contacts.loc]   

## Happy Coding
