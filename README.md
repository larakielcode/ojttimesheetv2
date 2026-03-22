# Project Overview: OJT Timesheet System 🕒

![Status](https://img.shields.io/badge/Status-Development-orange?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)

The **OJT Timesheet System** (often referred to as **OJT Timetracker**) is a specialized web application designed to automate the logging, tracking, and reporting of internship hours. It replaces traditional paper-based logs with a centralized digital platform, ensuring accuracy for both students and supervisors.

---

## 🛠️ Core Functional Modules

* **🔐 User Authentication**
  ![Progress](https://img.shields.io/badge/Progress-0%25-red)
  *Secure login for Interns and Supervisors/Admins.*
* **⚙️ Time Logging Engine**
  ![Progress](https://img.shields.io/badge/Progress-0%25-red)
  *Features for "Clock In" and "Clock Out" with automated duration calculation.*
* **📝 Task Documentation**
  ![Progress](https://img.shields.io/badge/Progress-0%25-red)
  *Mandatory "Accomplishments" field for each entry to provide context.*
* **📊 Dashboard Analytics**
  ![Progress](https://img.shields.io/badge/Progress-0%25-red)
  *Real-time visualization of total hours completed versus academic requirements.*
* **📄 PDF/CSV Export**
  ![Progress](https://img.shields.io/badge/Progress-0%25-red)
  *Generation of formal reports ready for submission.*

---

## 💻 Tech Stack & Architecture

* **Backend:** PHP (PDO) for secure database interactions.
* **Database:** MySQL for persistent storage of logs and user data.
* **Infrastructure:** Containerized using **Docker** and **Docker Compose** for a consistent development environment.

## 📁 Directory and File Structures
<pre>
├── app/
│   ├── Controllers/       
│   ├── Models/            # Database interactions (new)
│   ├── Middleware/        # Auth checks, CSRF, etc. (new)
│   └── Core/              # Router, Database class, Container
├── bootstrap/
│   └── app.php            # Initializes the app (replaces some includes)
├── config/                # Database credentials and app settings (new)
├── public/
│   ├── assets/            # CSS, JS, Images
│   ├── index.php          # Entry point
│   └── .htaccess
├── resources/
│   └── views/             # All .view.php files
├── routes/
│   └── web.php            # Clean route definitions
├── storage/               # Logs and file uploads (new)
└── vendor/                # If using Composer
</pre>


