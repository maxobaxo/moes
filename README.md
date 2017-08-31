# _Moe's Kombucha_

#### _PHP Group Project, July 27, 2017_

#### By **Nicole Freed, Michelle Poterek, Jacob Ruleaux, Max Scher, Steve Spitz**

## Description

_This is an ecommerce prototype for Moes Kombucha company._

## Specifications

1. Business owner can register as customer of Moe's.
2. Customer can create a new cart (sale).
3. Customer can add products to cart.
4. Customer can checkout to review order and confirm.
5. Customer can view order confirmation.
6. Customer can view list of previous orders.
7. Customer can reorder a previous order.
8. Customer can elect to autoship a given order.

<!-- Customer can login with username and password.
  - Customer login will be authenticated.
Customer can view store locations on a map.-->



## Setup/Installation Requirements

Download and Install MAMP:
* Download the free version of MAMP from the [MAMP Downloads Page](https://www.mamp.info/en/downloads). Both Mac OS X and Windows are available. (You'll need to have version 4.1.0 or higher for Mac and 3.3.0 or higher for Windows).
* Once downloaded, open the file:
    * For Mac: This is a.pkg file.
    * For Windows: This is an .exe file.
* At this point, Mac installation is actually complete.
* Windows users will be prompted with an installation wizard. The default values and settings suggested at each step are just fine (You may specify a different location for your MAMP installation, if you prefer, just remember exactly where it is; we'll need to locate our MAMP installation in the next step).

### Configure Port Numbers:  
_You must configure Apache and MySQL to use the correct port numbers in MAMP._

* Launch your newly-installed MAMP program.
* A popup may appear upon first launch. If so, uncheck the option reading Check for MAMP Pro when starting MAMP (You may upgrade to MAMP Pro later, but the free version meets all requirements for our course) then click Launch MAMP.
* When MAMP launches you will be greeted by a small window with several options. Click Preferences.
![Image of starting servers](web/img/how_to_start_server.png)
* In the Preferences window, select the Ports tab.
* Set the Apache Port to 8888.
* Set the MySQL Port to 8889.
* Click OK to save your new port configurations.

  ![screenshot of port number configuration](web/img/how_to_port_numbers.png)


### Access Project Repository & Open Project
* Open GitHub site on your browser: https://github.com/maxobaxo/moes
* Select the green dropdown menu to clone this repository.
* Copy the link for the GitHub repository.
![screenshot of port number configuration](web/img/git_clone.png)
* Open Terminal on your computer.
* In Terminal, perform the following steps:
    * type 'cd desktop' and press enter
    * type 'git clone' then paste the repository link, and press enter
    * type 'cd moes' to access the path on your computer
    * type 'composer install' in terminal to download dependencies
* In MAMP, perform the following steps:
    * Select the Start Servers option.
    * Go to preferences>web server and click on the folder icon next to 'document root'.
    * Click on 'web' folder of project and hit 'select'.

 ![screenshot of port number configuration](web/img/how_to_document_root.png)

    * Hit ok at the bottom of the preferences window.
* Open a new window in your browser, enter the URL: localhost:8888/phpMyAdmin
    * Choose the Import tab and select the shoes.sql.zip file and click Go.
    * It's important to make sure you're not importing to a database that already exists, so make sure that a database with the name shoes doesn't already exist locally.
* In your browser, enter the url 'localhost:8888' to view the webpage.



## Technologies Used

* PHP
* Composer
* Twig
* Silex
* CSS
* Bootstrap
* SQL
* Apache
* MAMP

### Acknowledgements
_Thanks to Epicodus for providing some of the MAMP installation instructions at learnhowtoprogram.com_  
_The adorable keg drawings are by by Vadim Smolenskiy. Here's a link to his website: https://dribbble.com/shots/1085951-Kegs-and-Bottles-II._

## Support and contact details
_Please feel free to contact me directly via e-mail at poterekm@gmail.com if you have any questions, comments, ideas, or feedback. Also, I invite you to feel empowered to make any changes to this repository by forking it and making changes accordingly._

## Known Bugs
* The program does not allow a user to actually purchase a keg of kombucha, as it is not a secure website.

### License

*This project is under the MIT License*

Copyright (c) 2017 **Nicole Freed, Michelle Poterek, Jacob Ruleaux, Max Scher, Steve Spitz**
