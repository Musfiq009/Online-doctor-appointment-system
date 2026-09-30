<div align="center">

# 🩺 Online Doctor Appointment Management System

**A role-based web platform where patients book online/onsite consultations and admins manage doctors and the full appointment lifecycle.**

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-AJAX-F7DF1E?logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
![XAMPP](https://img.shields.io/badge/Server-XAMPP-FB7A24?logo=xampp&logoColor=white)

*Web Technologies — Final-Term Project · Fall 2025-2026 · Section FR · Group 20*
*American International University-Bangladesh (AIUB) · Faculty of Science & Technology · Department of Computer Science*

</div>

---

## 📑 Table of Contents

1. [Overview](#-overview)
2. [Team](#-team)
3. [Key Features](#-key-features)
4. [Tech Stack](#-tech-stack)
5. [Project Structure](#-project-structure)
6. [Database Design](#-database-design)
7. [Getting Started](#-getting-started)
8. [Application Flow](#-application-flow)
9. [Screenshots — Patient Module](#-screenshots--patient-module)
10. [Screenshots — Admin Module](#-screenshots--admin-module)
11. [Future Work](#-future-work)
12. [Acknowledgements](#-acknowledgements)

---

## 📖 Overview

The **Online Doctor Appointment Management System** (branded *"Consultation Time"* in the patient UI) makes healthcare services more accessible. It has two user roles that share a single login page:

| Role | Purpose |
|------|---------|
| **Patient** | Register, search specialist doctors, book **Online** or **Onsite** appointments, manage a personal medical profile, and recover a forgotten password. |
| **Admin** | Manage doctor profiles, approve/reject/complete appointment requests, view doctor history & patient reviews, and monitor system analytics. |

This reduces time, effort and the need for physical visits, while giving administrators clear oversight of doctor and appointment activity.

---

## 👥 Team

| Serial | Student ID | Name |
|:------:|:----------:|------|
| 35 | 23-50118-1 | Md. Maharab Khan |
| 37 | 23-51074-1 | Md. Abu Musfiq Rahat |

**Submitted to:** Sultanul Arifeen Hamim — Web Technologies, AIUB

---

## ✨ Key Features

### 🧑‍⚕️ Patient Module

- **Registration & Login** — Register with first/last name, phone, email and password (bcrypt-hashed). Log in using an **11-digit phone number** and password.
- **Dashboard** — Public landing page plus a logged-in dashboard with *Home, All Doctors, About, Contact, Profile*, a *Book Appointment* call-to-action, **Find by Speciality** shortcuts (General Physician, Gynecologist, Dermatologist, Pediatricians, Neurologist, Gastroenterologist) and a *Top Doctors* grid pulled live from the database.
- **Book Appointment**
  - Browse all *Available* doctors.
  - **Live AJAX search** by name, specialization or category.
  - Choose **Online** (no fixed time — the admin assigns one on approval) or **Onsite** (fixed time slot, serial number assigned on approval) and pick a date.
  - Request is saved as **Pending** until an admin acts on it.
- **Profile Management** — Edit name, phone, gender, age, blood group and address; saved with a confirmation message.
- **Forgot / Change Password** — Reset a password using phone number + new password.
- **Logout** — Ends the session securely.

### 🛠️ Admin Module

- **Admin Login & Secure Access** — Same login form; admin role redirects to the admin panel, with a role-checked dashboard.
- **Dashboard & Analytics**
  - Summary cards: **Total Doctors, Total Patients, Total Appointments**.
  - **Appointment Flow** donut chart (Pending / Accepted / Completed, pure CSS `conic-gradient`).
  - **Payment Status** progress bars (Paid vs Unpaid).
- **Appointment Lifecycle Management** (tabbed: *Pending · Accepted · Completed · Canceled*, loaded via AJAX)
  - **Pending** → *Accept* or *Reject*.
  - **Accepted** → *Complete*.
  - **Online** appointments: admin enters a consultation time on acceptance.
  - **Onsite** appointments: system auto-assigns the next **serial number** per doctor per day.
- **Doctor Management**
  - **Add Doctor** — validated form (name length, email format, 10–15 digit phone, unique email/phone, image type check) with photo upload and sticky form values on error.
  - **View All Doctors** — card grid (photo, name, degree, specialization, availability).
  - **Edit Doctor** — update details, change photo, toggle **Available / Unavailable**.
  - **Doctor Profile view** — completed **Appointment History** and **Ratings & Reviews** with overall average.
  - **Delete Doctor** — confirmation dialog, AJAX removal with fade-out, photo file cleanup.
- **Logout** — Destroys the session.

---

## 🧰 Tech Stack

| Layer | Technology |
|-------|------------|
| Frontend | HTML5, CSS3 (Flexbox, Grid, `conic-gradient`), Vanilla JavaScript |
| Async | `XMLHttpRequest` (AJAX) for search, tab loading, status updates and deletes |
| Backend | PHP (procedural, `mysqli`) |
| Database | MySQL / MariaDB |
| Auth | PHP Sessions (`$_SESSION`), `password_hash()` |
| Local server | XAMPP (Apache + MySQL) |

---

## 🗂️ Project Structure

```
Online-Doctor-Appointment-System/
├── Admin/
│   ├── Css/        appointment.css · Dashboard.css · Doctors.css · Edit_Doctor.css
│   ├── DB/         configDB.php
│   ├── Html/       Dashboard.php · Doctors.php · edit_doctor.php · appointments.php
│   ├── Images/     uploaded doctor photos
│   ├── JS/         appointment.js · load_appointments.js · Doctor_tab.js · delete_DoctorCard.js
│   └── PHP/        Add_doctor.php · update_doctor.php · delete_doctor.php · Fetch_doctor.php
│                   Get_Doctors.php · get_appointments.php · update_appointment_status.php
│                   get_doctor_appointment.php · get_doctor_ratings.php
│                   Dashboard_counts.php · Appointment_stats.php · Payment_stats.php · Logout.php
│
└── Patient/
    ├── Css/        dashboard.css · logedinDashboard.css · login.css · registration.css
    │               forgotpassword.css · bookappointment.css · appointment.css
    │               success.css · userprofile.css
    ├── DB/         configDB.php
    ├── Html/       dashboard.php · login.php · registration.php · forgotpassword.php
    │               logedinDashboard.php · bookappointment.php · appointmentForm.php
    │               appointmentSuccess.php · userprofile.php
    ├── Images/     landing-page doctor images
    ├── JS/         search.js
    └── PHP/        login.php · logout.php · register.php · forgotpassword.php
                    saveAppointment.php · searchDoctor.php · userprofile.php · update_profile.php
```

---

## 🗄️ Database Design

The SQL dump is not part of the repository, so the schema below is **inferred from the queries in the code**. Adjust types to your needs.

| Table | Columns (used by the code) |
|-------|----------------------------|
| `users` | `user_id` (PK), `role` (`admin`/`patient`), `full_name`, `email`, `password`, `phone` |
| `patient_profiles` | `patient_id` (FK → users), `address`, `age`, `gender`, `blood_group` |
| `doctors` | `doctor_id` (PK), `full_name`, `degree`, `email`, `address`, `phone`, `specialization`, `category`, `photo`, `status` (`Available`/`Unavailable`) |
| `appointments` | `appointment_id` (PK), `patient_id`, `doctor_id`, `consultation_type` (`Online`/`Onsite`), `appointment_date`, `appointment_time`, `serial_number`, `status` (`Pending`/`Accepted`/`Completed`/`Canceled`) |
| `doctor_ratings` | `patient_id`, `doctor_id`, `rating`, `comment`, `created_at` |
| `payments` | `payment_status` (`Paid`/`Pending`) *(+ appointment reference)* |

<details>
<summary><b>Starter SQL (click to expand)</b></summary>

```sql
CREATE DATABASE `online doctor appointment and diagnostic management`;
USE `online doctor appointment and diagnostic management`;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  role ENUM('admin','patient') NOT NULL DEFAULT 'patient',
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(15) UNIQUE NOT NULL
);

CREATE TABLE patient_profiles (
  patient_id INT PRIMARY KEY,
  address TEXT, age INT, gender VARCHAR(10), blood_group VARCHAR(5),
  FOREIGN KEY (patient_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE doctors (
  doctor_id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100), degree VARCHAR(100),
  email VARCHAR(100) UNIQUE, address TEXT, phone VARCHAR(15) UNIQUE,
  specialization VARCHAR(100), category VARCHAR(50),
  photo VARCHAR(255), status ENUM('Available','Unavailable') DEFAULT 'Available'
);

CREATE TABLE appointments (
  appointment_id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT, doctor_id INT,
  consultation_type ENUM('Online','Onsite'),
  appointment_date DATE, appointment_time TIME NULL, serial_number INT NULL,
  status ENUM('Pending','Accepted','Completed','Canceled') DEFAULT 'Pending',
  FOREIGN KEY (patient_id) REFERENCES users(user_id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id) ON DELETE CASCADE
);

CREATE TABLE doctor_ratings (
  rating_id INT AUTO_INCREMENT PRIMARY KEY,
  doctor_id INT, patient_id INT, rating TINYINT, comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  appointment_id INT,
  payment_status ENUM('Paid','Pending') DEFAULT 'Pending'
);

-- Example admin (the login code compares admin passwords in plain text)
INSERT INTO users (role, full_name, email, password, phone)
VALUES ('admin', 'Admin', 'admin@example.com', 'admin123', '01700000001');
```

</details>

---

## 🚀 Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or WAMP / Laragon) with **PHP 7.4+** and **MySQL/MariaDB**
- A modern web browser

### Installation

1. **Clone the repository** into your web root (`htdocs` for XAMPP):

   ```bash
   git clone https://github.com/Musfiq009/Online-doctor-appointment-system.git
   ```

2. **Start** Apache and MySQL from the XAMPP control panel.

3. **Create the database** in phpMyAdmin and import/run the schema above.

4. **Configure the database connection.** The project has two config files that must point to the *same* database:

   - `Admin/DB/configDB.php`
   - `Patient/DB/configDB.php`

   ```php
   $host   = "localhost";
   $user   = "root";
   $pass   = "";
   $dbname = "online doctor appointment and diagnostic management";
   ```

   > ⚠️ In the current code the two files use slightly **different database names** (`...appointment and diagnostic management` vs `...appointmentment and diagnostic system`). Make both identical before running.

5. **Make the Admin image folder writable** so doctor photo uploads work: `Admin/Images/`.

6. **Copy the images** the patient pages reference. Patient pages load `../images/` (lowercase); on case-sensitive systems (Linux) either rename the folder or update the paths.

7. **Open the app:**

   | Page | URL |
   |------|-----|
   | Public landing page | `http://localhost/<repo-name>/Patient/Html/dashboard.php` |
   | Login (patients & admin) | `http://localhost/<repo-name>/Patient/Html/login.php` |
   | Registration | `http://localhost/<repo-name>/Patient/Html/registration.php` |

### Default Access

- **Patient:** register a new account from the registration page.
- **Admin:** insert an admin row into `users` (see the sample SQL) and log in with that 11-digit phone number.

---

## 🔄 Application Flow

```
                 ┌──────────────────────────┐
                 │  Patient/Html/login.php  │  ← shared login page
                 └────────────┬─────────────┘
                              │ role check (PHP session)
             ┌────────────────┴────────────────┐
             ▼                                 ▼
   ┌───────────────────┐             ┌────────────────────┐
   │      PATIENT      │             │       ADMIN        │
   │ logedinDashboard  │             │     Dashboard      │
   └─────────┬─────────┘             └─────────┬──────────┘
             │                                 │
   Search & pick doctor                Doctors ── Add / View / Edit / Delete
             │                                 │
   Choose Online/Onsite + date         Appointments ── tabs by status
             │                                 │
             ▼                                 ▼
   Appointment = PENDING  ───────────►  Accept ─► ACCEPTED ─► Complete ─► COMPLETED
                                              └─► Reject ─► CANCELED
                                         (Online: set time · Onsite: auto serial no.)
```

---

## 🖼️ Screenshots — Patient Module

### Registration
Create an account with name, phone, email and password.

![Patient Registration](screenshots/patient/01-registration.png)

### Login
Phone number + password login, with links to registration and password recovery.

![Login](screenshots/patient/02-login.png)

### Landing Dashboard (Guest)
Public home page with hero banner, speciality shortcuts and top doctors.

![Landing Dashboard](screenshots/patient/03-landing-dashboard.png)

![Top Doctors](screenshots/patient/04-landing-top-doctors.png)

### Logged-in Dashboard
Full service navigation, including the Profile button.

![Logged-in Dashboard](screenshots/patient/05-logged-in-dashboard.png)

### Patient Profile
View and update personal and medical information.

![Patient Profile](screenshots/patient/06-profile.png)

### Book Appointment — Find a Doctor
Live search by name / specialization / category.

![Book Appointment](screenshots/patient/07-book-appointment.png)

### Book Appointment — Select Consultation
Choose consultation type (Online / Onsite) and date, then send the request.

![Select Doctor](screenshots/patient/08-select-doctor.png)

### Appointment Request Confirmation

![Appointment Success](screenshots/patient/09-appointment-success.png)

### Forgot Password

![Forgot Password](screenshots/patient/10-forgot-password.png)

![Password Updated](screenshots/patient/11-password-reset-success.png)

---

## 🖼️ Screenshots — Admin Module

### Admin Login (shared login panel)

![Admin Login](screenshots/admin/01-admin-login.png)

### Admin Dashboard
Totals plus appointment-flow and payment-status analytics.

![Admin Dashboard](screenshots/admin/02-dashboard.png)

### Doctors — View All
Doctor cards with **View** and **Delete** actions.

![View All Doctors](screenshots/admin/03-view-doctors.png)

### Doctors — Add Doctor

![Add Doctor](screenshots/admin/04-add-doctor.png)

### Doctor Appointment History & Reviews

![Doctor History and Reviews](screenshots/admin/05-doctor-history-reviews.png)

### Edit Doctor

![Edit Doctor](screenshots/admin/06-edit-doctor.png)

### Delete Doctor (Confirmation)

![Delete Doctor](screenshots/admin/07-delete-doctor.png)

### Appointment Flow Monitor

**Pending** — accept or reject requests

![Pending Appointments](screenshots/admin/10-appointments-pending.png)

**Accepted** — mark as complete

![Accepted Appointments](screenshots/admin/08-appointments-accepted.png)

**Completed** — finalized records

![Completed Appointments](screenshots/admin/09-appointments-completed.png)

**Canceled** — rejected requests

![Canceled Appointments](screenshots/admin/11-appointments-canceled.png)

---

## 🔮 Future Work

- Payment workflow (the dashboard already reads a `payments` table)
- Patient-side appointment history and cancellation
- Patient reviews & ratings submission UI (admin already displays them)
- Email/SMS notifications on appointment status changes
- Prevent double-booking / enforce per-doctor daily capacity
- Doctor role with its own dashboard
- Diagnostic/lab test management (implied by the database name)
- Responsive layouts for mobile screens

---

## 🙏 Acknowledgements

- **Sultanul Arifeen Hamim** — course instructor, Web Technologies, AIUB
- American International University-Bangladesh (AIUB), Faculty of Science & Technology, Department of Computer Science

---

<div align="center">

Made with ❤️ by **Md. Maharab Khan** & **Md. Abu Musfiq Rahat** · AIUB · Group 20

</div>
