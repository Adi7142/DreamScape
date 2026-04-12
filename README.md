## Klikpad / Demo scenario (end-to-end testen)

Deze stappen zijn bedoeld om de applicatie **van 0 → volledig werkend** te doorlopen en alle features te demonstreren.

### Voorbereiding (eenmalig)
1. Start de app:
   - Terminal 1:
     ```bash
     php artisan serve
     ```
   - Terminal 2:
     ```bash
     npm run dev
     ```

2. Zorg dat roles bestaan (Spatie) en dat je minstens 2 gebruikers hebt:
   - 1x **beheerder**
   - 1x **speler**

   Rollen aanmaken + toekennen kan via:
   ```bash
   php artisan tinker
   ```
   ```php
   use Spatie\Permission\Models\Role;

   Role::firstOrCreate(['name' => 'beheerder']);
   Role::firstOrCreate(['name' => 'speler']);

   // voorbeeld: eerste user beheerder maken
   $admin = \App\Models\User::find(1);
   $admin->assignRole('beheerder');

   // voorbeeld: tweede user speler maken
   $player = \App\Models\User::find(2);
   $player->assignRole('speler');
   ```

---

### Scenario A — Admin: item aanmaken + toekennen aan speler
Doel: aantonen dat de beheerder de catalogus kan beheren én inventory kan vullen.

1. Log in als **beheerder**.
2. Ga naar het admin dashboard:
   - URL: `/admin`

3. Maak een item aan:
   - Klik **Manage Items** of ga naar: `/admin/items`
   - Klik **Add Item** (of `/admin/items/create`)
   - Vul velden in (naam, description, type, rarity, power/speed/durability, magic_property)
   - Klik **Save Item**
   - Controle: item staat nu in de admin items lijst

4. Ken een item toe aan een speler:
   - Ga naar: `/admin/inventory/assign`
   - Kies een **Player** (user met role `speler`)
   - Kies een **Item**
   - Vul **Quantity** in (bv. 2)
   - Klik **Assign Item**
   - Controle: je krijgt een success message en de speler heeft nu dit item in inventory

---

### Scenario B — Speler: item catalogus bekijken + filteren + details
Doel: aantonen dat de speler de catalogus kan doorzoeken en item stats kan bekijken.

1. Log uit als admin.
2. Log in als **speler**.
3. Ga naar de item catalogus:
   - URL: `/items`

4. Test filters:
   - Vul `Search item...` (bv. deel van de naam)
   - Vul `Type` en/of `Rarity`
   - Klik **Filter**
   - Controle: de lijst past zich aan op basis van je filters

5. Open een item detailpagina:
   - Klik **View details**
   - Controle: je ziet alle stats (power/speed/durability/magic_property)

---

### Scenario C — Speler: inventaris bekijken + filteren + sorteren + details
Doel: aantonen dat de speler alleen zijn eigen inventory ziet en kan filteren/sorteren.

1. Ga naar je inventaris:
   - URL: `/inventory`

2. Test inventory filters (zelfde als catalogus):
   - `Search`, `Type`, `Rarity`
   - Klik **Apply**
   - Controle: alleen inventory-items die matchen blijven zichtbaar

3. Test sorteren:
   - Kies `Sort`:
     - `Newest` (latest)
     - `Name`, `Type`, `Rarity` (sorteren op item-velden)
     - `Quantity` (sorteren op inventory veld)
   - Kies `Direction` (Asc/Desc)
   - Klik **Apply**
   - Controle: volgorde verandert correct

4. Open inventory detailpagina:
   - Klik **View details**
   - Controle: je ziet quantity + item stats

---

### Scenario D — Trades: trade sturen + accepteren/weigeren + effect op inventory
Doel: aantonen dat trading werkt en inventory echt verandert.

> Je hebt hiervoor 2 spelers nodig: **Speler A** en **Speler B**.
> Zorg dat Speler A minstens 1 item heeft (via admin assign).

#### D1) Speler A stuurt trade request
1. Log in als **Speler A** (de speler met een item).
2. Ga naar trades:
   - URL: `/trades`
3. Klik **Create trade** (of ga naar `/trades/create`)
4. Kies:
   - Receiver = Speler B
   - Item = een item dat Speler A bezit
5. Klik submit (trade aanmaken)
6. Controle:
   - Trade verschijnt bij **sent trades**
   - Speler B krijgt een notificatie

#### D2) Speler B accepteert of weigert
1. Log uit en log in als **Speler B**.
2. Ga naar `/trades`
3. Bij received trade:
   - Klik **Accept** of **Decline**

**Als Accept:**
- Controleer inventory:
  - Speler B krijgt het item (quantity +1)
  - Speler A verliest het item (quantity -1)
- Controleer notificaties:
  - Speler A ontvangt een notificatie “accepted”

**Als Decline:**
- Inventory verandert niet
- Trade status wordt declined

---

### Scenario E — Notificaties bekijken en afvinken
1. Ga naar notificaties:
   - URL: `/notifications`
2. Je ziet een lijst met notificaties (nieuwste eerst)
3. Klik **mark as read**
4. Controle: notificatie wordt als gelezen opgeslagen (is_read = true)

---

### Snelle checklist (acceptatiecriteria)
- ✅ Gebruiker ziet lijst van items (catalogus + inventory)
- ✅ Items tonen statistieken (item show + inventory show)
- ✅ Inventaris kan gesorteerd worden (sort dropdown + join/orderBy)
- ✅ Admin kan item toevoegen/wijzigen/verwijderen (admin items CRUD)
- ✅ Admin kan items toekennen (inventory assign)
- ✅ Trades werken + inventory update + notificaties
