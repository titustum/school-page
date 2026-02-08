# SchoolPage.co.ke – Single-Page School Portfolios

**Bringing Every School Online in Kenya**

SchoolPage.co.ke is a Laravel-based platform that allows every school in Kenya to have a **single-page portfolio**, showcasing essential information, images, and documents such as fee structures. Each school gets a **unique subdomain**, making it simple to share and access online.

---

## 🌟 Features

* **Single-page school portfolios** (scrollable, mobile-friendly)
* **Subdomain routing** for each school: `[school-subdomain].schoolpage.co.ke`
* **Dynamic sections per school:**

  * Header with school name, category, type, gender, principal name (optional)
  * About / description
  * Contact information (phone, email, postal address, town/city)
  * Fee structure (PDF download)
  * Gallery / images
* **Admin panel** for creating and updating schools, images, and documents
* **Location hierarchy:** county → subcounty → ward
* **Future-proof design** for thousands of schools

---

## 🎯 Tech Stack

* **Backend:** Laravel 10
* **Frontend:** Blade templates + TailwindCSS / Bootstrap (optional)
* **Database:** MySQL / MariaDB
* **Storage:** Local Laravel storage for images and PDFs (cloud storage optional)
* **Subdomain routing:** Built-in Laravel route groups

---

## 🗂 Database Structure

**Tables:**

* `counties` – list of Kenyan counties
* `subcounties` – linked to counties
* `wards` – linked to subcounties
* `schools` – main school portfolio info
* `school_images` – multiple images per school
* `school_documents` – PDFs (fee structures, admission forms, etc.)

**Relationships:**

* `School` hasMany `SchoolImage` and `SchoolDocument`
* `School` belongsTo `County`, `Subcounty`, `Ward`
* `Subcounty` belongsTo `County`
* `Ward` belongsTo `Subcounty`

---

## 🚀 Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/schoolpage.co.ke.git
cd schoolpage.co.ke
```

2. Install dependencies:

```bash
composer install
npm install
npm run dev
```

3. Configure environment:

```bash
cp .env.example .env
php artisan key:generate
```

Set your database credentials in `.env`.

4. Run migrations:

```bash
php artisan migrate
```

5. Optional: Seed counties, subcounties, wards for Kenya.

6. Serve the application:

```bash
php artisan serve
```

---

## 🌐 Subdomain Routing

Each school portfolio is accessed via a subdomain:

```
[school-subdomain].schoolpage.co.ke
```

Example:

```
st-mary.schoolpage.co.ke
```

Routing example in Laravel:

```php
Route::domain('{school}.schoolpage.co.ke')->group(function () {
    Route::get('/', [SchoolPortfolioController::class, 'show']);
});
```

---

## 🛠 Admin Panel

* Create, update, and delete school portfolios
* Upload multiple images per school
* Upload fee structure PDFs and other documents
* Filter by county, subcounty, or ward

---

## 🎨 Design Guidelines

* **Colors:** Black + Dark Green
* **Favicon:** Graduation cap icon
* **Frontend:** Minimalist, mobile-first, accessible

---

## ⚡ Usage

* Schools can be onboarded by admin initially
* Each school portfolio displays:

  * School info, images, PDF downloads
  * Clear footer branding:

    ```
    Powered by SchoolPage.co.ke – Bringing Every School Online
    ```

---

## 📦 Future Enhancements

* Self-service login for schools to update their own portfolios
* Event announcements or school news feed
* Analytics dashboard for schools
* Integration with cloud storage for scalable images/PDFs

---

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/xyz`)
3. Commit your changes (`git commit -m 'Add xyz feature'`)
4. Push to branch (`git push origin feature/xyz`)
5. Create a pull request

---

## 📜 License

This project is **MIT Licensed** – feel free to use and modify for educational and commercial purposes.

---
