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

# ⚡ Quick Setup (Complete)

Run these commands in order:

```bash
# 1. Install dependencies
composer install

# 2. Copy environment file
cp .env.example .env

# 3. Generate app key
php artisan key:generate

# 4. Create folders for uploads
mkdir -p public/uploads/user_images

# 5. Run migrations with seed
php artisan migrate --seed

# 6. Link storage (if using file uploads)
php artisan storage:link

# 7. Start development server
php artisan serve

# 8. (In separate terminal) Start queue worker for email notifications
php artisan queue:work
```

---

# 📧 Email & Queue Configuration

For the user creation feature with email notifications:

## 1. Update `.env` for Mail Driver

```env
# Option 1: Log driver (for testing/development)
MAIL_MAILER=log

# Option 2: Mailtrap (for real email testing)
MAIL_MAILER=mailtrap
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password

# Option 3: SMTP
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

## 2. Update `.env` for Queue

```env
# Option 1: Sync (immediate, no queue needed - development)
QUEUE_CONNECTION=sync

# Option 2: Database (requires jobs table - production)
QUEUE_CONNECTION=database
```

### 📌 For Database Queue:

If using `QUEUE_CONNECTION=database`, the migrations already include the jobs table. If not:

```bash
php artisan queue:table
php artisan migrate
```

### ▶️ Running Queue Worker

If using `QUEUE_CONNECTION=database`:

```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start queue worker (processes email jobs)
php artisan queue:work
```

---

# 🧪 Test User Creation API

Once everything is running:

```bash
curl -X POST http://localhost:8000/api/users/add \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "SecurePassword123"
  }'
```

### Expected Response (201):

```json
{
  "success": true,
  "message": "User created successfully. Welcome email has been queued.",
  "data": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "user_type": "user"
  }
}
```

---

# ✅ Final Checklist

Before running in production:

* [ ] `uploads/user_images` folder created
* [ ] `.env` file configured with DB credentials
* [ ] `.env` configured with MAIL_MAILER and QUEUE_CONNECTION
* [ ] Database created and credentials set
* [ ] `composer install` executed
* [ ] Application key generated (`php artisan key:generate`)
* [ ] `php artisan migrate --seed` run
* [ ] `php artisan storage:link` executed
* [ ] Queue worker running (if using database queue)
* [ ] Files from `public/build/` directory exist (compiled assets)

---

## 🎯 Pro Tips

* **For Development**: Use `QUEUE_CONNECTION=sync` and `MAIL_MAILER=log` to avoid needing a queue worker
* **For Testing with Real Emails**: Use Mailtrap.io - it's free for small projects
* **Monitor Queue**: Use `php artisan queue:failed` to see failed email jobs
* **If emails not sending**: Check logs in `storage/logs/laravel-*.log`