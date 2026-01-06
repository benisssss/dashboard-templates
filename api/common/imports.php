<?php
    function load_css_import() {
        global $system;
        $time = time();
        echo <<<HTML
        <!-- CSS -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="{$system}/plugins/animatecss-4.1.1/animate.min.css">
            <link rel="stylesheet" href="{$system}/plugins/aos-master-2.3.1/dist/aos.css">
            <link rel="stylesheet" href="{$system}/plugins/apexcharts.js-5.3.0/dist/apexcharts.css">
            <link rel="stylesheet" href="{$system}/plugins/bootstrap-5.3.8/css/bootstrap.min.css">
            <link rel="stylesheet" href="{$system}/plugins/datatables-bs5/datatables.min.css">
            <link rel="stylesheet" href="{$system}/plugins/sweetalert2-11.23.0/dist/sweetalert2.min.css">
            <link rel="stylesheet" href="{$system}/static/css/global.css?v={$time}">
            <link rel="stylesheet" href="{$system}/static/css/system.css?v={$time}">
            <link rel="stylesheet" href="{$system}/plugins/fontawesome-free-7.0.1-web\css\all.css">
            <link rel="stylesheet" href="{$system}/plugins/toastui-editor-3.2.2/toastui-editor.min.css">
        HTML;
    }
    function load_js_import() {
        global $system;
        echo <<<HTML
            <!-- JS -->
            <script src="{$system}/plugins/aos-master-2.3.1/dist/aos.js"></script>
            <script src="{$system}/plugins/apexcharts.js-5.3.0/dist/apexcharts.min.js"></script>
            <script src="{$system}/plugins/bootstrap-5.3.8/js/bootstrap.bundle.min.js"></script>
            <script src="{$system}/plugins/datatables-bs5/datatables.min.js"></script>
            <script src="{$system}/plugins/gsap-public-3.13.0/minified/gsap.min.js"></script>
            <script src="{$system}/plugins/sweetalert2-11.23.0/dist/sweetalert2.min.js"></script>
            <script src="{$system}/plugins/particles.js-master/particles.js"></script>
            <script src="{$system}/plugins/sparkline-2.1.2/jquery.sparkline.min.js"></script>
            <script src="{$system}/plugins/toastui-editor-3.2.2/toastui-editor-all.min.js"></script>
        HTML;
    }
