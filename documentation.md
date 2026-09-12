# CariBali — Project Documentation

CariBali is a Laravel-based web application for discovering Bali travel
experiences (attractions, tours, and activities). It ships with a public
marketing/browsing site and a protected admin panel for managing the
content shown to visitors.

---

## 1. Tech Stack

| Layer          | Technology                                            |
|----------------|--------------------------------------------------------|
| Backend        | PHP 8.2+, Laravel 12                                   |
| Auth           | Laravel Jetstream + Fortify (session-based, 2FA-ready)  |
| Frontend build | Vite, Tailwind CSS 3, Livewire 3                        |
| Database       | MySQL (default in this environment) — SQLite supported |
| Admin UI       | Bootstrap (bundled under `public/Admincss`)             |

---

## 2. Prerequisites

Install the following before setting up the project:

- PHP `>= 8.2` with the extensions Laravel normally requires
  (`mbstring`, `openssl`, `pdo`, `pdo_mysql` or `pdo_sqlite`, `fileinfo`, `curl`)
- [Composer](https://getcomposer.org/) `>= 2.x`
- [Node.js](https://nodejs.org/) `>= 18` and npm
- A database server — MySQL (recommended, matches this project's `.env`) or
  SQLite (zero-config alternative)
- Git

---

## 3. Installation

```bash
# 1. Clone the repository
git clone <repository-url> caribali
cd caribali

# 2. Install PHP dependencies
composer install

# 3. Install JS dependencies
npm install

# 4. Create your environment file
cp .env.example .env

# 5. Generate the application key
php artisan key:generate
```

### 3.1 Configure the database

Open `.env` and set your database credentials. Two common options:

**Option A — MySQL** (used in this project's local `.env`):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=caribali
DB_USERNAME=root
DB_PASSWORD=
```

Create the database first (e.g. `CREATE DATABASE caribali;`).

**Option B — SQLite** (fastest for local development, no server needed):

```env
DB_CONNECTION=sqlite
```

```bash
touch database/database.sqlite
```

### 3.2 Run migrations and seed demo data

```bash
php artisan migrate --seed
```

This creates the schema (`users`, `posts`, `sessions`, `jobs`, etc.) and
seeds sample travel posts via `database/seeders/PostSeeder.php`.

### 3.3 Create the admin account

Admin access is gated by a `usertype` column on `users` (`user` | `admin`).
There is no public "become an admin" flow — create the account manually,
for example via `php artisan tinker`:

```php
App\Models\User::create([
    'name' => 'CariBali Admin',
    'email' => 'admin@example.com',
    'password' => Illuminate\Support\Facades\Hash::make('choose-a-strong-password'),
    'usertype' => 'admin',
]);
```

> `usertype` is intentionally **not** mass-assignable (`$fillable` on
> `App\Models\User`) — it must be set explicitly on the backend, never
> through a form, to prevent privilege escalation.

### 3.4 Build frontend assets

```bash
npm run build   # production build
# or
npm run dev     # Vite dev server with hot reload
```

### 3.5 Run the application

The `composer dev` script runs the app server, queue listener, log tailer,
and Vite dev server together:

```bash
composer dev
```

Or run the pieces individually:

```bash
php artisan serve       # http://127.0.0.1:8000
npm run dev              # Vite asset watcher
php artisan queue:listen # background jobs (if used)
```

Visit `http://127.0.0.1:8000` for the public site and
`http://127.0.0.1:8000/admin` for the admin panel (requires login with an
`admin` account, see 3.3).

---

## 4. Project Structure

```
caribali/
├── app/
│   ├── Actions/
│   │   ├── Fortify/          # Custom Fortify actions (register, reset/update password, update profile)
│   │   └── Jetstream/        # Custom Jetstream actions (account deletion)
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php          # Base controller
│   │   │   ├── HomeController.php      # Public landing page (Favorite Places, Explore Bali carousel)
│   │   │   └── AdminPostController.php # Admin CRUD for travel posts
│   │   └── Middleware/
│   │       └── EnsureUserIsAdmin.php   # Blocks non-admin users from /admin routes (403)
│   ├── Models/
│   │   ├── Post.php          # Travel post/experience (title, category, location, rating, image, maps link)
│   │   └── User.php          # Authenticatable user (Jetstream/Fortify/Sanctum traits + usertype)
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   ├── FortifyServiceProvider.php   # Wires custom Fortify actions, login rate limiting
│   │   └── JetstreamServiceProvider.php # Jetstream role/permission config
│   └── View/Components/
│       ├── AppLayout.php      # Layout wrapper for authenticated pages
│       └── GuestLayout.php    # Layout wrapper for guest (auth) pages
│
├── bootstrap/
│   └── app.php                # App bootstrapping: routes, middleware aliases (`admin` → EnsureUserIsAdmin), exception handling
│
├── config/                    # Framework & package configuration (auth, fortify, jetstream, database, ...)
│
├── database/
│   ├── migrations/            # Schema history (users, posts, sessions, jobs, 2FA columns, etc.)
│   ├── seeders/
│   │   ├── DatabaseSeeder.php # Entry point for `php artisan db:seed`
│   │   └── PostSeeder.php     # Demo travel posts (Mount Batur, Uluwatu, Tegallalang, etc.)
│   └── factories/
│       └── UserFactory.php    # Test/demo user factory
│
├── public/
│   ├── index.php              # Application entry point (served by the web server)
│   ├── Admincss/               # Bootstrap-based CSS/JS/vendor assets used only by the admin panel
│   ├── build/                  # Compiled Vite assets (generated, do not edit by hand)
│   ├── css/, js/                # Static/legacy front-end assets
│   └── images/                 # Uploaded and static images (post images, logos, favicon)
│
├── resources/
│   ├── views/
│   │   ├── home/               # Public site sections (hero banner, favorite places, testimonials, FAQ, footer)
│   │   ├── admin/               # Admin panel layout + posts management screens
│   │   │   ├── header.blade.php / footer.blade.php / css.blade.php
│   │   │   └── posts/index.blade.php  # Post list, create/edit modals, pagination
│   │   ├── pagination/admin.blade.php # Custom pill-style pagination view for the admin panel
│   │   ├── auth/                 # Jetstream/Fortify auth screens (login, register, password reset, 2FA)
│   │   ├── profile/              # Jetstream account/profile management screens
│   │   ├── components/           # Shared Blade components (buttons, inputs, modals, nav, ...)
│   │   └── layouts/              # Base `app` (authenticated) and `guest` layouts
│   ├── css/app.css              # Tailwind entry point
│   └── js/app.js, bootstrap.js  # Frontend JS entry points
│
├── routes/
│   ├── web.php                 # Public routes (`/`, `/about`) and admin routes (`/admin`, `/admin/posts/*`, guarded by `auth`+`admin`)
│   ├── api.php                 # API routes (Sanctum-ready)
│   └── console.php             # Artisan console command routes
│
├── storage/                    # Logs, framework cache, and user-uploaded files (via storage:link)
├── tests/                      # PHPUnit/Feature tests
├── vendor/                     # Composer dependencies (generated)
│
├── .env.example                 # Template environment configuration
├── composer.json                 # PHP dependencies & scripts (`composer dev`, etc.)
├── package.json                  # JS dependencies & scripts (`npm run dev`/`build`)
├── tailwind.config.js            # Tailwind CSS configuration
├── vite.config.js                # Vite build configuration
└── documentation.md              # This file
```

### 4.1 Notable design decisions

- **`Post` model** — the public site and admin panel both revolve around
  `App\Models\Post`. It was renamed/migrated from an earlier `Experience`
  model (see `database/migrations/2026_09_12_043257_rename_experiences_table_to_posts.php`).
  Categories are defined as constants on the model (`Post::CATEGORIES`).
- **Admin access (RBAC)** — there is no separate admin login system. Admins
  use the same Jetstream login as regular users; access to `/admin/*` is
  restricted by the `admin` middleware alias (`App\Http\Middleware\EnsureUserIsAdmin`),
  which checks `usertype === 'admin'` on the authenticated user. Anyone
  without that flag gets a `403`, and guests are redirected to `/login`.
- **Two CSS "worlds"** — the public site uses Tailwind CSS (via Vite), while
  the admin panel uses Bootstrap (`public/Admincss`) plus page-scoped
  `<style>` blocks in the admin Blade views. Keep that in mind when styling
  either area — they are not interchangeable.
- **Pagination** — the admin posts list uses a custom pagination view
  (`resources/views/pagination/admin.blade.php`) instead of Laravel's
  default, so it matches the admin panel's visual style.

---

## 5. Useful Commands

| Command                                   | Purpose                                      |
|--------------------------------------------|-----------------------------------------------|
| `php artisan serve`                        | Run the local dev server                      |
| `composer dev`                             | Run server + queue + logs + Vite together     |
| `php artisan migrate`                      | Apply database migrations                     |
| `php artisan migrate:fresh --seed`         | Reset the database and reseed demo data       |
| `php artisan tinker`                       | Interactive REPL (e.g. to create an admin user) |
| `npm run dev` / `npm run build`            | Compile frontend assets (dev / production)     |
| `php artisan route:list`                   | List all registered routes                     |
| `php artisan test`                         | Run the automated test suite                   |

---

## 6. Troubleshooting

- **`/admin` redirects to `/login` forever** — you're not authenticated, or
  your session cookie/domain doesn't match `APP_URL`. Log in with an account
  that has `usertype = 'admin'`.
- **`/admin` returns 403** — you're logged in, but your account's
  `usertype` is not `admin`. This is enforced by design; update it directly
  in the database (see §3.3).
- **Styles look broken on the admin panel** — make sure you're not mixing
  Tailwind utility classes into admin views; the admin panel only loads
  Bootstrap + `public/Admincss`.
- **Vite asset errors in the browser** — run `npm run dev` (or `npm run build`
  for production) so `public/build/manifest.json` is up to date.
