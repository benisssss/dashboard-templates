<nav class="navbar navbar-expand-md text-white pt-1" style="opacity: 1;">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler py-0 order-1 collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <img src="<?php echo $system; ?>/static/img/configuration.png" style="height:6.3vh;">
        </button>

        <!-- Brand -->
        <a class="navbar-brand p-0 d-flex align-items-center" href="<?php echo $system . '/pages/dashboard/' ?>">
            <img src="<?php echo $system . "/static/img/logo.png" ?>" alt="System Logo" class="brand-image"
                style="height:6.3vh;">
            <span class="ms-1 d-none d-md-inline-block fw-bold">Dashboard</span>
            <span class="ms-1 d-md-none fw-bold">QMS</span>
        </a>

        <!-- Collapsible Nav -->
        <!-- good use of the data-page cleans up most of the navbar active status -->
        <div class="collapse navbar-collapse order-3 justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#" onclick="toggle_theme();">Toggle Site Theme</a></li>
                    </ul>
                </li>
                <!-- template reference -->
                <!-- <li class="nav-item" data-page="desa">
                    <a href="<?php echo $system; ?>/pages/desa" class="nav-link px-2"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Desa</a>
                </li> -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        3YR Audit Programme
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/qms_audit_programme" data-page="qms_audit_programme">QMS</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">EOHSMS</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Mfg. Process</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Product</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/audit_programme_management" data-page="audit_programme_management">Management</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Audit Masterplan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">QMS</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">EOHSMS</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Mfg. Process</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Product</a></li>
                    </ul>
                </li> -->
                <!-- <li class="nav-item">
                    <a
                        class="nav-link px-2"
                        href="<?php echo $system; ?>/pages/detailed_audit"
                        data-page="detailed_audit"
                    >
                        Detailed Audit Plan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-2" 
                        href="<?php echo $system; ?>/pages/ianr" 
                        data-page="ianr" 
                        aria-expanded="false"
                    >
                        IANR
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/ianr" data-page="ianr">QMS</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">EOHSMS</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Mfg. Process</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Product</a></li>
                        <li><a class="dropdown-item" href="<?php echo $system; ?>/pages/action" data-page="action">Management</a></li>
                    </ul>
                </li> -->
                <li class="nav-item" data-page="account_management">
                    <a href="<?php echo $system; ?>/pages/account_management" class="nav-link px-2 invisible"><i
                            class="fa-solid fa-pen-to-square"></i>&nbsp;Accounts</a>
                </li>
                <li class="nav-item mt-1">
                    <button class="btn btn-danger btn-sm h-100 v-100 w-md-auto" type="button"
                        onclick="system_logout();">Logout</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.navbar-collapse .nav-item').forEach(link => {
            if (link.dataset.page === CURRENT_PAGE) {
                link.classList.add('nav-active');
            } else {
                link.classList.remove('nav-active');
            }
        });
        document.querySelectorAll('.navbar-collapse .dropdown-item').forEach(link => {
            if (link.dataset.page === CURRENT_PAGE) {
                link.classList.add('active');
                link.closest('.nav-item').classList.add('nav-active');
            } else {
                link.classList.remove('nav-active');
            }
        });
    });

    function system_logout() {
        Swal.fire({
            title: "Logout",
            text: 'Remove credentials and exit?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirm",
            customClass: {
                container: 'blur'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "<?php echo $system; ?>/api/common/logout.php";
            }
        });
    }
</script>