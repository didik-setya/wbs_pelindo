<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                            <form action="" method="post" id="formLogin">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="token">
                                <div class="form-group mb-3">
                                    <small>Username atau Alamat Email</small>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <small>Password</small>
                                    <input type="text" name="password" id="password" class="form-control">
                                </div>

                                <button class="btn btn btn-primary w-100">Log Masuk</button>
                            </form>
                        </div>
                    </div>


                
             
            </div>
        </div>
    </div>
    
</body>
</html>