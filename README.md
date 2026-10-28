# Abiroverseas Polymer Materials — WordPress Theme (`v1.5.6`)

Repository for the custom WordPress theme **`abiroverseas-theme/`**, built for **Abiroverseas LLC** and its authorised India distributor landing page (**Bhavik Enterprises**).

> Full theme files live inside [`abiroverseas-theme/`](./abiroverseas-theme/) (also mirrored in `abiroverseas-theme/abiroverseas-theme/` for direct zip packaging). Read below for the complete architecture and flow in one pass.

---

## 1. High-Level Theme Flow (How Every Page Works)

```text
Incoming WordPress URL
        │
        ├──► Global Pages & Knowledge Center
        │       1. Loads header.php        (Global topbar + Appearance → Menus primary nav + SVG sprite)
        │       2. Runs Page / CPT Template (e.g., template-home.php, template-product-range.php, single-knowledge.php)
        │       3. Enqueues ONLY that page's CSS + JS (via ab_enqueue_assets() in functions.php) + site.css + navigation.js
        │       4. Loads footer.php        (Global 4-column Abiroverseas footer + scroll-to-top button)
        │
        └──► Bhavik Enterprises (/bhavik-enterprises/)
                1. Loads header-bhavik.php (Standalone Header Two — same visual layout & logo, #anchor nav, India contact bar)
                2. Runs page-template/template-bhavik-enterprises.php
                3. Enqueues ONLY bhavik.css + bhavik.js + site.css + navigation.js
                4. Loads footer-bhavik.php (Standalone Footer Two — same 4-column layout & white logo, Kanpur/Mumbai/Mundra details)
```

---

## 2. Directory Structure

```text
abiroverseas-theme/
├── style.css                                   # WordPress theme header metadata (v1.5.3)
├── functions.php                               # Theme setup, per-page CSS/JS enqueue, CPT/taxonomies, SEO/FAQ meta, enquiry handler
├── header.php                                  # Global Header One (Abiroverseas LLC sitewide navigation & SVG icon sprite)
├── footer.php                                  # Global Footer One (Abiroverseas LLC 4-column footer)
├── header-bhavik.php                           # Standalone Header Two — dedicated to Bhavik Enterprises (get_header('bhavik'))
├── footer-bhavik.php                           # Standalone Footer Two — dedicated to Bhavik Enterprises (get_footer('bhavik'))
├── page.php / index.php                        # Fallback standard WordPress page & index templates
├── archive-knowledge.php                       # Knowledge Center hub (/knowledge/) with search & taxonomy filters
├── single-knowledge.php                        # Single Knowledge Center article (/knowledge/{slug}/)
├── taxonomy-knowledge_hub.php                  # Knowledge Hub taxonomy archive
├── taxonomy-knowledge_material.php             # Knowledge Material taxonomy archive
├── taxonomy-knowledge_topic.php                # Knowledge Topic taxonomy archive
├── inc/
│   └── default-content.php                     # Starter page definitions & default SEO/FAQ metadata seeded once on activation
├── page-template/
│   ├── template-home.php                       # Front Page / Home
│   ├── template-about.php                      # About Us (/about/)
│   ├── template-contact.php                    # Contact Us (/contact-us/)
│   ├── template-product-families.php           # Product Families 6-card searchable directory (/products/)
│   ├── template-product-range.php              # Product Range 12-card 2x2 3D borderless directory (/product-range/)
│   ├── template-bhavik-enterprises.php         # Bhavik Enterprises standalone distributor page (/bhavik-enterprises/)
│   ├── template-material.php                   # HDPE Material Page (/hdpe/)
│   ├── template-material-LDPE.php              # LDPE Material Page (/ldpe/)
│   ├── template-material-PP.php                # Polypropylene (PP) Material Page (/pp/)
│   ├── template-material-PVC.php               # PVC Material Page (/pvc/)
│   ├── template-material-PS.php                # Polystyrene (PS) Material Page (/ps/)
│   ├── template-material-ABS.php               # ABS Material Page (/abs/)
│   ├── template-material-EVA.php               # EVA Material Page (/eva/)
│   └── template-material-Recycled-Plastics.php # Recycled Plastics Material Page (/recycled-plastics/)
└── assets/
    ├── css/
    │   ├── home.css                            # Isolated styles for Home page ONLY
    │   ├── about.css                           # Isolated styles for About Us page ONLY
    │   ├── contact.css                         # Isolated styles for Contact Us page ONLY
    │   ├── products.css                        # Isolated styles for Product Families & 2x2 Product Range ONLY
    │   ├── material.css                        # Isolated styles for the 8 Material pages ONLY
    │   ├── knowledge.css                       # Isolated styles for Knowledge Center archive & articles ONLY
    │   ├── bhavik.css                          # Isolated styles for Bhavik Enterprises page ONLY
    │   ├── site.css                            # Shared header, topbar, mobile nav, 4-column footer & scroll-to-top ONLY
    │   └── knowledge-admin.css                 # WP Admin meta box styles for Knowledge Center editor
    ├── js/
    │   ├── navigation.js                       # Shared mobile drawer & scroll-to-top controller (loaded on every page)
    │   ├── home.js                             # Home hero photo slider & scroll reveal
    │   ├── about.js                            # About scroll reveal & FAQ category tabs
    │   ├── products.js                         # Live instant client-side search filter for Product Families & Product Range
    │   ├── material.js                         # Material gallery carousel & scroll reveal
    │   ├── bhavik.js                           # Bhavik Enterprises scroll reveal controller
    │   ├── knowledge-hub.js                    # Knowledge Hub filter interactions
    │   ├── knowledge-single.js                 # Single Knowledge article TOC / interactions
    │   └── knowledge-admin.js                  # WP Admin repeater & rich-text controls
    └── img/                                    # Bundled polymer & industrial photography assets
```

