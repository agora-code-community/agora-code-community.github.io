Notes 
=========

This document contains setup instructions for the agora code community website on your local device for development purposes.

Requirements
=============

Server-Side      	    

PHP >= 5            
MySQL >= 4          

Client-Side

Enabled JavaScript
Enabled Cookies


Prerequisites 
=============

Things you need to have to get it up and running..

- Working copy of xxamp or wamp installed and running on your device

- Once installed make sure to have the apache and mysql services running

- Copy the contents of this document to the htdocs folder, The path to the index file of your local copy should look like this 
  

Installation
============

Use a Proper Text Editor!
In order to edit PHP files you will need a good text editor. You should not use Windows notepad, wordpad, or Microsoft Word to edit PHP files. These programs will add something called a byte-order-mark (BOM) to the files and this may prevent site from functioning properly. We recommend using Notepad ++ ( http://notepad-plus-plus.org ) for editing all files. It also has the benefit of color-coding your files so you can edit them more easily.
If you get an error message like "Cannot modify header information - headers already sent" it is likely because you have used one of the above programs to edit files.


**Configuration of database:**

The first and most important thing you need to do is tell the site how to connect to your database. This, and all core settings must be located inside the file functions/configuration.php. 
You need to edit this file. 
The configuration settings file can be found in functions/configuration.php that shipped with the site.

Fill out at the following four fields in the file:

Make sure you have the following database information:

your_database_hostname
your_database_username
your_database_password
your_database_name

and fill in accordingly in the functions/configuration.php file....

//Connect database
$dbconn = mysqli_connect('*host-name*','*username*','*password*','*database-name*');
if(!$dbconn){
    echo "error connecting to database";
}

Sufficed to say you need this information. Talk to your hosting provider if you don't know.

**Creating Database Tables**

To install it manually using PHPMyAdmin or a similar tool, copy the contents of the agora.sql file and run it as a query or import the agora.sql file in the phpmyadmin tool.

