# RESTful API WITH LUMEN
This lumen project for seminar content in UP45 about REST API. This project just using sample data with faker and authentication with JWT. You can config this project with database seeder.
![lumen-logo-API-framework](https://user-images.githubusercontent.com/24487280/71655121-0a3f7100-2d68-11ea-9660-d15ee80c7dfb.png)
<hr><br><br>
<h3>Sample Demo SS</h3>
<a href="https://user-images.githubusercontent.com/24487280/71656739-27c40900-2d6f-11ea-9138-d588af346b80.png"><h4>#Website</h4></a>
https://user-images.githubusercontent.com/24487280/71656739-27c40900-2d6f-11ea-9138-d588af346b80.png
<a href="https://user-images.githubusercontent.com/24487280/71656745-2f83ad80-2d6f-11ea-94b7-cb8260243fa9.png"><h4>#Mobile(Android IOS)</h4></a>
https://user-images.githubusercontent.com/24487280/71656745-2f83ad80-2d6f-11ea-94b7-cb8260243fa9.png
<a href="https://user-images.githubusercontent.com/24487280/71656787-5cd05b80-2d6f-11ea-870f-335620690f46.png"><h4>#Desktop Windows</h4></a>
https://user-images.githubusercontent.com/24487280/71656787-5cd05b80-2d6f-11ea-870f-335620690f46.png
<br><br>
<b>This project using lumen version 6.0.</b><br>
Requirement on your environment:
<ul>
    <li>PHP >= 7.2</li>
    <li>OpenSSL PHP Extension</li>
    <li>PDO PHP Extension</li>
    <li>Mbstring PHP Extension</li>
</ul><br>
<b>If you want to clone this project, do the step below :</b>
<ol type="1">
    <li>Make sure you have installed <a href="https://getcomposer.org/">composer</a></li>
    <li>Clone this project with <br><a href="https://git-scm.com/">git</a>, run the command 
    <code>git clone https://github.com/cokroyongky/lumen_restfull_api.git</code></li>
    <li>Run the command <code>composer install</code></li>
    <li>Rename <b>.env.example</b> file to <b>.env</b></li>
    <li>Create new database in your local with name <code>train_db</code>, or you can change the name if you want, just going to <b>.env</b> file </li>
</ol>
<br>
Make sure your project is connected to the database in .env file, and run <code>php artisan migrate</code>, check your DB now, train table will be create automatic. Then run <code>php artisan db:seed</code> to create record on your tables.
<br><br>
Run <code>php artisan server</code>, and cheers!&#127867;&#127867; , run http://127.0.0.1:8000 on your browser .
<br><br>
Btw, this project already have simple web, desktop and mobile (Android IOS) to use get method /schedule/ .
just run, and make easy to your project!
<br><br>
Thanks to <a href="https://github.com/heri99123">Hery</a> for create desktop apps &#128187;😍
<br><br>
To know route this RESTAPI, just run <code>php artisan route:list</code> , or <a href="https://github.com/cokroyongky/lumen_restful_api/blob/master/route_list.txt"><u>see this file</u></a> Enjoy ! &#127867;&#127867;

<br>
Check your project, app\databases\seeds\DTTransactSeeder, we create 1000 transaction for dummy data 
<br><br><br><br>
Best Regard.

<a href="mailto:cokroyongkyp@gmail.com?Subject=Ask%20About%20LumenRESTAPI" target="_top">Your Friend </a>&#128150;
