function document_theme_apply(theme) {
    // can handle:
    // system-wrapper
    // dropdown-menu
    // datatable column control

    const wrapper = document.querySelector('body');
    if (wrapper) {
        wrapper.setAttribute('data-bs-theme', theme);
    }
    const dropdowns = document.querySelectorAll('.dropdown-menu');
    dropdowns.forEach(function (dropdown) {
        if (theme == 'light') {
            dropdown.classList.remove('dropdown-menu-dark');
        } else {
            dropdown.classList.add('dropdown-menu-dark');
        }
    });
    applyApexTheme();
}

function set_theme() {
    // get session variable, default to 'light'
    let theme = localStorage.getItem(`${SYSTEM_NAME}_theme_mode`) || 'light';
    document_theme_apply(theme);
}

function toggle_theme() {
    // get session variable, default to 'light'
    let theme = localStorage.getItem(`${SYSTEM_NAME}_theme_mode`) || 'light';

    if (theme == 'light') {
        theme = 'dark';
    } else {
        theme = 'light';
    }
    localStorage.setItem(`${SYSTEM_NAME}_theme_mode`, theme);
    document_theme_apply(theme);
}