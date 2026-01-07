<?php
// constants
include '../../api/common/system_consts.php';
include '../../api/common/sessions.php';
// connections, misc stuff for render
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Template Dashboard</title>
    <link rel="icon" href="<?php echo $system; ?>/static/img/logo.png" type="image/x-icon">
    <?php
    include '../../api/common/imports.php';
    load_css_import();
    ?>
</head>

<body>
    <div class="d-flex flex-column" style="min-height: 100vh;">
        <div class="system-nav">
            <div id="system-nav-particles"
                style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:99;pointer-events:none;"></div>
            <?php include '../reusable/dashboard/logged_in.php'; ?>
        </div>

        <div class="system-wrapper p-1">
            <div id="particles-js-mobile-banner-submit-form"
                style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:0;"></div>

            <div class="card wrapper-card m-0 p-1 w-100 flex-grow-1 border rounded border-info position-relative">
                <?php include 'main.php'; ?>
            </div>
        </div>
        <div class="system-footer bg-navy overflow-hidden">
            <div id="system-footer-particles" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:0;">
            </div>
            <?php include '../reusable/footer/footer.php'; ?>
        </div>
    </div>
    <?php
        load_js_import();
    ?>

    <script>
        if (typeof window.SYSTEM_NAME === 'undefined') window.SYSTEM_NAME = `<?php echo $system; ?>`.replace('/', '');
        if (typeof window.CURRENT_PAGE === 'undefined') window.CURRENT_PAGE = 'dashboard';
        if (typeof window.APEX_CHARTS === 'undefined') window.APEX_CHARTS = [];
        if (typeof window.TOAST === 'undefined') window.TOAST = null;

        <?php include '../../static/js/theme_configuration.js'; ?>

        <?php include '../../static/js/apexchart_theme_switcher.js'; ?>

        // sparkle
        document.addEventListener('DOMContentLoaded', function () {
            <?php include '../../static/js/onload_gsap.js'; ?>

            particlesJS.load('system-nav-particles', '<?php echo $system; ?>/static/config/particlejs-config-nav.json', function () {
                return 0;
            });
            particlesJS.load('system-footer-particles', '<?php echo $system; ?>/static/config/particlejs-config-footer.json', function () {
                return 0;
            });

            set_theme();

            applyApexTheme();

            <?php include '../../static/js/datatable_button_initialize.js'; ?>

            <?php include '../../static/js/forms_validation.js'; ?>

            <?php include '../../static/js/modal_open_animation.js'; ?>

            <?php include '../../static/js/popovers.js'; ?>

            <?php include '../../static/js/swal_toast_notification.js'; ?>

            <?php include '../../api/common/notification_handler.php'; ?>

        });
    </script>
</body>
</html>
