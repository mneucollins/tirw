========================
"So Random"
a dynamic short fiction
by Shawn Rider
========================
========================

This package is designed to install as easily as possible.

To install "So Random" on your server, you'll need to be able to run PHP and you'll need a mySQL database. 

Installation is simple:

1) Unzip the archive and upload the "soRandom/" directory.

2) Point your web browser to the directory you just uploaded (http://yourserver.com/soRandom) and follow the instructions.

NOTE: For installation you'll need to make sure the config.php file is writeable, or else consult the instructions below for setting up the config.php file manually.

========================
Manual Installation
========================

To manually install "So Random" on your webserver, follow these steps:

1) Use the .sql file available in install/soRandomSQL.zip to install the table and story data into your database.

2) modify the file config.php to contain your database login information

3) be sure to delete line 4 from config.php:
                                              $freshInstall=1;

==============================
Issues? Get in touch
==============================
Contact Shawn Rider at shawn@shawnrider.com or 703.340.8141