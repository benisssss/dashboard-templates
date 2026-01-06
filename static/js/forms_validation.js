var forms = document.querySelectorAll('.needs-validation');
forms.forEach(function (form) {
    let callbackName = form.dataset.submitCallback;
    let callback = window[callbackName]; // look up function globally

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        event.stopPropagation();

        // Check validity first
        if (!form.checkValidity()) {
            form.classList.add('was-validated'); // show feedback
            return; // stop execution, do not run callback
        }

        // Valid form  add feedback class (optional)
        form.classList.add('was-validated');

        // --- Run form-specific callback ---
        if (typeof callback === 'function') {
            callback(form);
        }
    }, false);
});