---

## 3. Strict Per-Page CSS & JS Isolation

**Every page type has its own dedicated CSS file.** Page-specific card and section styles are never mixed into `site.css` or shared across unrelated templates:

| Page / Route | PHP Template | Dedicated CSS | Dedicated JS | Header / Footer |
| :--- | :--- | :--- | :--- | :--- |
| **Home** (`/`) | `page-template/template-home.php` | `home.css` | `home.js` | `header.php` / `footer.php` |
| **About Us** (`/about/`) | `page-template/template-about.php` | `about.css` | `about.js` | `header.php` / `footer.php` |
| **Contact Us** (`/contact-us/`) | `page-template/template-contact.php` | `contact.css` | — | `header.php` / `footer.php` |
| **Product Families** (`/products/`) | `page-template/template-product-families.php` | `products.css` | `products.js` | `header.php` / `footer.php` |
| **Product Range** (`/product-range/`) | `page-template/template-product-range.php` | `products.css` | `products.js` | `header.php` / `footer.php` |
| **Material Pages** (`/hdpe/`, `/pp/`, `/ldpe/`, `/pvc/`, `/ps/`, `/abs/`, `/eva/`, `/recycled-plastics/`) | `page-template/template-material*.php` | `material.css` | `material.js` | `header.php` / `footer.php` |
| **Knowledge Hub** (`/knowledge/` & taxonomies) | `archive-knowledge.php`, `taxonomy-*.php` | `knowledge.css` | `knowledge-hub.js` | `header.php` / `footer.php` |
| **Knowledge Article** (`/knowledge/{slug}/`) | `single-knowledge.php` | `knowledge.css` | `knowledge-single.js` | `header.php` / `footer.php` |
| **Bhavik Enterprises** (`/bhavik-enterprises/`) | `page-template/template-bhavik-enterprises.php` | `bhavik.css` | `bhavik.js` | `header-bhavik.php` / `footer-bhavik.php` |

---

## 4. Separate Headers & Footers (Global vs Bhavik Enterprises)

- **Global (`header.php` + `footer.php`):** Used on all main Abiroverseas pages and Knowledge Center views. Renders the WordPress `primary` navigation menu and Abiroverseas LLC contact details (`info@abiroverseas.com`, `+1 (856) 523 3366`).
- **Bhavik Enterprises (`header-bhavik.php` + `footer-bhavik.php`):** Standalone files called via `get_header( 'bhavik' )` and `get_footer( 'bhavik' )` in `template-bhavik-enterprises.php`. Preserves the exact same visual layout and Abiroverseas logos while routing links to same-page `#anchor` sections and displaying Bhavik's India contact & presence details:
  - **Address:** Village Barhat Bangar, Mandhana Bithoor Road, Kanpur – 209217, UP, India
  - **Phone / WhatsApp:** `+91 7007049478`
  - **Email:** `info@bhavikenterprises.com`
  - **Our Presence:** **Head Office:** Kanpur | **Branches:** Mumbai, Mundra

---

## 5. Design System Highlights

- **Borderless 3D Orange Buttons Sitewide:** All buttons across every stylesheet use the orange accent gradient (`#ff9238 → #f58220 → #e26d0c`), white text, **`border: 0`**, and layered 3D shadows.
- **2×2 Product Range 3D Cards (`products.css`):** Styled in a 2×2 grid (`repeat(2, minmax(0, 1fr))` on desktop/tablet, `1fr` on mobile) matching the sculptural borderless 3D image-card aesthetic of Bhavik's *Industries We Serve* cards, with two separate 3D orange CTA buttons (`Explore <Material>` + `Enquire Now`) on every card, isolated strictly inside `products.css`.
- **Tinted 3D FAQ Boxes on Bhavik (`bhavik.css`):** Each `<details class="ab-faq-item">` box features a soft sage-teal 3D surface, accent indicator bar, 3D rotating trigger button, and recessed white answer container.
- **Native WordPress Forms & SEO:** All enquiry forms post through `admin-post.php` (`ab_material_enquiry` in `functions.php`) with nonce + honeypot protection; SEO meta and `FAQPage` JSON-LD schema work out-of-the-box without external paid plugins.
