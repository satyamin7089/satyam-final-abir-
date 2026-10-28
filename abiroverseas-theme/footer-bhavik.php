<?php
/**
 * Standalone Footer Two — Dedicated to Bhavik Enterprises (get_footer( 'bhavik' )).
 *
 * Completely independent from global footer.php for easy management,
 * while preserving the exact same 4-column visual layout and Abiroverseas white logo
 * with same-page (#anchor) navigation links and Bhavik's Kanpur / Mumbai / Mundra details.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<footer class="ab-footer">
  <div class="ab-wrap">
    <div class="ab-footer-layout">
      <div class="ab-footer-brand">
        <a class="ab-logo-slot ab-footer-logo" href="#bv-hero" aria-label="Bhavik Enterprises — back to top">
          <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/10/Abir-Logo_white-textr-1.png' ) ); ?>" alt="Abiroverseas logo" onerror="this.hidden=true;this.parentElement.classList.add('logo-missing')">
        </a>
        <p>Authorised distributor of Abiroverseas LLC in India — Village Barhat Bangar, Mandhana Bithoor Road, Kanpur – 209217, UP, India. Head Office: Kanpur · Branches: Mumbai, Mundra.</p>
        <div class="ab-footer-contact">
          <span>
            <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-mail" /></svg>
            Email: <a href="mailto:info@bhavikenterprises.com" class="ab-footer-contact-link">info@bhavikenterprises.com</a>
          </span>
          <span>
            <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-phone" /></svg>
            Phone: <a href="tel:+917007049478" class="ab-footer-contact-link">+91 7007049478</a>
          </span>
          <span class="ab-footer-whatsapp-line">
            <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-whatsapp" /></svg>
            WhatsApp: <a href="https://wa.me/917007049478" class="ab-footer-contact-link ab-footer-whatsapp" target="_blank" rel="noopener noreferrer">+91 7007049478</a>
          </span>
        </div>
      </div>
      <nav class="ab-footer-nav" aria-label="Bhavik footer product navigation">
        <strong>Explore</strong>
        <a href="#why-bhavik">Why Choose Us</a>
        <a href="#products">Products</a>
        <a href="#industries">Industries</a>
        <a href="#the-way">How We Work</a>
      </nav>
      <nav class="ab-footer-nav" aria-label="Bhavik footer company navigation">
        <strong>Company</strong>
        <a href="#bv-hero">Home</a>
        <a href="#about">About Us</a>
        <a href="#faqs">FAQs</a>
        <a href="#quick-enquiry">Contact</a>
        <a href="#bhavik-enquiry-form">Enquiry Form</a>
      </nav>
      <div class="ab-footer-action">
        <strong>Have a material requirement?</strong>
        <p>Start with the polymer grade, processing method and delivery city you need.</p>
        <a class="ab-btn" href="#quick-enquiry">REQUEST A QUOTE <svg class="ab-icon" aria-hidden="true"><use href="#ab-icon-arrow" /></svg></a>
      </div>
    </div>
    <div class="ab-footer-bottom">
      <span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Bhavik Enterprises · Authorised Distributor of Abiroverseas LLC.</span>
      <span>Design and Development by <a href="https://asrsbot.com/" style="font-weight:700; color:#82969f !important;">ASRSBot Technology</a></span>
    </div>
  </div>
</footer>
<button class="ab-scroll-top" type="button" aria-label="Scroll to top" title="Back to top">
  <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
    <path d="M12 19V5M6 11l6-6 6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
  </svg>
</button>
<?php wp_footer(); ?>
</body>
</html>
