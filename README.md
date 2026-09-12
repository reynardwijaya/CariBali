<p align="center">
  <img src="public/images/logofoot.png" alt="CariBali" width="120">
</p>

<h1 align="center">CariBali</h1>

<p align="center">
  Discover Bali's best travel experiences — curated attractions, tours, and activities in one place.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/Tailwind%20CSS-3-38BDF8?logo=tailwindcss&logoColor=white">
  <img src="https://img.shields.io/badge/License-MIT-green.svg">
</p>

---

## About

CariBali is a travel discovery site for Bali. Visitors can browse featured
destinations, filter by category and location, and read curated details for
each spot — while a protected admin panel lets the team manage that content.

## Features

- 🏝️ **Favorite Places** — browsable, filterable travel listings by category & location
- ⭐ **Explore Bali carousel** — highlights top-rated destinations
- 🔐 **Role-based admin panel** — only accounts flagged as `admin` can manage posts
- 🖼️ **Content management** — create, edit, and delete listings with image uploads
- 📱 Responsive UI built with Tailwind CSS

## Tech Stack

Laravel 12 · Jetstream/Fortify · Livewire · Tailwind CSS · Vite · MySQL

## Quick Start

```bash
composer install && npm install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed
composer dev
```

App runs at `http://127.0.0.1:8000`.

📖 **Full setup guide, admin access, and project structure:** see [documentation.md](documentation.md)

## License

MIT
