# urlShortner
A URL shortner created using Laravel and React Js for frontend scaffolding. The short url are a random 10 length strings.

### Pull or clone this build via a git pull url or download this repo.

#### Run the following commands sequentially after the pull.
<ul>
  <li> composer install </li>
  <li> Create an .env file in the root directory and copy the contents for .env.example </li>
  <li> php artisan key:generate </li>
  <li> "php artisan migrate" for migrating the database </li>
  <li> "php artisan serve" for serving the app to a local server </li>
  <li> "npm i" for installing node dependencies  </li>
  <li> "npm run dev" for developing to a dev environment </li>
</ul>

Visit the following URL http://127.0.0.1:8000, here a react scafolded app will be shown. From this form you can store any number of records. 
Once created you are redirected towards a table showing its content.

The react app works with an API provided from api.php in the route directory, and the related controller. A post and get request can be used to view and create a record. 
Now for the url to work correctly another url is generated at web.php for redirecting to a correct place.

Sqlite database is located at database directory. For using this database just change the .env DB_CONNECTION variable to sqlite instead of msql.
