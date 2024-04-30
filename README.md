# book_review
This is a full-stack website about reviewing books.

## SETUP GUIDE

- INSTALL XAMPP latest version
- CLONE GIT REPOSITORY INSIDE HTDOCS INSIDE XAMPP folder (GO TO VSCODE AND NEW WINDOW)
- Go to phpMyAdmin and create "book_review" database
- Execute the queries one by one from db.sql in SQL tab in phpMyAdmin
- DryRun the website by going to localhost/book_review/index.php
- Change config of Apache
	1. Go to xampp and look for config on Apache
	2. Go to http.conf
	3. Search inside the document xampp the keyword "htdocs"
	4. Change both the file paths below to "C:/xampp/htdocs/book_review" which is the file path of the project
- Create 5 users using the signup page
- Go to localhost/seed to input books into the database
- Test the website and its functionalities.
