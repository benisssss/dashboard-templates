// Calculate midnight timestamp
const now = new Date();
const midnight = new Date();
midnight.setHours(24, 0, 0, 0); // next midnight
const expireTime = midnight.getTime();

// Get stored timestamp
const storedExpiry = localStorage.getItem(`${SYSTEM_NAME}_animation_expiry`);

const tl = gsap.timeline();

if (!storedExpiry || now.getTime() > storedExpiry) {
    // Navbar timeline
    const navbarTl = gsap.timeline();
    navbarTl.to(".navbar-brand", { x: 0, opacity: 1, duration: 1, ease: "power3.out" })
        .to(".navbar-nav .nav-link, .navbar-nav .btn", { y: 0, opacity: 1, duration: 0.6, stagger: 0.15, ease: "power2.out" }, "-=0.6");

    // Footer timeline
    const footerTl = gsap.timeline();
    footerTl.to(".system-footer .row.p-2.align-items-end > div", { x: 0, opacity: 1, duration: 0.8, stagger: 0.25, ease: "power3.out" })
        .to(".system-footer .row.p-2.align-items-end span, .system-footer .row.p-2.align-items-end h2", { x: 0, opacity: 1, duration: 0.6, stagger: 0.15, ease: "power2.out" }, "-=0.4");

    // Add them to main timeline at the same start time
    tl.add(navbarTl, 0).add(footerTl, 0);

    // Mark animation done and set expiry timestamp
    localStorage.setItem(`${SYSTEM_NAME}_animation_expiry`, expireTime);
} else {
    // Skip animation: instantly set navbar & footer
    gsap.set(".navbar-brand, .navbar-nav .nav-link, .navbar-nav .btn, .system-footer .row.p-2.align-items-end > div, .system-footer .row.p-2.align-items-end span, .system-footer .row.p-2.align-items-end h2", { opacity: 1, x: 0, y: 0 });

}

// --- Wrapper (always animate) ---
// these cards might be good to just be animated via aos
tl.to(".system-wrapper .wrapper-card .card, .card-animate", { y: 0, opacity: 1, duration: 0.3, stagger: 0.05, ease: "power2.out" });
