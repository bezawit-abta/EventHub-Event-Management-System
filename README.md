# EventHub — Online Event Management System

College demo with responsive HTML/CSS frontend, PHP backend, MySQL, attendee login, event registration/cancellation and admin dashboard.

## Run locally with XAMPP
1. Extract ZIP. Copy the `EventHub` folder into `C:\xampp\htdocs\`.
2. Start Apache and MySQL in XAMPP.
3. Open http://localhost/phpmyadmin and import `database.sql` once. It creates the `eventhub` database and sample events.
4. Database credentials in `config.php` default to root with empty password. Adjust if needed.
5. Open http://localhost/EventHub/ in a browser.
6. Register an account, login, view events and register.

## Enable admin
Register normally, then in phpMyAdmin select `eventhub`, open SQL and execute:
```sql
UPDATE users SET role='admin' WHERE email='YOUR_REGISTERED_EMAIL@example.com';
```
Replace the email and log out/back in. Admin can add/edit/show/hide events and see attendees and statistics.

## Features
- Responsive event discovery and event details
- Attendee registration and login with hashed passwords
- Unique registration per user/event, capacity check with transaction/row lock
- My Events page and cancellation
- Admin dashboard: stats, event management, attendee list
- PDO prepared queries, CSRF validation, HTML escaping, admin role check

## Limitations
Student demonstration only: no real ticket payment, email tickets, QR code or production deployment. Add HTTPS, rate limiting, secure session cookie settings, password reset and security review before public deployment. Sample event dates can be edited by admin. Never upload actual secrets or personal data to GitHub.

## GitHub on Android
Extract the ZIP, create an empty repository at https://github.com/new, select Add file → Upload files and upload the extracted source files, then Commit changes. GitHub Pages cannot execute PHP/MySQL.
