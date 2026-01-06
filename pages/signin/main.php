<!-- custom to login page -->
<style>
    .wrapper-card {
        background-image:
            url('<?php echo $system; ?>/static/img/furukawa-bg.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>

<div class="container-fluid flex-grow-1 d-flex">
    <img class="position-absolute" src="<?php echo $system; ?>/static/img/fas-name.png"
        alt="Furukawa Automotive Systems, Lima, Philippines Inc." style="height:2rem;">
    <div class="col-md-7 col-11 m-auto">
        <div class="row h-100">
            <div
                class="glass-card card d-flex flex-column justify-content-center col p-5 align-items-stretch d-none d-md-flex">
                <div class="d-flex flex-row">
                    <img class="me-3 img-fluid" src="<?php echo $system . "/static/img/login.png"?>"
                        alt="System Logo" style="height:7vw;">
                    <h2 class="text-white fw-bold">Template Dashboard <br></h2>
                </div>
                <h4 class="text-white">HAYSSSSSSSSSSST</h4>
            </div>
            <div class="card p-1 d-flex flex-column col justify-content-center align-items-stretch">
                <h3 class="d-md-none fw-bold">Dashboard</h3>
                <h4 class="mb-0">Sign-In</h4>
                <span>Kindly enter your details</span>
                <form id="login_form" class="needs-validation" data-submit-callback="login_authenticate" novalidate>
                    <div class="loading-overlay">
                        <div class="d-flex flex-row align-items-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span
                                class="animate__animated animate__flash animate__infinite infinite">&nbsp;Loading...</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column py-2">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="login_form_username"
                                placeholder="name@example.com" name="username" required>
                            <div class="invalid-feedback">Required</div>
                            <label for="longin_form_username">Username or Email</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="password" class="form-control" id="login_form_password" placeholder="Password"
                                name="password" required>
                            <div class="invalid-feedback">Required</div>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Login</button>
                        </div>
                        <div class="w-100 d-flex justify-content-between text-center align-items-center">
                            <span>Don't have an account? <a href="../register_account/" class="text-primary">Register</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    async function login_authenticate(form) {
        event.preventDefault;
        const formdata = new FormData(form);
        const loader = form.querySelector('.loading-overlay');
        $.ajax({
            url: '<?php echo $system; ?>/api/common/login.php',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                loader.classList.add('active');
            },
            success: function(response) {
                console.log(response);
                if (response.status == true && response.registered == false) {
                    Swal.fire({
                        title: "Not yet activated",
                        text: 'Confirm activation via registered email',
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Confirm",
                        customClass: {
                            container: 'blur'
                        }
                    });
                    return 0;
                }
                if (response.status == false) {
                    Swal.fire({
                        title: "Error",
                        text: 'Invalid Username and/or Password',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Confirm",
                        customClass: {
                            container: 'blur'
                        }
                    });
                    form.reset();
                    return 0;
                }
                window.location = '<?php echo $system; ?>/pages/template';
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: `Request failed: ${error || 'Unknown error occurred.'}`,
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Confirm",
                    customClass: {
                        container: 'blur'
                    }
                });
                form.reset();
                console.error('AJAX Error:', status, error, xhr.responseText);
            },
            complete: function() {
                loader.classList.remove('active');
            }
        });
    }
</script>