## 📄 Description

✨This `#0969DA`<strong>Star Wars - Original Trilogy</strong>`#0969DA` web app is built with PHP and JavaScript. A <i>Search Bar</i> and <i>Sort By</i> functions have been added to optimize data retrieval. There are a public view and a private view where the users can CREATE, READ, UPDATE and DELETE:

##### 🎞️Movies 
##### 👤Characters
##### 🚀Ships
##### 🪐Planets
##### 🌌The Force
##### 🔵Jedis
##### 🔴Siths
##### 👽Alien Races

The UX/UI is designed for the users to always know where everything is##### The layout is simple to navigate and users can locate information very easily.

📱The web app has media queries implemented. Therefore, the user can navigate from any mobile device.


* No frameworks
* Local content
* No AI code 🚫🤖


## 🛢️ Database Connection

- User: <i>mri</i> 
- Password: <i>password</i>
- Host: <i>localhost</i>

🔑 LOGIN Credentials:

- User: <i>admin</i>
- Password: <i>admin</i>


## 📷 Screenshots

### index.php
![Screenshot1](screenshots/Screenshot7.webp)

![Screenshot2](screenshots/Screenshot31.webp)

### about.php

Crawling letters made with JavaScript

![Screenshot2](screenshots/Screenshot9.webp)

### movies.php
![Screenshot2](screenshots/Screenshot10.webp)

### theForce.php
![Screenshot2](screenshots/Screenshot17.webp)

### characters.php

Public view

![Screenshot2](screenshots/Screenshot11.webp)

![Screenshot2](screenshots/Screenshot18.webp)

![Screenshot2](screenshots/Screenshot28.webp)

![Screenshot2](screenshots/Screenshot29.webp)

Private view

![Screenshot2](screenshots/Screenshot8.webp)

![Screenshot2](screenshots/Screenshot12.webp)

![Screenshot2](screenshots/Screenshot14.webp)

### characterUpdate.php
![Screenshot2](screenshots/Screenshot15.webp)

### addPlanet.php
![Screenshot2](screenshots/Screenshot20.webp)

### addJedi.php
![Screenshot2](screenshots/Screenshot13.webp)

### jediUpdate.php
![Screenshot2](screenshots/Screenshot16.webp)

### login.php
![Screenshot3](screenshots/Screenshot19.webp)

### Responsive view

![Screenshot3](screenshots/Screenshot23.webp)

![Screenshot3](screenshots/Screenshot22.webp)

![Screenshot3](screenshots/Screenshot32.webp)

![Screenshot3](screenshots/Screenshot30.webp)

![Screenshot3](screenshots/Screenshot21.webp)

![Screenshot3](screenshots/Screenshot33.webp)

![Screenshot3](screenshots/Screenshot34.webp)

![Screenshot3](screenshots/Screenshot24.webp)

![Screenshot3](screenshots/Screenshot25.webp)

![Screenshot3](screenshots/Screenshot26.webp)

![Screenshot3](screenshots/Screenshot27.webp)



♦️ You will need a local server and import the database to display the website on your browser. 

## 📒 How to run a local server

You can use MAMP or XAMPP as free options:

https://www.mamp.info/en/windows/

https://www.apachefriends.org/

MAMP EXAMPLE (XAMPP works in the same way):

If you followed the default installation parameters, the directory to run the local server should be on this path: 

   C:\MAMP

Steps to start the server:

1. Start the server by running the <strong>MAMP.exe</strong> file. Next, initiate the Apache Server and MySQL Server if they don't do it automatically

2. At the same directory level where MAMP.exe is located, look for the <strong>htdocs</strong> folder and delete it.

3. Replace the removed <strong>htdocs</strong> folder for the one on this project.

4. In your browser, type the following URL: 

   127.0.0.1:80/phpMyAdmin5/

5. Go to home and look for the <strong>User accounts</strong> tab on the top nav bar.

6. Click on <strong>Add user account</strong> and fill it with the following information: 

  - User name: <i>mri</i>
  - Host name: <i>localhost</i>
  - Password: <i>password</i>

7. Below, look for the <strong>global privileges</strong> label and set it to Check all.

8. On the right side nav bar, look for New, and create a database with the same name as the SQL file. 

   In this case:  <i>starwarsdb.sql</i>

9. Once it is done, go to the recently created database. Next, on the top nav bar, look for the <strong>Import</strong> tab.

10. Browse the SQL file on your computer and click on <strong>Go</strong>.

11. The last step is navigating the website. Therefore, type 127.0.0.1:80/ on your browser URL bar.
  




