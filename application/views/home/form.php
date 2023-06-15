<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan</title>

    <link href="<?= base_url('assets/bootstrap/') ?>css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="<?= base_url('assets/fontawesome/') ?>css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    

    <script src="<?= base_url('assets/web/dashboard') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/bootstrap/') ?>js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/fontawesome/') ?>js/all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

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

        .nav-pills {
            background: #ededed
        }

        ul li .nav-link {
            border: 1px solid transparent;
        }

        ul li .nav-link:hover {
            border: 1px solid #0062f2;
            color: #0062f2;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .btn-act-multiple {
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .multiple-form {
                background: #f2f2f2;
            }

            .act-multiple-form {
                background: #9b99e0;
                padding: 10px 10px 10px 10px;
            }
        }
    </style>

</head>
<body style="background: #f2f2f2">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top " style="box-shadow: 0px 3px 2px #0275bc;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('assets/web/') ?>pelindo.png" alt="..." height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav text-center" style="align-items: center">
                    <a class="nav-link" href="#">Beranda</a>
                    <a class="nav-link" href="#">Tentang Pelindo</a>
                    <a class="nav-link" href="#">Disclaimer</a>
                    <a class="nav-link" href="#">Mekanisme Pelaporan</a>
                    <a class="nav-link" href="#">Pelanggaran & Definisi</a>
                    <a class="nav-link" href="#">Pertanyaan & Jawaban</a>
                    <a class="nav-link" href="#">Login <i class="fas fa-sign-in-alt"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px">
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4><b>Buat Laporan</b></h4>

                            <ul class="nav nav-pills mb-3 justify-content-center nav-fill p-2" id="pills-tab" role="tablist">
                                <li class="nav-item mx-1" role="presentation">
                                    <button class="nav-link active" id="pills-identitas-tab" data-bs-toggle="pill" data-bs-target="#pills-identitas" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Identitas</button>
                                </li>
                                <li class="nav-item mx-1" role="presentation">
                                    <button class="nav-link" id="pills-apa-tab" data-bs-toggle="pill" data-bs-target="#pills-apa" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Apa</button>
                                </li>
                                <li class="nav-item mx-1" role="presentation">
                                    <button class="nav-link" id="pills-kapan-tab" data-bs-toggle="pill" data-bs-target="#pills-kapan" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" disabled>Kapan dan Dimana</button>
                                </li>
                                <li class="nav-item mx-1" role="presentation">
                                    <button class="nav-link" id="pills-siapa-tab" data-bs-toggle="pill" data-bs-target="#pills-siapa" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" disabled>Siapa</button>
                                </li>
                                <li class="nav-item mx-1" role="presentation">
                                    <button class="nav-link" id="pills-bagaimana-tab" data-bs-toggle="pill" data-bs-target="#pills-bagaimana" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" disabled>Bagaimana</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-identitas" role="tabpanel" aria-labelledby="pills-identitas-tab" tabindex="0">
                                    <b>Bagaimana status identitas anda dalam laporan ini ? <span class="text-danger">*</span></b> 
                                    
                                    <form action="<?= base_url('home/check_form_1') ?>" method="post" id="reporting1"> 
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="anonym" id="anonym1" value="1">
                                        <label class="form-check-label" for="anonym1">
                                            Saya ingin identitas diri saya diketahui dan tidak dirahasiakan.
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="anonym" id="anonym2" value="2">
                                        <label class="form-check-label" for="anonym2">
                                            Saya ingin identitas diri saya dirahasiakan sebagian
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="anonym" id="anonym3" value="0">
                                        <label class="form-check-label" for="anonym3">
                                            Saya ingin identitas diri saya dirahasiakan
                                        </label>
                                    </div>
                                    <small class="text-danger" id="err_status"></small>

                                    <div class="row">
                                        <div class="mt-3 col-lg-6">
                                            <label><b>Nama Lengkap <span class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                            <small class="text-danger" id="err_nama"></small>
                                        </div>

                                        <div class="mt-3 col-lg-6">
                                            <label><b>Nomor Induk Kependudukan</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nik" name="nik">
                                            <small class="text-danger" id="err_nik"></small>
                                        </div>

                                        <div class="mt-3 col-lg-6">
                                            <label><b>Alamat Email <span class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" id="email" name="email">
                                            <small class="text-danger" id="err_email"></small>
                                        </div>

                                        <div class="mt-3 col-lg-6">
                                            <label><b>Nomor Induk Kepegawaian</b></label>
                                            <input type="text" class="form-control" id="no_kepegawaian" name="no_kepegawaian">
                                        </div>

                                        <div class="mt-3 col-lg-6">
                                            <label><b>No Telepon <span class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" id="telp" name="telp">
                                            <small class="text-danger" id="err_telp"></small>
                                        </div>

                                        <div class="mt-3">
                                            <b>Alamat yang sesuai dengan KTP</b>
                                            <div class="row">
                                                <div class="mt-3 col-lg-6">
                                                    <span>Alamat Jalan</span>
                                                    <input type="text" class="form-control" id="jln" name="jln">
                                                </div>
                                                <div class="mt-3 col-lg-6">
                                                    <span>Kota</span>
                                                    <input type="text" class="form-control" id="kota" name="kota">
                                                </div>
                                                <div class="mt-3 col-lg-6">
                                                    <span>Kode Pos</span>
                                                    <input type="text" class="form-control" id="pos" name="pos">
                                                </div>
                                                <div class="mt-3 col-lg-6">
                                                    <span>Negara / Provinsi / Daerah</span>
                                                    <input type="text" class="form-control" id="negara" name="negara">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <b>Melalui media apa dapat dihubungi ? <span class="text-danger">*</span></b>
                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="telp" id="telpcheck" name="media_call[]">
                                                <label class="form-check-label" for="telpcheck">
                                                    Telepon
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="email" id="emailcheck" name="media_call[]">
                                                <label class="form-check-label" for="emailcheck">
                                                    Email
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="wawancara" id="wawancaracheck" name="media_call[]">
                                                <label class="form-check-label" for="wawancaracheck">
                                                    Wawancara Pribadi
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="lain-lain" id="othercheck" name="media_call[]">
                                                <label class="form-check-label" for="othercheck">
                                                    Lain-lain
                                                </label>
                                            </div>
                                            <!-- <small class="text-danger" id="err_media_call">asas</small> -->
                                            <div class="mt-2 col-lg-5 d-none" id="lain_lain">
                                                <label>Tuliskan di sini</label>
                                                <input type="text" class="form-control" id="lain_lain_form" name="lain_lain_form">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-sm btn-warning mt-3 mb-3" type="submit" id="next-1">Selanjutnya</button>
                                    
                                    <p class="text-danger" id="err_form1"></p>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-apa" role="tabpanel" aria-labelledby="pills-apa-tab" tabindex="0">
                                    <b>1. Jenis laporan yang ingin anda sampaikan</b>
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $laporan = jenis_laporan();
                                            $a = 1;
                                            $b = 1;
                                            foreach($laporan as $l){ ?>
                                            <div class="form-check col-12 col-sm-12 col-md-6 col-lg-4">
                                                <input class="form-check-input" type="checkbox" name="laporan[]" value="<?= $l ?>" id="laporan<?= $a++ ?>">
                                                <label class="form-check-label" for="laporan<?= $b++ ?>">
                                                    <?= $l ?>
                                                </label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <b>2. Apa yang terjadi?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <small class="text-muted">Harap di isi</small>
                                                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <b>3. Apa yang membuat Anda menyadari kasus ini?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="what" id="what" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-sm btn-warning mt-3">Selanjutnya</button>

                                </div>

                                <div class="tab-pane fade" id="pills-kapan" role="tabpanel" aria-labelledby="pills-kapan-tab" tabindex="0">
                                    <b>4. Kapan dan dimana kasus ini terjadi?</b>

                                    <div class="mb-3 container all-multiple-form">
                                        <div class="row multiple-form" style="align-items: center;">
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3">
                                                <b>Tanggal</b>
                                                <input type="text" name="tgl" class="form-control datepicker">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                <b>Provinsi</b>
                                                <input type="text" name="prov" id="prov" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                <b>Kota</b>
                                                <input type="text" name="kota" id="kota" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3 mb-3">
                                                <b>Kecamatan/kelurahan</b>
                                                <input type="text" name="kec" id="kec" class="form-control">
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                <span class="badge text-bg-secondary new-form btn-act-multiple">+</i></span>
                                            </div>

                                        </div>

                                        <div class="copy-form d-none">
                                        <div class="row multiple-form" style="align-items: center;">
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3">
                                                <b>Tanggal</b>
                                                <input type="text" name="tgl" class="form-control datepicker">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                <b>Provinsi</b>
                                                <input type="text" name="prov" id="prov" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                <b>Kota</b>
                                                <input type="text" name="kota" id="kota" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3 mb-3">
                                                <b>Kecamatan/kelurahan</b>
                                                <input type="text" name="kec" id="kec" class="form-control">
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                <span class="badge text-bg-secondary new-form btn-act-multiple">+</i></span>
                                                <span class="badge text-bg-secondary remove-form btn-act-multiple">-</i></span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <b>5. Berapa lama kasus ini telah berlangsung ?</b>
                                        <div class="mb-3 container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <textarea name="lama" id="lama" class="form-control" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    <b>6. Apakah kasus ini pernah terjadi sebelumnya?</b>
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="kasus_before" id="radio1" value="ya">
                                                    <label class="form-check-label" for="radio1">
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="kasus_before" id="radio2" value="tidak">
                                                    <label class="form-check-label" for="radio2">
                                                        Tidak
                                                    </label>
                                                </div>
                                                <div class="form-check col-12">
                                                    <input class="form-check-input" type="radio" name="kasus_before" id="radio3" value="tidak tahu">
                                                    <label class="form-check-label" for="radio3">
                                                        Tidak Tahu
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-other d-none">
                                            <b class="mt-3">Kapan dan dimana kasus ini terjadi?</b>
                                            <div class="row multiple-form-other" style="align-items: center;">
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3">
                                                    <b>Tanggal</b>
                                                    <input type="text" name="tgl" class="form-control datepicker">
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                    <b>Provinsi</b>
                                                    <input type="text" name="prov" class="form-control">
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                    <b>Kota</b>
                                                    <input type="text" name="kota" class="form-control">
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3 mb-3">
                                                    <b>Kecamatan/kelurahan</b>
                                                    <input type="text" name="kec" class="form-control">
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                    <span class="badge text-bg-secondary new-form-other btn-act-multiple">+</i></span>
                                                </div>
                                            </div>
                                            </div>


                                            <div class="copy-form-other d-none">
                                                <div class="row multiple-form-other" style="align-items: center;">
                                                    <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3">
                                                        <b>Tanggal</b>
                                                        <input type="text" name="tgl" class="form-control datepicker">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                        <b>Provinsi</b>
                                                        <input type="text" name="prov" class="form-control">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3">
                                                        <b>Kota</b>
                                                        <input type="text" name="kota" class="form-control">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mt-3 mb-3">
                                                        <b>Kecamatan/kelurahan</b>
                                                        <input type="text" name="kec" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                        <span class="badge text-bg-secondary new-form-other btn-act-multiple">+</i></span>
                                                        <span class="badge text-bg-secondary remove-form-other btn-act-multiple">-</i></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="btn btn-sm btn-warning mt-3">Selanjutnya</button>
                                    

                                </div>

                                <div class="tab-pane fade" id="pills-siapa" role="tabpanel" aria-labelledby="pills-siapa-tab" tabindex="0">
                                    <b>7. Informasi yang anda miliki, apakah itu dari pihak pertama atau pihak kedua ?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-check col-sm-12 col-12 col-md-6 col-lg-6">
                                                <input class="form-check-input" type="radio" name="informan" id="informan_pertama" value="pihak pertama">
                                                <label class="form-check-label" for="informan_pertama">
                                                    Pihak Pertama
                                                </label>
                                            </div>
                                            <div class="form-check col-sm-12 col-12 col-md-6 col-lg-6">
                                                <input class="form-check-input" type="radio" name="informan" id="informan_kedua" value="pihak kedua">
                                                <label class="form-check-label" for="informan_kedua">
                                                    Pihak Kedua
                                                </label>
                                            </div>
                                        </div>

                                        <div class="informan1 mt-3 d-none">
                                        <b>Apabila informasi didapatkan dari pihak kedua, mohon diinformasikan nama dari pemberi info :</b>
                                        <div class="row multiple-form" style="align-items: center">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                                <label>Panggilan</label>
                                                <select name="panggilan" class="form-control">
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama_informan" class="form-control">
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                                <label>Divisi / Posisi</label>
                                                <input type="text" name="divis_informan" class="form-control">
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                <span class="badge text-bg-secondary btn-act-multiple add-informan">+</span>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="copy-informan1 d-none">
                                        <div class="row multiple-form" style="align-items: center">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                                                <label>Panggilan</label>
                                                <select name="panggilan" class="form-control">
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama_informan" class="form-control">
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                                <label>Divisi / Posisi</label>
                                                <input type="text" name="divis_informan" class="form-control">
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                <span class="badge text-bg-secondary btn-act-multiple add-informan">+</span>
                                                <span class="badge text-bg-secondary btn-act-multiple remove-informan">-</span>
                                            </div>
                                        </div>
                                        </div>

                                    </div>

                                    <b>8. Unit kerja apa yang ingin Anda laporkan?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" name="unit_report" id="unit_report" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <b>9. Siapa saja orang yang terlibat?</b>
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="people-report">
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-3">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-report">+</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="copy-people-report d-none">
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-3">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-3">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-3 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-report">+</span>
                                                        <span class="badge text-bg-secondary btn-act-multiple remove-report">-</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <b>10. Apakah ada atasan atau pihak manajemen yang terlibat?</b>
                                    <div class="container">
                                        <div class="row">

                                            <div class="form-check col-12 col-sm-12 col-md-4 col-lg-4">
                                                <input class="form-check-input" type="radio" name="manajemen_terlibat" id="flexRadioDefault" value="ya">
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Ya
                                                </label>
                                            </div>

                                            <div class="form-check col-12 col-sm-12 col-md-4 col-lg-4">
                                                <input class="form-check-input" type="radio" name="manajemen_terlibat" id="flexRadioDefault1" value="tidak">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Tidak
                                                </label>
                                            </div>

                                            <div class="form-check col-12 col-sm-12 col-md-4 col-lg-4">
                                                <input class="form-check-input" type="radio" name="manajemen_terlibat" id="flexRadioDefault2" value="tidak tahu">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Tidak Tahu
                                                </label>
                                            </div>

                                            <div class="col-12 d-none" id="desc_report">
                                                <label>Tolong Jelaskan</label>
                                                <textarea name="desc_report" cols="30" rows="5" class="form-control"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <b>11. Apakah anda pernah melaporkan sebelumnya kasus ini ke atasan, pihak manajemen, atau orang lain?</b>

                                    <div class="container">
                                        <div class="row">
                                            <div class="form-check col-12 col-sm-12 col-md-6 col-lg-6">
                                                <input class="form-check-input" type="radio" name="report_before" value="ya" id="befor_report_1">
                                                <label class="form-check-label" for="befor_report_1">
                                                    Ya
                                                </label>
                                            </div>

                                            <div class="form-check col-12 col-sm-12 col-md-6 col-lg-6">
                                                <input class="form-check-input" type="radio" name="report_before" value="tidak" id="befor_report_2">
                                                <label class="form-check-label" for="befor_report_2">
                                                    Tidak
                                                </label>
                                            </div>


                                            <div class="people-report-before d-none" id="people-report-before">
                                                <p>Jika ada, Siapa?</p>
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-2">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-2 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-report-before">+</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="copy-people-report-before d-none">
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-2">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-2 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-report-before">+</span>
                                                        <span class="badge text-bg-secondary btn-act-multiple remove-report-before">-</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <b>12. Selain anda, siapa yang menyadari adanya kasus ini?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-check col-12 col-sm-12 col-md-6 col-lg-6">
                                                <input class="form-check-input" type="radio" name="another_people" value="1" id="another_people1">
                                                <label class="form-check-label" for="another_people1">
                                                    Hanya Saya
                                                </label>
                                            </div>

                                            <div class="form-check col-12 col-sm-12 col-md-6 col-lg-6">
                                                <input class="form-check-input" type="radio" name="another_people" value="2" id="another_people2">
                                                <label class="form-check-label" for="another_people2">
                                                    Ada pihak lain selain saya
                                                </label>
                                            </div>


                                            <div class="another-people d-none" id="another-people">
                                                <p>Jika ada, Siapa?</p>
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-2">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-2 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-another">+</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="copy-another-people d-none">
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-2">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-2 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-another">+</span>
                                                        <span class="badge text-bg-secondary btn-act-multiple remove-another">-</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    

                                    <b>13. Apakah ada saksi-saksi dalam kasus ini?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-check col-12 col-sm-12 col-md-4 col-lg-4">
                                                <input class="form-check-input" type="radio" value="ya" name="saksi" id="saksi1">
                                                <label class="form-check-label" for="saksi1">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check col-12 col-sm-12 col-md-4 col-lg-4">
                                                <input class="form-check-input" type="radio" value="tidak" name="saksi" id="saksi2">
                                                <label class="form-check-label" for="saksi2">
                                                    Tidak
                                                </label>
                                            </div>
                                            <div class="form-check col-12 col-sm-12 col-md-4 col-lg-4">
                                                <input class="form-check-input" type="radio" value="tidak tahu" name="saksi" id="saksi3">
                                                <label class="form-check-label" for="saksi3">
                                                    Tidak Tahu
                                                </label>
                                            </div>


                                            <div class="saksi d-none" id="saksi">
                                                <p>Jika ada, Siapa?</p>
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-2">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-2 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-saksi">+</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="copy-saksi d-none">
                                                <div class="row multiple-form" style="align-items: center">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mt-2">
                                                        <label>Panggilan</label>
                                                        <select name="panggilan" class="form-control">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                                                        <label>Divisi / Posisi</label>
                                                        <input type="text" name="divis_informan" class="form-control">
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-1 mt-2 act-multiple-form">
                                                        <span class="badge text-bg-secondary btn-act-multiple add-saksi">+</span>
                                                        <span class="badge text-bg-secondary btn-act-multiple remove-saksi">-</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    

                                </div>

                                <div class="tab-pane fade" id="pills-bagaimana" role="tabpanel" aria-labelledby="pills-bagaimana-tab" tabindex="0">
                                                
                                    <b>14. Apakah ada pihak-pihak yang berusaha untuk menutupi kasus ini? Bagaimana ?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <b>15. Jika mungkin, bisa menyebutkan jumlah uang dan/atau property, nama, atau hal lainnya yang berkaitan dengan kasus tersebut ?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <b>16. Apakah ada hal lain yang ingin anda sampaikan terkait kasus tersebut ?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <b>17. Apakah ada bukti yang berkaitan dengan laporan ini?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-check col-12">
                                                <input class="form-check-input" type="radio" name="bukti" id="tab5-1" value="ya">
                                                <label class="form-check-label" for="tab5-1">
                                                    Ya
                                                </label>
                                            </div>

                                            <div class="form-check col-12">
                                                <input class="form-check-input" type="radio" name="bukti" id="tab5-2" value="tidak">
                                                <label class="form-check-label" for="tab5-2">
                                                    Tidak
                                                </label>
                                            </div>

                                            <div class="col-12 mt-3 penjelasan-bukti d-none">
                                                <label>Jelaskan</label>
                                                <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <b>18. Bersediakan Anda mengunggah beberapa file?</b>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="file" name="" id="" multiple="multiple" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<script>

    $(document).ready(function(){
        
        $(document).on('focus', '.datepicker', function(){
            $(this).datepicker();
        })

        $('input:checkbox[name="media_call"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 'lain-lain'){
                $('#lain_lain').removeClass('d-none');
                $('#lain_lain_form').attr('required', true);
            } else {
                $('#lain_lain').addClass('d-none');
                $('#lain_lain_form').removeAttr('required');
            }
        });

        $(document).on('click', '.new-form', function(){
            let newForm = $('.copy-form').html();
            $('.all-multiple-form').append(newForm);
        })

        $(document).on('click', '.remove-form', function(){
            $(this).parents(".multiple-form").remove();
        });

        $(document).on('click', '.new-form-other', function(){
            let newForm = $('.copy-form-other').html();
            $('.form-other').append(newForm);
        })

        $(document).on('click', '.remove-form-other', function(){
            $(this).parents(".multiple-form-other").remove();
        });

        $('input:radio[name="kasus_before"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 'ya'){
                $('.form-other').removeClass('d-none');
            } else {
                $('.form-other').addClass('d-none');
            }
        })

        $(document).on('click', '.add-informan', function(){
            let newForm = $('.copy-informan1').html();
            $('.informan1').append(newForm);
        })

        $(document).on('click', '.remove-informan', function(){
            $(this).parents(".multiple-form").remove();
        });

        $('input:radio[name="informan"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 'pihak kedua'){
                $('.informan1').removeClass('d-none');
            } else {
                $('.informan1').addClass('d-none');
            }
        });

        $(document).on('click', '.add-report', function(){
            let newForm = $('.copy-people-report').html();
            $('.people-report').append(newForm);
        })

        $(document).on('click', '.remove-report', function(){
            $(this).parents(".multiple-form").remove();
        });

        $('input:radio[name="manajemen_terlibat"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 'ya'){
                $('#desc_report').removeClass('d-none');
            } else {
                $('#desc_report').addClass('d-none');
            }
        });

        $(document).on('click', '.add-report-before', function(){
            let newForm = $('.copy-people-report-before').html();
            $('.people-report-before').append(newForm);
        })

        $(document).on('click', '.remove-report-before', function(){
            $(this).parents(".multiple-form").remove();
        });

        $('input:radio[name="another_people"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 2) {
                $('#another-people').removeClass('d-none');
            } else {
                $('#another-people').addClass('d-none');
            }
        })

        $(document).on('click', '.add-another', function(){
            let newForm = $('.copy-another-people').html();
            $('.another-people').append(newForm);
        })

        $(document).on('click', '.remove-another', function(){
            $(this).parents(".multiple-form").remove();
        });

        $('input:radio[name="saksi"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 'ya') {
                $('#saksi').removeClass('d-none');
            } else {
                $('#saksi').addClass('d-none');
            }
        })

        $(document).on('click', '.add-saksi', function(){
            let newForm = $('.copy-saksi').html();
            $('.saksi').append(newForm);
        })

        $(document).on('click', '.remove-saksi', function(){
            $(this).parents(".multiple-form").remove();
        });

        $('input:radio[name="bukti"]').change(function(){
            if($(this).is(':checked') && $(this).val() == 'ya'){
                $('.penjelasan-bukti').removeClass('d-none');
            } else {
                $('.penjelasan-bukti').addClass('d-none');
            }
        });

    })


