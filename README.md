# CloudMQ

The project formed a part of the IOT and the Cloud Computing coursework. The project was built using the Raspberry Pi 3b+ model and an MQ2 gas sensor. The system continuously recorded the sensor data in a MySQL database, which resided in Google Cloud. If the sensor detected smoke, a PHP script sent a notification to the user stating that the smoke is detected. Also, an analysis of the sensor data was portrayed in a web application that showed the graphical representation of the historical sensor data.

Tools and Technologies used in the project:
Raspberry Pi 3b+ Model
MQ2 Gas Sensor
Python Scripts for programming raspberry pi and the mq2 sensor
PHP and MySQL for building the web application (front end and services) and database (for storing user information and sensor values)
Google Cloud for deploying the web application. Also, the database resides at the Google Cloud Compute Engine. 
Javascript for showcasing visual analysis of the collected sensor data.
PHP SMTP for sending notifications to users if the smoke sensors detected smoke.
