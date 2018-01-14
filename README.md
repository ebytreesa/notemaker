# Notemaker
This is a website for making notes using basic HTML5, CSS3, PHP, Jquery, Ajax. 
Data backend uses mysql database.

## Setting up database
The website expects a database named 'notes'.  Database set up can be updated by modifying includes/dbcon.php .
Database diagram is shown below:

![dbdiagram](notes_db_diagram.PNG)
# Website functions

## Users 
 Users can register by filling a simple form. Registered users can create, edit and delete notes. 
 Notes are shown in random colurs. When a note is added it added to the list of notes asynchronously using Ajax.
 
 
![screenshot](screenshot-notes.png)