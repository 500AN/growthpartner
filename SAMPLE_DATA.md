# Sample Growth Programs Data

Copy and paste these into phpMyAdmin when adding new programs.

---

## Example 1: Bronze Tier

**Field Values:**
```
tier_name: Bronze — Essential Start
tier_icon: 🥉
tier_class: bronze
ideal_for: Startups and small businesses looking for foundational support
features: ["Business Setup Consultation", "Basic Marketing Strategy", "Monthly Check-in Call", "Email Support"]
outcome: Solid foundation with essential business tools and guidance.
display_order: 4
is_active: 1
```

---

## Example 2: Diamond Tier

**Field Values:**
```
tier_name: Diamond — Elite Partnership
tier_icon: 💎
tier_class: diamond
ideal_for: Large enterprises seeking comprehensive transformation and market leadership
features: ["Full Business Transformation", "C-Suite Advisory", "Market Expansion Strategy", "Dedicated Account Manager", "24/7 Priority Support", "Quarterly Board Presentations", "Custom Technology Solutions", "International Market Entry Support"]
outcome: Market leadership position with sustainable competitive advantage and exponential growth.
display_order: 0
is_active: 1
```

---

## Example 3: Custom Travel Package

**Field Values:**
```
tier_name: Travel Pro — Complete Agency Setup
tier_icon: ✈️
tier_class: gold
ideal_for: New travel agencies or existing agencies looking to modernize
features: ["IATA/Non-IATA Registration Support", "GDS Training (Amadeus/Galileo/Sabre)", "Supplier Contracting (Hotels, Airlines, DMCs)", "Website Development & Booking Engine", "Social Media Marketing Setup", "Staff Training Program", "CRM Implementation", "First 100 Leads Generation Support"]
outcome: Fully operational travel agency with modern systems and ready-to-convert leads.
display_order: 2
is_active: 1
```

---

## Example 4: Consulting Package

**Field Values:**
```
tier_name: Strategy Sprint — 90-Day Intensive
tier_icon: 🎯
tier_class: platinum
ideal_for: Businesses needing rapid transformation and immediate results
features: ["Week 1-2: Deep Dive Analysis & Strategy Design", "Week 3-6: Implementation & Team Training", "Week 7-10: Optimization & Performance Tuning", "Week 11-12: Results Review & Future Roadmap", "Weekly Strategy Sessions", "Direct Access to Senior Consultants", "Custom Playbooks & Templates"]
outcome: Measurable business transformation in 90 days with clear ROI and sustainable systems.
display_order: 1
is_active: 1
```

---

## Example 5: Seasonal Offer

**Field Values:**
```
tier_name: Summer Special — Growth Accelerator
tier_icon: 🌞
tier_class: emerald
ideal_for: Businesses ready to capitalize on summer season opportunities
features: ["Seasonal Marketing Campaign Design", "Revenue Optimization Strategy", "Staff Productivity Training", "Customer Retention Program", "Limited Time: 20% Discount", "Bonus: Free Social Media Content Calendar"]
outcome: Maximize summer revenue with targeted strategies and ready-to-execute campaigns.
display_order: 5
is_active: 1
```

---

## JSON Format Reference

When entering features in phpMyAdmin, use this exact format:

**Simple Features:**
```json
["Feature 1", "Feature 2", "Feature 3"]
```

**Detailed Features:**
```json
["First-Year Business Plan — clear roadmap, milestones, revenue projections", "Target Achievement Strategy — realistic targets and execution frameworks", "Lead Generation Support — digital + partner channels designed for your niche"]
```

**Multi-line in phpMyAdmin:**
```json
[
  "Feature 1",
  "Feature 2",
  "Feature 3"
]
```

---

## Tips for Writing Effective Program Content

### Tier Names
- Format: `[Icon Emoji] [Tier Name] — [Short Description]`
- Examples: 
  - "🌟 Platinum — Full Growth Leadership"
  - "🏅 Gold — Accelerate & Scale"
  - "💼 Silver — Sales Excellence"

### Ideal For
- Be specific about target audience
- Mention business stage or size
- Include pain points or goals
- Keep it under 100 characters

### Features
- Start with action verbs or outcomes
- Use em dashes (—) for sub-descriptions
- Keep each feature under 150 characters
- Order by importance (most valuable first)

### Outcome
- Focus on transformation, not just deliverables
- Use powerful, benefit-driven language
- Keep it concise (1-2 sentences)
- Make it aspirational yet achievable

---

## Color Scheme Reference

| tier_class | Color Theme | Best For |
|------------|-------------|----------|
| platinum   | Purple      | Premium/Highest tier |
| gold       | Gold/Yellow | High-value tier |
| silver     | Gray        | Standard tier |
| bronze     | Bronze      | Entry tier |
| diamond    | Cyan/Blue   | Ultra-premium |
| emerald    | Green       | Growth-focused |
| ruby       | Red         | Urgent/Limited |
| sapphire   | Purple-Blue | Exclusive |
| black      | Black/Gold  | VIP/Elite |

---

## Quick Copy-Paste SQL (Alternative to phpMyAdmin GUI)

```sql
INSERT INTO growth_programs 
(tier_name, tier_icon, tier_class, ideal_for, features, outcome, display_order, is_active) 
VALUES (
  'Your Program Name',
  '🎯',
  'gold',
  'Your target audience description',
  JSON_ARRAY('Feature 1', 'Feature 2', 'Feature 3'),
  'Your outcome description',
  1,
  1
);
```

Replace the values and run in phpMyAdmin SQL tab.
