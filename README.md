This is part of the code developed by Team Novice for the Organisations Website

To make a local copy of the database you must:
1)make sure you have a local server running such as xampp(https://www.apachefriends.org/download.html) or wamp (https://bitnami.com/stack/wamp/installer)

2)create your database and name it agora 

3)import the agora.sql file to the selected database and edit the configuration.php in the "//connect database" method to your database setup default should look something like 
      
      $dbconn = mysqli_connect('localhost','root','','agora');

4)your db is setup!! 
