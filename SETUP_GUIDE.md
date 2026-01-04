# Quick Setup Guide - Growth Programs

## 🚀 5-Minute Setup

### Step 1: Import Database (2 minutes)
1. Start XAMPP/WAMP (Apache + MySQL)
2. Open phpMyAdmin: `http://localhost/phpmyadmin`
3. Click "Import" → Choose `database/growth_programs.sql` → Click "Go"
4. Done! Database and table created with 3 sample programs

### Step 2: Configure API (1 minute)
1. Open `api/growth-programs.php`
2. Update database credentials if needed (lines 7-10):
   ```php
   $host = 'localhost';
   $dbname = 'growth_partner_db';
   $username = 'root';
   $password = '';
   ```
3. Save the file

### Step 3: Test (1 minute)
1. Open `services.html` in your browser
2. Scroll to "Structured Programs for Every Stage"
3. You should see 3 beautiful program cards (Platinum, Gold, Silver)

### Step 4: Customize (1 minute)
1. Open phpMyAdmin → `growth_partner_db` → `growth_programs` table
2. Click "Edit" on any program
3. Modify text, add features, change order
4. Refresh `services.html` to see changes



## ✅ That's It!

Your growth programs section is now live and manageable through phpMyAdmin.

---

## 📝 Common Tasks

### Add a New Program
1. phpMyAdmin → `growth_programs` → "Insert"
2. Fill in:
   - `tier_name`: "Your Program Name"
   - `tier_icon`: "🎯" (any emoji)
   - `tier_class`: "platinum" / "gold" / "silver"
   - `ideal_for`: "Description of target customer"
   - `features`: `["Feature 1", "Feature 2"]` (JSON format)
   - `outcome`: "Expected result"
   - `display_order`: 1, 2, 3... (lower = shows first)
   - `is_active`: 1 (visible) or 0 (hidden)

### Hide a Program
- Set `is_active` to `0`

### Reorder Programs
- Change `display_order` numbers (1 = first, 2 = second, etc.)

---

## 🎨 Available Styles

| tier_class | Color |
|------------|-------|
| platinum   | Purple |
| gold       | Gold |
| silver     | Gray |

---

## ⚠️ Important Notes

1. **Features must be JSON format:**
   ```json
   ["Feature 1", "Feature 2", "Feature 3"]
   ```

2. **If API fails:** Static fallback content will display automatically

3. **No admin panel needed:** Manage everything in phpMyAdmin

---

For detailed documentation, see `README_GROWTH_PROGRAMS.md`
