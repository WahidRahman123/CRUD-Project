# CRUD-Project
This project demonstrates the implementation of basic CRUD (Create, Read, Update, Delete) operations using PHP and MySQL. It serves as a learning resource for beginners and a reference for experienced developers looking to integrate CRUD functionality into their web applications.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Contributing](#contributing)

## Introduction

CRUD operations are fundamental for any web application that interacts with a database. This project showcases how to perform these operations using PHP and MySQL. Each operation is demonstrated with clear, concise code to help you understand the underlying concepts and implementation.

## Features

- **Create**: Add new records to the database.
- **Read**: Retrieve and display records from the database.
- **Update**: Modify existing records in the database.
- **Delete**: Remove records from the database.
- User-friendly interface with basic HTML, CSS and BootStrap Framework.
- Error handling and input validation.

## Requirements

To run this project, you need the following:

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web server (Apache, Nginx, etc.)
- Composer (for dependency management)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/WahidRahman123/CRUD-Project.git
    ```

2. Navigate to the project directory:
    ```bash
    cd CRUD_Project
    ```

3. Create a MySQL database and import the provided SQL file:
    ```sql
    CREATE DATABASE pData;
    USE pData;
    SOURCE pData.sql;
    ```

4. Update the database configuration in `config.php`:
    ```php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', '');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'pData');
    ```

5. Start your web server and navigate to the project directory in your browser:
    ```
    http://localhost/CRUD-Project
    ```

## Usage

1. **Create**: Navigate to the "Create" page, fill in the form, and submit to add a new record.
2. **Read**: The homepage displays a list of all records from the database.
3. **Update**: Click on the "Edit" button next to a record, modify the details, and submit to update the record.
4. **Delete**: Click on the "Delete" button next to a record to remove it from the database.

## Project Structure
```
crud-projects-using-php/
│  
├── config/
│   └── config.php       # Database configuration
│
├── public/
│   ├── index.php        # Homepage displaying all records
│   ├── create.php       # Page for creating new records
│   ├── update.php       # Page for updating existing records
│   └── delete.php       # Script for deleting records
│
├── sql/
│   └── pData.sql      # SQL file to set up the database
│
└── README.md            # Project documentation
```


## Contributing

Contributions are welcome! If you have any suggestions, please open an issue or submit a pull request.
