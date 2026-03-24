# DreamScape

DreamScape is an immersive online platform designed for users to engage in various item trading activities. It provides a seamless experience for both players and administrators alike.

## Features
- **Item Catalog**: Browse items with filters.
- **Inventory Management**: Organize and view inventory with filters, sorting options and a detail page.
- **Trading System**: Users can accept or decline trades and receive notifications accordingly.
- **Admin Dashboard**: Manage items with full CRUD capabilities and assign inventory.

## Tech Stack
- **Framework**: Laravel 12
- **Frontend Tools**: Breeze, Blade, Tailwind, Vite, Alpine
- **Permissions**: Spatie Laravel-Permission

## Setup Instructions
1. Run `composer install` to install PHP dependencies.
2. Execute `npm install` to install Node.js dependencies.
3. Build assets with `npm run build`.
4. Create a `.env` file based on the `.env.example` and configure your database connection (recommended: SQLite).

## Roles
- **Beheerder**: Administrator with full access.
- **Speler**: Player with limited access.

## Routes Overview
- `/items`: Access item catalog.
- `/inventory`: View user inventory.
- `/trading`: Engage in trading activities.
- `/admin`: Access the admin dashboard for item management.

## Project Structure
- `app/`: Contains the application logic.
- `resources/`: Frontend assets including views and styles.
- `routes/`: Application routes.
- `database/`: Database migrations and seeders.