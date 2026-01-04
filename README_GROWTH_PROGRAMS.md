# Growth Programs Management Guide

## Overview
The Growth Programs section displays beautiful, tiered service packages on your services page. You can easily add, edit, or remove programs directly through phpMyAdmin.

## Database Setup

### Step 1: Import the Database
1. Open phpMyAdmin in your browser (usually `http://localhost/phpmyadmin`)
2. Click on "Import" tab
3. Choose the file: `database/growth_programs.sql`
4. Click "Go" to import

This will create:
- Database: `growth_partner_db`
- Table: `growth_programs`
- 3 initial programs (Platinum, Gold, Silver)

### Step 2: Configure Database Connection
Edit `api/growth-programs.php` and update these lines if needed:

```php
$host = 'localhost';        // Your database host
$dbname = 'growth_partner_db';  // Database name
$username = 'root';         // Your MySQL username
$password = '';             // Your MySQL password
```

## Table Structure

### `growth_programs` Table Columns:

| Column | Type | Description |
|--------|------|-------------|
| `id` | INT | Auto-increment primary key |
| `tier_name` | VARCHAR(255) | Program name (e.g., "Platinum — Full Growth Leadership Program") |
| `tier_icon` | VARCHAR(50) | Emoji icon (e.g., "🌟", "🏅", "💼") |
| `tier_class` | VARCHAR(50) | CSS class for styling: `platinum`, `gold`, or `silver` |
| `ideal_for` | TEXT | Description of ideal customer |
| `features` | JSON | Array of features/benefits |
| `outcome` | TEXT | Expected outcome description |
| `display_order` | INT | Order of display (lower numbers appear first) |
| `is_active` | TINYINT(1) | 1 = visible, 0 = hidden |
| `created_at` | TIMESTAMP | Auto-generated creation time |
| `updated_at` | TIMESTAMP | Auto-updated modification time |

## Managing Programs via phpMyAdmin

### Adding a New Program

1. Open phpMyAdmin → Select `growth_partner_db` → Click on `growth_programs` table
2. Click "Insert" tab
3. Fill in the fields:

**Example:**
```
tier_name: Bronze — Starter Package
tier_icon: 🥉
tier_class: bronze
ideal_for: Small businesses just getting started
features: ["Feature 1", "Feature 2", "Feature 3"]
outcome: Quick start with essential tools
display_order: 4
is_active: 1
```

**Important:** For the `features` field, use JSON array format:
```json
["Feature 1", "Feature 2", "Feature 3"]
```

### Editing a Program

1. Go to `growth_programs` table
2. Click "Edit" (pencil icon) next to the program you want to modify
3. Update any fields
4. Click "Go" to save

### Hiding/Showing a Program

- Set `is_active` to `0` to hide
- Set `is_active` to `1` to show

### Deleting a Program

**Soft Delete (Recommended):**
- Set `is_active` to `0` (hides but keeps data)

**Hard Delete:**
- Click "Delete" (X icon) next to the program
- Confirm deletion (permanently removes data)

### Reordering Programs

Change the `display_order` value:
- Lower numbers appear first (1, 2, 3...)
- Programs are sorted ascending by this value

## Available CSS Classes

Use these values for `tier_class` to get different color schemes:

| Class | Color Scheme | Best For |
|-------|--------------|----------|
| `platinum` | Purple gradient | Premium/highest tier |
| `gold` | Gold/yellow gradient | Mid-high tier |
| `silver` | Gray gradient | Standard tier |
| `bronze` | Bronze/brown gradient | Entry tier |

You can also use custom classes and add CSS in `services.html`.

## JSON Format for Features

The `features` column must be valid JSON array format:

**Correct:**
```json
["First feature", "Second feature", "Third feature"]
```

**Incorrect:**
```
First feature, Second feature
```

### Multi-line Features Example:
```json
[
  "First-Year Business Plan — clear roadmap, milestones, revenue projections",
  "Target Achievement Strategy — realistic targets and execution frameworks",
  "Lead Generation Support — digital + partner channels designed for your niche"
]
```

## Testing

After making changes in phpMyAdmin:

1. Open your website: `services.html`
2. Scroll to "Structured Programs for Every Stage" section
3. Changes should appear immediately (refresh if needed)

## Troubleshooting

### Programs Not Showing?

1. **Check database connection:**
   - Verify credentials in `api/growth-programs.php`
   - Ensure MySQL server is running

2. **Check is_active status:**
   - Make sure `is_active = 1` for programs you want to display

3. **Check JSON format:**
   - Features must be valid JSON array
   - Use phpMyAdmin's JSON validator

4. **Check browser console:**
   - Open Developer Tools (F12)
   - Look for errors in Console tab

### Fallback Content

If the API fails to load, the page will display default static content (Platinum, Gold, Silver programs) so your page never looks broken.

## Quick Reference: SQL Queries

### View All Active Programs
```sql
SELECT * FROM growth_programs WHERE is_active = 1 ORDER BY display_order;
```

### Hide a Program
```sql
UPDATE growth_programs SET is_active = 0 WHERE id = 1;
```

### Change Display Order
```sql
UPDATE growth_programs SET display_order = 1 WHERE id = 3;
```

### Add New Program (SQL)
```sql
INSERT INTO growth_programs 
(tier_name, tier_icon, tier_class, ideal_for, features, outcome, display_order, is_active) 
VALUES (
  'Bronze — Starter Package',
  '🥉',
  'bronze',
  'Small businesses just getting started',
  JSON_ARRAY('Feature 1', 'Feature 2', 'Feature 3'),
  'Quick start with essential tools',
  4,
  1
);
```

## File Structure

```
your-website/
├── api/
│   └── growth-programs.php      # API endpoint for fetching programs
├── database/
│   └── growth_programs.sql      # Database setup file
├── js/
│   └── script.js                # Contains loadGrowthPrograms() function
└── services.html                # Displays the programs
```

## Support

If you encounter issues:
1. Check phpMyAdmin for database errors
2. Verify JSON format in features column
3. Check browser console for JavaScript errors
4. Ensure MySQL and Apache are running (XAMPP/WAMP)

---

**Note:** The system includes fallback static content, so even if the database connection fails, your visitors will still see the default programs.
