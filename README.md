# BTCheckIn
Automatically detects when users come and go from an office environment. Developed for hackGSU.

# How It Works

* A MySQL database on the Pi holds a bluetooth ID and name for each person and indicates whether they are currently present or not.
* A python 2.7 script loops on the Pi surveying to see if the users from the MySQL database are present, and updates the database when they enter or leave the bluetooth coverage area.
* A local Apache server runs on the Pi and serves a php based website that reads from the MySQL database to display which users are currently present.

# Hardware

* Hardware consists of a Raspberry Pi with a USB Bluetooth dongle connected to a local network. 

# Sample Web Portal Images
![Sample image of website](https://raw.githubusercontent.com/KevinAiken/BTCheckIn/master/sampImage2.png)
* This is with no employees currently present.




![Another sample image of website](https://raw.githubusercontent.com/KevinAiken/BTCheckIn/master/sampImage1.png)
* This is with one employee, Nishant, present. Whether or not the employee is present is pulled directly from the MySQL database.
