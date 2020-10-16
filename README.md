# urlShortner
A URL shortner created using Laravel and React Js for frontend scaffolding. The short url are a random 10 length strings.

# Pull or clone this build via a git pull url or download this repo.

run the following sequentially commands after the pull.
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
