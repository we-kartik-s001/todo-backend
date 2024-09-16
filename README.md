##Requirements
<ol>
<li>Composer v2.7.7</li>
<li>PHP v8.2.12</li>
<li>MySQL ^v8</li>
</ol>

##Instructions to setup the project
<ol>
<li>Clone the repo</li>
<li>Setup database for your project</li>
<li>Create a .env file for the project by using <br> <code>cp .env .env.example</code> and configure it according to your local</li>
<li>Install all the dependencies <br> <code>composer install</code></li>
<li>Generate application key <br> <code>php artisan key:generate</code></li>
<li>Run the migrations<br><code>php artisan migrate</code></li>
<li>Run the development server<br><code>php artisan serve</code></li>
</ol>
