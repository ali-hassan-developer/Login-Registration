# Login & Registration System

A simple **Login & Registration System** built with **PHP** and **MySQL**.  
This project includes backend authentication and a user dashboard.

---

## Files Overview

| File Name          | Description                                    |
|-------------------|------------------------------------------------|
| `Login.php`        | User login page                               |
| `Registration.php` | User registration page                        |
| `action_page.php`  | Handles login and registration form actions  |
| `dashboard.php`    | User dashboard after successful login         |
| `db.php`           | Database connection file                      |
| `logout.php`       | Logout functionality                           |
| `register.css`     | CSS for registration form                      |
| `styles.css`       | General CSS for pages                          |
| `first_db.sql`     | Database export file                           |

---

## Requirements

- **XAMPP** (Apache + MySQL)
- PHP 8.x
- MySQL

---

## Setup Instructions

1. **Clone or download** this repository to your local machine.
2. **Start XAMPP** and run **Apache** and **MySQL**.
3. Open **phpMyAdmin** from `http://localhost/phpmyadmin`.
4. **Import the database**:
   - Click on `Import`
   - Select `first_db.sql` from this project
   - Click `Go`
5. **Update database credentials**:
   - Open `db.php`
   - Enter your MySQL username and password
6. **Open in browser**:
   - Navigate to: `http://localhost/Login&Registration Form/Login.php`
   - You can now see the front-end and test login/registration.

---

## Usage

- **Register** a new user via `Registration.php`
- **Login** with the registered credentials via `Login.php`
- Access **dashboard** after login
- **Logout** using `logout.php`

---

## Notes

- Make sure your **XAMPP Apache server** is running before opening the pages.
- Use **modern browsers** like Chrome, Firefox, or Edge for best results.
