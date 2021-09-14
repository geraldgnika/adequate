<div class="center-main">
	<div class="d-flex w-fit m-auto pb-4 pr-4">
		<h1 class="ml-4 adequateLogo">Documentation</h1>
    </div>
    <div class="jumbotron">
      <div class="col-md-10 mx-auto">
        <p>
            The project structure is divided as below:
            <br><br>
            <b>app:</b> The ‘heart’ of the application live in this directory. This directory is autoloaded by the vendor\Router class, using its routing methods. All your Controllers and Models can be found here. Also here you can find some Helper files, Asset file callers, Form builders and CSRF Token generators.
            <br><br>
            <b>configurations:</b> Contains all of your application’s configuration files.
            <br><br>
            <b>database:</b> Contains your database .sql files, which will be imported into your DBMS.
            <br><br>
            <b>lang:</b> Here you can place your language files for providing multi-language functionality in your system. Also here you can find some global variables which hold the error texts.
            <br><br>
            <b>libs:</b> One of the main features of this framework is the Packaging System. If you want to import external packages into your system without having to deal with all the messiness, you can place them all in one folder and we will do all the work for you. A class implementing Façade structural pattern, has all the methods you need to connect your library and use your library's functions throughout the system. It will instantiate all the classes in your package and you can access their instances statically.
            <b>logs:</b> All your errors are dumped in log files here, while your site is up and running.
            <br><br>
            <b>public:</b> Contains all your assets such as CSS files, JS files and images.
            <br><br>
            <b>resources:</b> All your views are placed here. They are contained inside a folder and have a custom JS file coming with them.
            <br><br>
            <b>storage:</b> It is the folder which holds all the user uploads.
            <br><br>
            <b>utilities:</b> Inside you can find some utilities like ExternalSecurity which handles some security aspects like global variables security and error reporting system. There is also a FormValidator file which is responsible for validating your form inputs and a Middleware file which restricts users from accessing forbidden directories through the URL.
            <br><br>
            <b>vendor:</b> This is the most important folder of the project. This is the heart of the project that does all the routing and stuff. Inside are found a BaseController, BaseModel, BaseView, Database file to connect to the database and implement CRUD functions implementing from the CRUDInterface interface. The Encrypt file to encrypt passwords before storing them to the database. Session file that provides functions to manage sessions. A GetComponent class to render views and connect with model files, and the last, but not the least, a Router file. This file does all the routing and moving through directories passed as parameters in the URL.
            <br><br>
            Outside all the directories are the .htaccess file which restricts URL navigation, a php.ini file which disables all error reports, index.php which is the first one to open and does all the autoloading of the classes, Readme.md which explains the system briefly and testAccounts which holds some test accounts created initially, todo file which holds all the plans for the future and php.ini file which does an advanced handling of the errors.
            <br><br>
            Briefly, your whole job is to build components for you project.
            You just create a controller which is of the form
            <b>{Name}Controller</b>, you create a model of the form <b>{Name}</b>.
            Then you create a folder with the lowercase name of the <b>{Name}</b> and an <b>index.php</b> file inside.
            You can also create a <b>{js}</b> folder and <b>{index.js}</b> file inside to write
            a JS for this view. Then all you have to do is to define your own custom functions.
            Along this proccess you can use our static methods for building forms,
            importing asset files, building queries, our globals and packaging system.
            <br><br><br>
            <b>Building websites made easier... Good luck!</b>
        </p>
      </div>
    </div>
</div>