<nav class="navbar navbar-expand-md text-white pt-1" style="opacity: 1;">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler py-0 order-1 collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <img src="<?php echo $system; ?>/static/img/configuration.png" style="height:6.3vh;">
        </button>

        <!-- Brand -->
        <a class="navbar-brand p-0 d-flex align-items-center" href="<?php echo $system . '/pages/signin/' ?>">
            <img src="<?php echo $system . "/static/img/system_logo.png" ?>" alt="System Logo" class="brand-image"
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
                <li class="nav-item" data-page="account_management">
                    <a href="#" class="nav-link px-2"><i class="fa-solid fa-info"></i>&nbsp;Public Information</a>
                </li>
                <li class="nav-item" data-page="account_management">
                    <a href="#" class="nav-link px-2"><i class="fa-solid fa-file-zipper"></i></i>&nbsp;Work Instruction</a>
                </li>
                <li class="nav-item" data-page="signin">
                    <a href="<?php echo $system; ?>/pages/signin" class="nav-link px-2"><i class="fa-solid fa-right-to-bracket"></i></i>&nbsp;Login</a>
                </li>
                <li class="nav-item" data-page="register_account">
                    <a href="<?php echo $system; ?>/pages/register_account" class="nav-link px-2"><i class="fa-solid fa-plus"></i>&nbsp;Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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