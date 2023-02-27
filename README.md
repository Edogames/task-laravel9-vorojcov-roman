<h1>A task created for job applying in "ИП Ворожцов Роман Геннадьевич" on Laravel 9.</h1>
<h2>Project description</h2>
<p>
So, here we have a task project created for company "ИП Ворожцов Роман Геннадьевич", so they can test my knowledge in web programming.
</p>
<h2>Developer notes</h2>
<p>
<ul>
<li>I am bad at authentication, like, a lot, but I am good at handling back-end on getting, editing, creating and deleting data. Also, in task it's included to create php artisan command (or smth like that) to autenticate through command like, which I have heard just now about, and couldn't find any info about it.</li>
<li>I should've create this readme right after I've started, but I've got into coding so much, that I forgot to do it 😅</li>
<li>I should've created some tests buuuuut... there's no need to make some fancy tests, because php (which is being used mainly in Laravel) is a back-end server-side rendering languge, which means that user can't change properties of inputs and etc. and if user does, then he'll get errors and would not be able to create todos.</li>
<li>Task don't have information about what I had to create, so I've created a simple todo list where you select users from selections and assign them a task, which status, by default, is "in progress".</li>
<li>Editing of the task is made right on that exact task after you click "Edit" button, which activated something I call "edit view" and disables what I call "normal view". After you click on another "Edit" button: other edits will be closed.</li>
</ul>
</p>
<h2>How it's intended to start</h2>
<p>
So, as I've created this project on Windows 11, I've tested everything through XAMPP, so, to start, make sure you have composer, to install requirements with command <code>composer install</code> inside root directory of the project. Now, through XAMPP, click on "Config" button in apache server line and select "httpd.conf" from context menu.
<br>
<br>
Now, after you activate/restart XAMPP server with MySQL, click on "Admin" in MySQL line, and create database called "task" (or however the <code>DB_DATABASE</code> value is in <code>.env</code> file).
<br>
<br>
After creating database, open terminal, gitbash, powershell, etc. in root directory, run commands <code>php artisan optimize:clear</code>, which'll clear chache and <code>php artisan migrate:fresh --seed</code>, so you'll have placeholder data in your database.
<br>
<br>
Now you can freely open <code>127.0.0.1</code> in your web browser and start using the website! Create, edit and delete whatever you want! If you are an enthusiast, who wants to use somethin simple llike this one, then feel free to use it, just note who is the real coder of this todo 😉
</p>
