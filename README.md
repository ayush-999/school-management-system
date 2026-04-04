# 🚀 Laravel Project Setup Guide

## 📁 1. Create Required Folder Structure

Before running the project, you need to manually create the required folders for file uploads.

### Steps:

1. Go to the `public` directory of the project.
2. Create a folder named:

   ```
   uploads
   ```
3. Inside the `uploads` folder, create another folder:

   ```
   user_images
   ```

### 📌 Final Structure:

```
public/
 └── uploads/
      └── user_images/
```

### 💡 Why this is needed?

* This folder is used to store **user-uploaded images** (like profile pictures).
* Laravel does not automatically create these folders.
* If missing, image upload functionality may fail or throw errors.

---

# ⚙️ 2. Install Dependencies

Run the following command to install all required PHP packages:

```bash
composer install
```

### 💡 Purpose:

* Installs all dependencies defined in `composer.json`
* Required to run Laravel properly

---

# 🔑 3. Setup Environment File

Copy `.env.example` file:

```bash
cp .env.example .env
```

Then generate application key:

```bash
php artisan key:generate
```

### 💡 Purpose:

* `.env` stores environment configuration (DB, app URL, etc.)
* `key:generate` creates a secure encryption key

---

# 🗄️ 4. Database Setup

Update your `.env` file with database credentials:

```
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

# 🛠️ 5. Laravel Artisan Commands Explained

## 🔹 1. Run Migrations

```bash
php artisan migrate
```

### ✅ What it does:

* Creates database tables based on migration files

### 📌 When to use:

* First time setup
* When new migrations are added

---

## 🔹 2. Seed the Database

```bash
php artisan db:seed
```

### ✅ What it does:

* Inserts **dummy/sample data** into database

### 📌 When to use:

* To populate initial data (admin user, test data, etc.)

---

## 🔹 3. Refresh Database with Seed

```bash
php artisan migrate:refresh --seed
```

### ✅ What it does:

* Drops all tables
* Re-runs all migrations
* Re-seeds database

### 📌 When to use:

* During development when you want a **fresh database**
* Useful for testing

### ⚠️ Warning:

* This will **delete all existing data**

---

# ▶️ 6. Run the Project

Start Laravel development server:

```bash
php artisan serve
```

### 🌐 Access:

```
http://127.0.0.1:8000
```

---

# 📦 Optional (If Storage Used)

If your project uses Laravel storage:

```bash
php artisan storage:link
```

### 💡 Purpose:

* Creates a symbolic link from `public/storage` to `storage/app/public`
* Required for accessing uploaded files

---

# ✅ Final Checklist

Before running:

* [ ] `uploads/user_images` folder created
* [ ] `.env` file configured
* [ ] Database created
* [ ] `composer install` executed
* [ ] `php artisan migrate --seed` run

---

## 🎯 Pro Tip

If you're giving this to clients or teammates, you can also add:

* Sample `.env` file
* Database dump (optional)
* API documentation (if applicable)