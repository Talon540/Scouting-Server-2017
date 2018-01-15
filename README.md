# Scouting-Server-2017
## Introduction

These files were part of the LAMP stack used for scouting other teams' robots during the 2017 FIRST Steamworks Competition. The server was hosted off of Cloud9 IDE (Now Cloud9 AWS) running an Apache HTTP server. The server collected data from an html form; this data was then transferred to a PHP script which parsed this data into a MySQL database.

## Setup
1. Create a Cloud9 AWS account
2. Create a public workspace
3. Upload these files to the workspace
4. Run the following commands to update the workspace: 'sudo apt-get update' and 'sudo apt-get upgrade'
5. Install Apache, MySQL, and PHP utils with the following command: 'sudo apt-get install apache2 mysql-server php-mysql'
6. Set a password for your user in MySQL
7. Import scout.sql using the following command in the command line: mysql scout < scout.sql
8. Run alpha.html

## Functions
There are four main pages that are hosted by the server
 - Data Collection (Main page)
 - File Download (Outputs raw data and averages data in .csv format)
 - Specialized Data Sorter (Sort teams by who scored most in what category of the competition)
 - Phone Data Table (Concise data table for viewing on a mobile phone)
