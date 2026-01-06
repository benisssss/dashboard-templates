document.querySelectorAll('.modal.gsap_animate').forEach((modalEl) => {
    const modalBody = modalEl.querySelector('.modal-body');
    const footerButtons = modalEl.querySelectorAll('.modal-footer button');
    const closeButton = modalEl.querySelector('.btn-close');

    let isHiding = false;

    // Before modal shows: reset body height and hide buttons
    modalEl.addEventListener('show.bs.modal', () => {
        if (modalBody) gsap.set(modalBody, { height: 0 });
        gsap.set([...footerButtons, closeButton], { opacity: 0, y: -10 });
    });

    // After modal shown: animate body and then buttons
    modalEl.addEventListener('shown.bs.modal', () => {
        if (!modalBody) return;
        const tl = gsap.timeline();
        tl.to(modalBody, { duration: 0.2, height: modalBody.scrollHeight, ease: "power3.out" })
            .to([...footerButtons, closeButton],
                { duration: 0.3, opacity: 1, y: 0, stagger: 0.1, ease: "power3.out" },
                ">");
    });

    // Animate hiding
    modalEl.addEventListener('hide.bs.modal', (e) => {
        if (isHiding) return;
        e.preventDefault();
        isHiding = true;

        const tl = gsap.timeline({
            onComplete: () => {
                bootstrap.Modal.getInstance(modalEl).hide();
                isHiding = false;
            }
        });

        tl.to([...footerButtons, closeButton], { duration: 0.2, opacity: 0, y: -10, stagger: 0.05, ease: "power3.in" })
            .to(modalBody, { duration: 0.4, height: 0, ease: "power3.in" }, ">");
    });
});