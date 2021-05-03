#Contact form application

This is a simple contact me form application where visitors can send me message and also have option of sending file like pdf.

Setup

`git clone https://github.com/rapulu/contact-form.git`

Chang directory to contact-form
`cd contact-form`

Copy the content of .env.example to .env
`cp .env.examp .env`

Set the application key
`php artisan key:gen`
 
Run the database migrations 
`php artisan migrate`

Serve the application on the PHP development server
`php artisan serve`

Run the command below to start processing jobs on the queue as a daemon
`php artisan queue:work`

