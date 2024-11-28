# program-crud-php-native
Berikut adalah README.md versi singkat tanpa fitur upload gambar:  

```markdown
# CRUD Application with PHP Native

A simple CRUD application built with PHP native and MySQL.

## Features
- **Create**: Add new program entries.
- **Read**: Display all programs in a table format.
- **Update**: Edit program details.
- **Delete**: Remove programs.

## Setup

### 1. Clone the repository:
```bash
git clone git@github.com:your-username/program-crud-php-native.git
```

### 2. Create the database and table:
```sql
CREATE DATABASE program_db;
USE program_db;

CREATE TABLE program (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    duration VARCHAR(50) NOT NULL
);
```

### 3. Configure database connection:
Edit `db.php`:
```php
$host = 'localhost';
$dbname = 'program_db';
$user = 'root';
$password = '';
```

### 4. Run the application:
Start a PHP server:
```bash
php -S localhost:8000
```
Access the app at:
```
http://localhost:8000
```

## Usage
1. **Add Program**: Click "Add New Program", fill the form, and save.
2. **Edit Program**: Click "Edit", update details, and save.
3. **Delete Program**: Click "Delete" and confirm.
4. **View Programs**: Home page shows a table of all programs.

---

Happy Coding!  
👩‍💻
```
