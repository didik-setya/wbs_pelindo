<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link href="<?= base_url('assets/bootstrap/') ?>css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="<?= base_url('assets/fontawesome/') ?>css/all.min.css" rel="stylesheet">

    <script src="<?= base_url('assets/bootstrap/') ?>js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/fontawesome/') ?>js/all.min.js"></script>

    <style>
        .nav-link {
            border: 1px solid transparent;
            width: 100%;
            margin: 3px 3px 3px 3px;
        }

        .nav-link:hover {
            color: #f2b600;
            border: 1px solid #0062f2;
            transition: .3s
        }

        .nav-link.act {
            background: #2979f0;
            color: #f2f2f2;
        }
    </style>

</head>
<body style="background: #f2f2f2">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top " style="box-shadow: 0px 3px 2px #0275bc;">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/web/') ?>pelindo.png" alt="..." height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav text-center" style="align-items: center">
                    <a class="nav-link act" href="<?= base_url(); ?>">Beranda</a>
                    <a class="nav-link" href="<?= base_url('home/about'); ?>">Tentang Pelindo</a>
                    <a class="nav-link" href="<?= base_url('home/disclaimer'); ?>">Disclaimer</a>
                    <a class="nav-link" href="<?= base_url('home/mekanisme'); ?>">Mekanisme Pelaporan</a>
                    <a class="nav-link" href="<?= base_url('home/definisi'); ?>">Pelanggaran & Definisi</a>
                    <a class="nav-link" href="<?= base_url('home/faq'); ?>">Pertanyaan & Jawaban</a>
                    <a class="nav-link" href="<?= base_url('login'); ?>">Login <i class="fas fa-sign-in-alt"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px">
        <!-- content -->
        <?php $this->load->view($content); ?>
    </div>

    <footer class="footer mt-3 py-3 bg-light" style="border-top: 3px solid #0062f2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-3 col-md-12 col-lg-3 text-center">
                    <img src="<?= base_url('assets/web/') ?>pelindo.png" alt="img" width="150px"><br>
                    <p class="mt-3"><b>PT Pelabuhan Indonesia (Persero)</b></p>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                    <p>
                        <b><i class="fas fa-home"></i> </b>PO Box 1074 JKS 12010
                    </p>
                    
                    <p>
                        <b><i class="fas fa-phone-alt"></i> </b>+62 21 2782 2345
                    </p>
                    <p>
                        <b><i class="fas fa-fax"></i> </b>+62 21 2782 3456
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                    <p>
                        <b><i class="fas fa-comment-alt"></i> </b>+62 811 933 2345
                    </p>
                    
                    <p>
                        <b><i class="fas fa-envelope"></i> </b>pelindobersih@whistleblowing.link
                    </p>
                </div>
                <div class="col-12">
                    <hr>
                    <small>Copyright &copy 2023 <a href="https://kreatindo.com">Kreatindo</a> Team</small>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>