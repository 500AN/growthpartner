-- Create database
CREATE DATABASE IF NOT EXISTS growth_partner_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE growth_partner_db;

-- Create growth_programs table
CREATE TABLE IF NOT EXISTS growth_programs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tier_name VARCHAR(255) NOT NULL,
    tier_icon VARCHAR(50) NOT NULL,
    tier_class VARCHAR(50) NOT NULL,
    ideal_for TEXT NOT NULL,
    features JSON NOT NULL,
    outcome TEXT NOT NULL,
    display_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert initial data
INSERT INTO growth_programs (tier_name, tier_icon, tier_class, ideal_for, features, outcome, display_order) VALUES
(
    'Platinum — Full Growth Leadership Program',
    '🌟',
    'platinum',
    'New or scaling travel businesses that want structured growth with expert guidance.',
    JSON_ARRAY(
        'First-Year Business Plan — clear roadmap, milestones, revenue projections.',
        'Target Achievement Strategy — realistic targets and execution frameworks.',
        'Lead Generation Support — digital + partner channels designed for your niche.',
        'Product Development — curated travel products, packages, and pricing strategy.',
        'Website Content Support — structure, messaging, and SEO-ready guidance.',
        'Vendor Contracting & Agreements — negotiation support + best-practice templates.',
        'Staff Training & Skill Development — process, sales, service excellence.',
        'In-House Business Review — two sessions per month, 4 hours each: performance analysis, gap fixing, and monthly action plans.'
    ),
    'A fully structured, professionally guided business built to scale — with ongoing hand-holding.',
    1
),
(
    'Gold — Accelerate & Scale Program',
    '🏅',
    'gold',
    'Established enterprises ready to expand and diversify.',
    JSON_ARRAY(
        'New Product Lines & Service Verticals',
        'Business Scaling Strategy',
        'Revenue Growth Plan — target 1.5× current revenue, with 50% of growth coming from new verticals',
        'Team Upskilling & Advanced Training (sales, digital, product, operations)'
    ),
    'Stronger portfolio, diversified revenue streams, and confident expansion.',
    2
),
(
    'Silver — Sales & Destination Excellence',
    '💼',
    'silver',
    'Teams needing sharper skills and destination knowledge.',
    JSON_ARRAY(
        'Professional Selling Skills Training',
        'Training on New & Emerging Destinations (positioning, itineraries, pricing, objection-handling)'
    ),
    'Confident teams who convert more enquiries into bookings.',
    3
);
