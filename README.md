# DreamScape

DreamScape is een Laravel-webapplicatie waarin spelers een **item catalogus** kunnen bekijken, hun **persoonlijke inventaris** kunnen beheren (bekijken, filteren en sorteren), **trades** kunnen sturen/ontvangen en **notificaties** krijgen.  
Beheerders (**beheerder**) kunnen via een admin dashboard de **item catalogus beheren** (toevoegen/wijzigen/verwijderen) en items **toekennen aan spelers**.

---

## Gebruikte technologieën

- **Backend:** PHP 8.x + **Laravel 12**
- **Authenticatie:** Laravel Breeze
- **Frontend:** Blade + Tailwind CSS + Alpine.js
- **Build tooling:** Vite
- **Roles/Permissions:** `spatie/laravel-permission`
- **Database:** standaard SQLite (kan ook MySQL)

---

## Belangrijkste features (functioneel)

### 1) Item Catalogus (Speler)
Spelers kunnen alle items bekijken en filteren.

**Wat kan een speler?**
- Items bekijken in een overzicht
- Filteren op:
  - `search` (naam)
  - `type`
  - `rarity`
- Doorklikken naar een detailpagina met alle statistieken

**Routes**
- `GET /items` → `items.index`
- `GET /items/{item}` → `items.show`

**Controller**
- `app/Http/Controllers/ItemController.php`

---

### 2) Inventaris (Speler)
Spelers kunnen hun **persoonlijke inventaris** bekijken.

**Wat kan een speler?**
- Overzicht van eigen inventory-items (met quantity)
- Filteren op item-gegevens:
  - `search` (naam)
  - `type`
  - `rarity`
- Sorteren op:
  - `latest` (nieuwste eerst)
  - `name`, `type`, `rarity` (item-velden)
  - `quantity` (inventory-veld)
- Detailpagina per inventory entry met item-statistieken

**Routes**
- `GET /inventory` → `inventory.index`
- `GET /inventory/{inventory}` → `inventory.show`

**Controller**
- `app/Http/Controllers/InventoryController.php`

**Belangrijk**
- De tabel heet **`inventory`** (enkelvoud). Daarom heeft het model:
  - `protected $table = 'inventory';` in `app/Models/Inventory.php`

---

### 3) Trading systeem (Speler ↔ Speler)
Spelers kunnen items traden met elkaar.

**Wat kan een speler?**
- Trades zien die ontvangen zijn + trades die zelf verzonden zijn
- Trade request aanmaken naar andere spelers
- Trade accepteren/weigeren
- Bij accept:
  - sender inventory -1
  - receiver inventory +1
  - trade status → `accepted`
  - notificatie naar sender
- Bij decline:
  - trade status → `declined`

**Routes**
- `GET /trades` → `trades.index`
- `GET /trades/create` → `trades.create`
- `POST /trades` → `trades.store`
- `PATCH /trades/{trade}/accept` → `trades.accept`
- `PATCH /trades/{trade}/decline` → `trades.decline`

**Controller**
- `app/Http/Controllers/TradeController.php`

---

### 4) Notificaties
Notificaties worden o.a. gebruikt voor trade-events.

**Wat kan een speler?**
- Notificaties bekijken
- Notificatie markeren als gelezen

**Routes**
- `GET /notifications` → `notifications.index`
- `PATCH /notifications/{notification}/read` → `notifications.read`

**Controller**
- `app/Http/Controllers/NotificationController.php`

---

## Admin (Beheerder)

Admin routes zijn beveiligd met:
- `auth`
- `verified`
- `role:beheerder` (Spatie roles)

### 1) Admin Dashboard
Toont statistieken:
- aantal users
- aantal items
- aantal trades

**Route**
- `GET /admin` → `admin.dashboard`

**Controller**
- `app/Http/Controllers/Admin/AdminController.php`

---

### 2) Item catalogus beheren (CRUD)
Beheerder kan:
- item toevoegen
- item wijzigen
- item verwijderen
- item-statistieken aanpassen (power/speed/durability/magic_property)

**Routes**
- `GET /admin/items` → `admin.items.index`
- `GET /admin/items/create` → `admin.items.create`
- `POST /admin/items` → `admin.items.store`
- `GET /admin/items/{item}/edit` → `admin.items.edit`
- `PATCH /admin/items/{item}` → `admin.items.update`
- `DELETE /admin/items/{item}` → `admin.items.destroy`

**Controller**
- `app/Http/Controllers/Admin/AdminItemController.php`

---

### 3) Item toekennen aan speler (Inventory assign)
Beheerder kan een item aan een speler geven.
- Bestaat het item al in inventory? → dan wordt `quantity` verhoogd.

**Routes**
- `GET /admin/inventory/assign` → `admin.inventory.assign.create`
- `POST /admin/inventory/assign` → `admin.inventory.assign.store`

**Controller**
- `app/Http/Controllers/Admin/AdminInventoryController.php`

---

## Datamodel (overzicht)

### Item (`items`)
Velden:
- `name`, `description`, `type`, `rarity`
- `power`, `speed`, `durability`, `magic_property`

Model: `app/Models/Item.php`

### Inventory (`inventory`)
Velden:
- `user_id`, `item_id`, `quantity`

Model: `app/Models/Inventory.php`

### Trade (`trades`)
Velden:
- `sender_id`, `receiver_id`, `item_id`, `status`

Model: `app/Models/Trade.php`

### User (`users`)
Gebruikt Spatie roles:
- `speler`
- `beheerder`

Model: `app/Models/User.php`

---

## Installatie / Runnen (lokaal)

### Vereisten
- PHP 8.2+ (Laravel 12)
- Composer
- Node.js + npm

### Stappen
1. Dependencies installeren:
```bash
composer install
npm install
```

2. `.env` maken:
```bash
cp .env.example .env
php artisan key:generate
```

3. Database (standaard SQLite):
```bash
touch database/database.sqlite
php artisan migrate
```

4. Frontend assets:
```bash
npm run dev
```
(of productie build: `npm run build`)

5. App starten:
```bash
php artisan serve
```

---

## Rollen (Spatie)
Admin gedeelte vereist role **beheerder**.

Voorbeeld via tinker:
```bash
php artisan tinker
```

```php
use Spatie\Permission\Models\Role;

Role::firstOrCreate(['name' => 'beheerder']);
Role::firstOrCreate(['name' => 'speler']);

$user = \App\Models\User::first();
$user->assignRole('beheerder');
```

---

## Projectstructuur (globaal)

- `routes/web.php` — routes voor speler + admin
- `app/Http/Controllers/` — controllers voor items, inventory, trades, notifications
- `app/Http/Controllers/Admin/` — admin controllers
- `app/Models/` — models (Item, Inventory, Trade, User, Notification)
- `resources/views/` — Blade views (items, inventory, admin, trades, notifications)

---

## Licentie
School/educatief project.
