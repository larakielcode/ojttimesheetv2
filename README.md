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
./
|   📄 README.md
|
+---📁 classes
|       🐘 database.class.php
|
+---📁 dist
|   |   🐘 index.php
|   |   🐘 migrations.php
|   |
|   +---📁 assets
|   |       🖼️ omegalogo.png
|   |
|   +---📁 css
|   |      🎨 style.css
|   |
|   +---📄 js
|   |       main.js
|   |
|   +---📁 views
|           🌐 index.html
|
\---📁 includes
        ⚙️ config.php
        🐘 connection.php
        🐘 migrate_controller.php
        🐘 sample_interns.php
</pre>
* 📂 **classes/** - Source files for all the PHP classes
* 📂 **dist/** - The document root. The index file is located here
* 📂 **dist/assets** - All icons and images will be stored here
* 📂 **dist/css** - All CSS files
* 📂 **dist/js** - All Javascript files
* 📂 **dist/views** - All pages that renders display/views
* 📂 **includes/** - Other important PHP include files dependencies
* 📄 **README.md** - Project Overview
