<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Template</title>
    <link href="/plugins/bootstrap-5.3.8/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/system.css" rel="stylesheet">
    <style>
        /* Sidebar */
        #wrapper {
            min-height: 100vh;
            display: flex;
        }

        #sidebar {
            width: 200px;
            transition: width .25s ease;
            overflow: hidden;
        }

        #wrapper.collapsed #sidebar {
            width: 70px;
        }

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: .2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #sidebar .nav-link .label {
            display: inline-block;
            transition: opacity .18s ease, width .18s ease;
        }

        #wrapper.collapsed #sidebar .nav-link {
            justify-content: center;
            padding-left: 0.5rem;
        }

        #wrapper.collapsed #sidebar .nav-link .label {
            opacity: 0;
            width: 0;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        /* Brand handling */
        .brand-short {
            display: none;
        }

        .brand-full {
            display: inline-block;
            font-size: 1rem;
        }

        #wrapper.collapsed .brand-short {
            display: inline-block;
        }

        #wrapper.collapsed .brand-full {
            display: none;
        }

        #page-content {
            transition: margin-left .25s ease;
        }

        #wrapper.collapsed #page-content {
            margin-left: 0;
        }

        @media (max-width:767px) {
            #sidebar {
                position: fixed;
                z-index: 1040;
                left: -300px;
            }

            #wrapper.show-sidebar #sidebar {
                left: 0;
            }
        }

        .card .display-6 {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav id="sidebar" class="bg-light border-end card-animate">
            <div class="sidebar-header p-3 d-flex justify-content-between align-items-center">
                <div>
                    <strong><span class="brand-short"><img src='<?php echo $system; ?>/static/img/apps.png' alt="App Icon" width="30" height="30"></span><span class="brand-full">MyApp</span></strong>
                </div>
                <button class="btn btn-sm btn-outline-secondary d-md-none" id="closeSidebar">✕</button>
            </div>
            <ul class="nav flex-column gap-1 mt-3">
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.facebook.com">
                        <img src='<?php echo $system; ?>/static/img/facebook.png' alt="fb" width="30" height="30">
                        <span class="label">Facebook</span>
                    </a>
                </li>
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.messenger.com/">
                        <img src='<?php echo $system; ?>/static/img/messenger.png' alt="msngr" width="30" height="30">
                        <span class="label">Messenger</span>
                    </a>
                </li>
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.instagram.com">
                        <img src='<?php echo $system; ?>/static/img/instagram.png' alt="insta" width="32" height="32">
                        <span class="label">Instagram</span>
                    </a>
                </li>
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.netflix.com">
                        <img src='<?php echo $system; ?>/static/img/netflix.png' alt="netflix" width="40" height="40">
                        <span class="label">Netflix</span>
                    </a>
                </li>
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.youtube.com/">
                        <img src='<?php echo $system; ?>/static/img/youtube.png' alt="yt" width="32" height="32">
                        <span class="label">YouTube</span>
                    </a>
                </li>
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.tiktok.com">
                        <img src='<?php echo $system; ?>/static/img/tiktok.png' alt="tiktok" width="30" height="30">
                        <span class="label">Tiktok</span>
                    </a>
                </li>
                <li class="nav-item card-animate">
                    <a class="nav-link" href="https://www.spotify.com">
                        <img src='<?php echo $system; ?>/static/img/spotify.png' alt="spotify" width="30" height="30">
                        <span class="label">Spotify</span>
                    </a>
                </li>
                
                
            </ul>

        </nav>

        <div id="page-content" class="flex-fill">
            <header class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <div class="d-flex align-items-center">
                    <button id="toggleSidebar" class="btn btn-outline-primary me-3">☰</button>
                    <h4 class="m-0">Dashboard</h4>
                </div>
                <div>
                    <small class="text-muted">Welcome back</small>
                </div>
            </header>

            <main class="p-4">
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="card-title">Users</h6>
                                        <div class="display-6" data-target="1245">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Sales</h6>
                                <div class="display-6" data-target="872">0</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Revenue</h6>
                                <div class="display-6" data-target="54320">0</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Active</h6>
                                <div class="display-6" data-target="98">0</div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Summary</h5>
                            <p class="mb-0">This is a simple dashboard with dummy numbers and a collapsible sidebar. Replace with your real widgets and charts.</p>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script src="/plugins/bootstrap-5.3.8/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            const wrapper = document.getElementById('wrapper');
            const toggle = document.getElementById('toggleSidebar');
            const closeBtn = document.getElementById('closeSidebar');
            toggle.addEventListener('click', function() {
                wrapper.classList.toggle('collapsed');
            });
            if (closeBtn) closeBtn.addEventListener('click', function() {
                wrapper.classList.remove('show-sidebar');
                wrapper.classList.add('collapsed');
            });

            // Simple number animator
            document.querySelectorAll('[data-target]').forEach(function(el) {
                const target = parseInt(el.getAttribute('data-target'), 10) || 0;
                let current = 0;
                const duration = 800;
                const steps = Math.max(Math.floor(duration / 16), 1);
                const increment = Math.ceil(target / steps);
                const timer = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        el.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else el.textContent = current.toLocaleString();
                }, 16);
            });
        })();
    </script>
</body>

</html>