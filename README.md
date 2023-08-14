# Customer_Billing_System

This repository contains a simple Billing System with PHP and HTML components for managing customer payments. The system allows users to add, edit, delete, and view payment records in a database. The system's functionality is divided into distinct programs, each serving a specific purpose.

Programs and Files:

**Addition Program:**

Files:

custadd.html
custadd.php
The custadd.html file is the client-side application responsible for collecting customer information, including customer number, code, and units. It performs client-side validation to ensure data accuracy.

The custadd.php file is the server-side script that receives the validated inputs from the client page. It performs server-side validation, checks if the customer number already exists in the database, calculates the total payment based on units and customer code, and adds the record to the database.

**Edit Program:**

Files:

custedit.html
custedit.php
custedit2.php
The custedit.html file allows users to edit existing payment records. It collects the updated customer information and sends it to the server for processing.

The custedit.php file receives the edited inputs and updates the corresponding payment record in the database.

The custedit2.php file contains additional processing logic if required during editing.

**Deletion Program:**

Files:

custdel.html
custdel.php
The custdel.html file presents a user interface for deleting payment records. It gathers the necessary information and sends it to the server.

The custdel.php file processes the deletion request and removes the specified payment record from the database.

**View Program:**

Files:

custview.html
custview.php
The custview.html file provides a way to view the payment records stored in the database.

The custview.php file retrieves the payment records from the database and presents them to the user.

**Validation Checks:**

Customer Number:

Cannot be blank.
Must be 8 characters long.


Code:

Cannot be blank.
Must be either 'C' (Commercial) or 'D' (Domestic).

Units:

Cannot be blank.
Must be numeric and greater than 0.
Total Payment Calculation:

The total payment is calculated based on the customer code and units:

For Commercial (C) Customers:

Units 1 to 5: Free of charge
Units 6 to 25: 5/- per unit
Units 26 to 50: 10/- per unit
Units 51 to 75: 15/- per unit
Units above 75: 25/- per unit

For Domestic (D) Customers:

Units 1 to 10: Free of charge
Units 11 to 25: 3/- per unit
Units 26 to 50: 6/- per unit
Units 51 to 75: 9/- per unit
Units above 75: 15/- per unit

Usage:

Clone or download this repository to your local machine.
Set up a web server environment with PHP support.
Place the files in the appropriate directory accessible by the web server.
Access the programs through your web browser by navigating to the respective HTML files (e.g., http://localhost/custadd.html).