</script>

<script>
    $('#reporting1').submit(function(e){
        e.preventDefault();
        let status_pelapor = $('input[name="anonym"]:checked').val();
        if(status_pelapor == null){
            $('#err_status').html('Harap pilih salah satu')
        } else {
            $('#err_status').html('')
            form_1();
        }
    });

    function form_1(){
        $.ajax({
            url: $('#reporting1').attr('action'),
            data: $('#reporting1').serialize(),
            type: 'POST',
            dataType: 'JSON',
            success: function(d){
                $('#err_form1').html('');

                if(d.success == false){
                    if(d.err_nama == ''){
                        $('#err_nama').html('')
                    } else {    
                        $('#err_nama').html(d.err_nama)
                    }

                    if(d.err_email == ''){
                        $('#err_email').html('')
                    } else {    
                        $('#err_email').html(d.err_email)
                    }

                    if(d.err_nik == ''){
                        $('#err_nik').html('')
                    } else {    
                        $('#err_nik').html(d.err_nik)
                    }

                    if(d.err_telp == ''){
                        $('#err_telp').html('')
                    } else {    
                        $('#err_telp').html(d.err_telp)
                    }

                } else {
                    $('#err_nama').html('')
                    $('#err_email').html('')
                    $('#err_nik').html('')
                    $('#err_telp').html('')
                }
            },
            error: function(xhr){
                if(xhr.status == 0){
                    $('#err_form1').html('Error: No internet access');
                } else if(xhr.status == 403){
                    $('#err_form1').html('Error: Access denied');
                } else if(xhr.status == 404){
                    $('#err_form1').html('Error: Page not found');
                } else if(xhr.status == 500){
                    $('#err_form1').html('Error: Internal server error');
                } else {
                    $('#err_form1').html('Error: Unknow error');
                }
            }
        })
    }
</script>

</body>
</html>