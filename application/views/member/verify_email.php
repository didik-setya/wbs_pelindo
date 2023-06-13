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

    <title>Verifikasi Email</title>
</head>
    <body style="background: #f0f0f0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                    <div id="email" data-val="<?= $this->input->get('email') ?>"></div>
                    <div id="token" data-val="<?= $this->input->get('token') ?>"></div>
                    <div class="text-center mt-5">
                        <img src="<?= base_url('assets/web/pelindo.png') ?>" alt="logo-pelindo" width="270px">
                    </div>
                    <div class="card mt-3">
                        <div class="card-body text-center" id="content">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-3">Tunggu Sebentar</p>

                            

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(window).ready(function(){
                let email = $('#email').data('val');
                let token = $('#token').data('val');

                let error = '<p class="text-danger" style="font-size: 50px"><i class="fa-solid fa-triangle-exclamation"></i></p> <br>';
                let success = '<p class="text-success" style="font-size: 50px"><i class="fa-solid fa-circle-check"></i></p> <br>';

                $.ajax({
                    url: '<?= base_url('auth/verify_email') ?>',
                    data: {
                        email: email,
                        token: token
                    },
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(d){

                        if(d.success == true){
                            $('#content').html(success + d.msg);
                            setTimeout(() => {
                                window.location.href = '<?= base_url('auth') ?>'
                            }, 2000);
                        } else {
                            $('#content').html(error + d.msg);
                        }

                    },
                    error: function(err){
                        if(err.status === 0){
                            let msg = '<p>No internet access</p>';
                            $('#content').html(error + msg);
                        } else if(err.status == 403){
                            let msg = '<p>Access forbidden</p>';
                            $('#content').html(error + msg);
                        } else if(err.status == 404){
                            let msg = '<p>Page not found</p>';
                            $('#content').html(error + msg);
                        } else if(err.status == 500){
                            let msg = '<p>Internal server error</p>';
                            $('#content').html(error + msg);
                        } else {
                            let msg = '<p>Unknow error</p>';
                            $('#content').html(error + msg);
                        }
                        
                    }
                })

            });
        </script>
    </body>
</html>