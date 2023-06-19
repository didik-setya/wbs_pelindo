<h5>1. Informasi Laporan</h5>
<table class="table table-bordered">
    <tr>
        <td><b>Apa yang hal yang terjadi ?</b></td>
        <td><?= $report->hal_terjadi ?></td>
    </tr>
    <tr>
        <td><b>Apa yang membuat anda menyadari hal ini?</b></td>
        <td><?= $report->penyadaran_kasus ?></td>
    </tr>
    <tr>
        <td><b>Berapa lama kasus ini telah berlangsung ?</b></td>
        <td><?= $report->lama_kasus_berlangsung ?></td>
    </tr>
    <tr>
        <td><b>Apakah kasus ini pernah terjadi sebelumnya ?</b></td>
        <td><?= $report->kasus_sebelumnya ?></td>
    </tr>
    <tr>
        <td><b>Informasi yang anda miliki, apakah itu dari pihak pertama atau pihak kedua ?
        </b></td>
        <td><?= $report->sumber_informasi ?></td>
    </tr>
    <tr>
        <td><b>Unit kerja apa yang ingin Anda laporkan?</b></td>
        <td><?= $report->unit_kerja_laporan ?></td>
    </tr>
    <tr>
        <td><b>Apakah ada atasan atau pihak manajemen yang terlibat?</b></td>
        <td>
            <?php if($report->management_terlibat == 'ya'){ ?>   
                <?= $report->management_terlibat ?>
                <br>
                (<?= $report->desc_management_terlibat ?>)
            <?php } else { ?> 
                <?= $report->management_terlibat ?>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td><b>Apakah anda pernah melaporkan sebelumnya kasus ini ke atasan, pihak manajemen, atau orang lain?</b></td>
        <td><?= $report->laporan_sebelumnya ?></td>
    </tr>
    <tr>
        <td><b>Selain anda, siapa yang menyadari adanya kasus ini?</b></td>
        <td>
            <?php 
                if($report->selain_anda == 1){
                    echo 'Hanya Saya';
                } else {
                    echo 'Ada pihak lain selain saya';
                }
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Apakah ada saksi-saksi dalam kasus ini?</b></td>
        <td><?= $report->saksi ?></td>
    </tr>
    <tr>
        <td><b>Apakah ada pihak-pihak yang berusaha untuk menutupi kasus ini? Bagaimana ?</b></td>
        <td><?= $report->pihak_menutupi_kasus ?></td>
    </tr>
    <tr>
        <td><b>Jika mungkin, bisa menyebutkan jumlah uang dan/atau property, nama, atau hal lainnya yang berkaitan dengan kasus tersebut ?</b></td>
        <td><?= $report->hal_berkaitan_kasus ?></td>
    </tr>
    <tr>
        <td><b>Apakah ada hal lain yang ingin anda sampaikan terkait kasus tersebut ?</b></td>
        <td><?= $report->penyampaian_tentang_kasus ?></td>
    </tr>
    <tr>
        <td><b>Apakah ada bukti yang berkaitan dengan laporan ini?</b></td>
        <td>
            <?php if($report->bukti_kasus == 'ya'){ ?>
                <?= $report->bukti_kasus ?>
                <br>
                (<?= $report->desc_bukti ?>)
            <?php } else { ?>
                <?= $report->bukti_kasus ?>
            <?php } ?>
        </td>
    </tr>

    <tr>
        <td><b>Jenis laporan yang di sampaikan</b></td>
        <td>
            <?php if(isset($jenis_laporan)){ ?>
                <ul>
                    <?php foreach($jenis_laporan as $jl){ ?>
                        
                        <?php if($jl->jenis_laporan == 'di luar cangkupan'){ ?>
                            <li><?= $jl->jenis_laporan ?> (<?= $report->laporan_luar_cangkupan ?>)</li>
                        <?php } else { ?>
                            <li><?= $jl->jenis_laporan ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                No data result
            <?php } ?>
        </td>
    </tr>
</table>

<b>Tempat dan waktu kasus terjadi</b>
<table class="table table-bordered">
    <tr class="bg-primary text-light">
        <th>Tanggal</th>
        <th>Provinsi</th>
        <th>Kota</th>
        <th>Kecamatan / Kelurahan</th>
    </tr>
    <?php foreach($kasus_terjadi as $kt){ 
        $date = date_create($kt->tanggal);    
    ?>
        <tr>
            <td><?= date_format($date, 'd F Y') ?></td>
            <td><?= $kt->provinsi ?></td>
            <td><?= $kt->kota ?></td>
            <td><?= $kt->kecamatan ?></td>
        </tr>
    <?php } ?>
</table>

<?php if($report->kasus_sebelumnya == 'ya'){ ?>
    <b>Kasus sebelumnya</b>
    <table class="table table-bordered">
        <tr class="bg-primary text-light">
            <th>Tanggal</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Kecamatan / Kelurahan</th>
        </tr>
        <?php if(isset($kasus_sebelumnya)){ ?>
            <?php foreach($kasus_sebelumnya as $ks){
                $date = date_create($ks->tanggal);     
            ?>
            <tr>
                <td><?= date_format($date, 'd F Y') ?></td>
                <td><?= $ks->provinsi ?></td>
                <td><?= $ks->kota ?></td>
                <td><?= $ks->kecamatan ?></td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4" class="text-center">No data result</td>
            </tr>
        <?php } ?>
        
    </table>
<?php } ?>

<?php if($report->sumber_informasi == 'pihak kedua'){ ?>
    <b>Informan pihak ke dua</b>
    <table class="table table-bordered">
        <tr class="bg-primary text-white">
            <th>Panggilan</th>
            <th>Nama</th>
            <th>Divisi</th>
        </tr>
        <?php if(isset($infoman)){ ?>
            <?php foreach($infoman as $i){ ?>
                <tr>
                    <td><?= $i->panggilan ?></td>
                    <td><?= $i->nama ?></td>
                    <td><?= $i->divisi ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="text-center" colspan="3">No data result</td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>

<b>Pihak Terlibat</b>
<table class="table table-bordered">
        <tr class="bg-primary text-white">
            <th>Panggilan</th>
            <th>Nama</th>
            <th>Divisi</th>
        </tr>
        <?php if(isset($pihak_terlibat)){ ?>
            <?php foreach($pihak_terlibat as $pt){ ?>
                <tr>
                    <td><?= $pt->panggilan ?></td>
                    <td><?= $pt->nama ?></td>
                    <td><?= $pt->divisi ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="text-center" colspan="3">No data result</td>
            </tr>
        <?php } ?>
</table>

<?php if($report->laporan_sebelumnya == 'ya'){ ?>
    <b>Laporan Sebelumnya</b>
    <table class="table table-bordered">
        <tr class="bg-primary text-white">
            <th>Panggilan</th>
            <th>Nama</th>
            <th>Divisi</th>
        </tr>
        <?php if(isset($laporan_sebelumnya)){ ?>
            <?php foreach($laporan_sebelumnya as $ls){ ?>
                <tr>
                    <td><?= $ls->panggilan ?></td>
                    <td><?= $ls->nama ?></td>
                    <td><?= $ls->divisi ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="text-center" colspan="3">No data result</td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php if($report->selain_anda == 2){ ?>
    <b>Pihak menyadari kasus selain anda</b>
    <table class="table table-bordered">
        <tr class="bg-primary text-white">
            <th>Panggilan</th>
            <th>Nama</th>
            <th>Divisi</th>
        </tr>
        <?php if(isset($pihak_lain)){ ?>
            <?php foreach($pihak_lain as $pl){ ?>
                <tr>
                    <td><?= $pl->panggilan ?></td>
                    <td><?= $pl->nama ?></td>
                    <td><?= $pl->divisi ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="text-center" colspan="3">No data result</td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php if($report->saksi == 'ya'){ ?>
    <b>Saksi</b>
    <table class="table table-bordered">
        <tr class="bg-primary text-white">
            <th>Panggilan</th>
            <th>Nama</th>
            <th>Divisi</th>
        </tr>
        <?php if(isset($saksi)){ ?>
            <?php foreach($saksi as $s){ ?>
                <tr>
                    <td><?= $s->panggilan ?></td>
                    <td><?= $s->nama ?></td>
                    <td><?= $s->divisi ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="text-center" colspan="3">No data result</td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>