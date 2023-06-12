<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <title>Document</title>
</head>
<body style="background: #f0f0f0">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-6 col-lg-4">
                   <div class="card mt-5 border-primary">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <a href="">
                                    <img src="<?= base_url('assets/web/pelindo.png') ?>" alt="logo-pelindo" style="width: 80%">
                                </a>
                            </div>
                            <form action="<?= base_url('login/proccess') ?>" method="post" id="formLogin">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="token">

                                <div class="form-group mb-3">
                                    <small>Username atau Alamat Email</small>
                                    <input type="text" name="email" id="email" class="form-control">
                                    <small class="text-danger" style="font-size: 10px" id="err_email"></small>
                                </div>

                                <div class="form-group mb-3">
                                    <small>Password</small>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <small class="text-danger" style="font-size: 10px" id="err_password"></small>
                                </div>

                                <button class="btn btn btn-primary w-100" type="submit" id="submit">Log In</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1500",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    </script>
    
    <script>
        $('#formLogin').submit(function(e){
            e.preventDefault();
            let form = $(this).serialize();
            let url = $(this).attr('action');
            disabled_form();

            $.ajax({
                url: url,
                data: form,
                type: 'POST',
                dataType: 'JSON',
                success: function(d){
                    $('#token').val(d.token);
                    undisabled_form();
           

                    if(d.type == 'validation'){
                        if(d.err_email == ''){
                            $('#err_email').html('');
                        } else {
                            $('#err_email').html(d.err_email);
                        }
                    
                        if(d.err_pass == ''){
                            $('#err_password').html('');
                        } else {
                            $('#err_password').html(d.err_pass);
                        }
                    } else if(d.type == 'result') {
                        $('#err_email').html('');
                        $('#err_password').html('');

                        if(d.success == true){
                            toastr["success"](d.msg, 'Success');
                            $('#email').val('');
                            $('#password').val('');
                            setTimeout(() => {
                                window.location.href = d.redirect;
                            }, 1700);
                        } else {
                            toastr["error"](d.msg, 'Error');
                        }

                    }
                },
                error: function(xhr){
                    if(xhr.status === 0){
                        //no internet connection
                        toastr["error"]('No internet connection', "Error")
                    } else if(xhr.status == 403){
                        //access forbidden
                        toastr["error"]('Access forbidden', "Error")
                    } else if(xhr.status == 404){
                        //page not found
                        toastr["error"]('Page not found', "Error")
                    } else if(xhr.status == 500){
                        //internal server error
                        toastr["error"]('Internal server error', "Error")
                    } else {
                        //unknow error
                        toastr["error"]('Unknow error', "Error")
                    }
                    undisabled_form();
                }
            });

        });

        function disabled_form(){
            let loadingAnimation = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
            $('#submit').html(loadingAnimation)
            $('#submit').attr('disabled', true);
            $('#email').attr('disabled', true);
            $('#password').attr('disabled', true);
        }

        function undisabled_form(){
            $('#submit').html('Log In')
            $('#submit').removeAttr('disabled');
            $('#email').removeAttr('disabled');
            $('#password').removeAttr('disabled');        
        }
    </script>

</body>
</html>