<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Laporan PDF</title>
<style>
    .line-title{
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }
</style>
</head><body>
    <img src="assets/invoice/apotek.png" style="position: absolute; width: 60px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    APOTEK SUSAH SEMBUH   
                    <br>Dukuh Zamrud
                        Sunburst CBD Lot.1.2
                        Jl. Dukuh Zamrud Blok Q
                        BEKASI - MUSTIKA JAYA 15322
                </span>
            </td>
        </tr>
                       <!-- </tbody> -->
              <!-- </table> -->
    </table>
    <hr class="line-title">
    <p style="text-align: center;">
        Laporan Data Transaksi <br>
    </p>
    <table class="table table-bordered" style="width: 100%;">
    <tr>
        <th style="text-align: center; background-color: #D5E12E;">No</th>
        <th style="text-align: center; background-color: #D5E12E;">Kode Nota</th>
        <th style="text-align: center; background-color: #D5E12E;">Type Transaksi</th>
        <th style="text-align: center; background-color: #D5E12E;">Nama Kasir</th>
        <!-- <th style="text-align: center;">Maiden Name</th> -->
        <th style="text-align: center; background-color: #D5E12E;">Waktu Transaksi</th>
        <th style="text-align: center; background-color: #D5E12E;">Total</th>
        <!-- <th style="text-align: center;">Birth Place</th> -->
        <th style="text-align: center; background-color: #D5E12E;">Bayar</th>
        <th style="text-align: center; background-color: #D5E12E;">Kembali</th>
        <th style="text-align: center; background-color: #D5E12E;">Status</th>
    </tr>
                <!-- </thead> -->
                <!-- <tbody> -->
                  <?php
                    $no = 1;
                    foreach($trx as $row) :
                   ?>
                  <tr>
                    <td style="text-align: center; width: 5%; background-color: #C7CAA6;"><?= $no++ .''?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?= $row->kd_nota?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?php if($row->type_trans == 1){
                        echo "trx obat";
                    }else {
                        echo "trx layanan";
                    } ?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?= $row->id_ksr?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?= $row->tgl?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?= $row->ttl?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?= $row->byr?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?= $row->kmbl?></td>
                    <td style="text-align: center; background-color: #C7CAA6;"><?php if($row->stst == 1){
                        echo "trx success";
                    }?></td>
                    <!-- <td style="text-align: center;"></td> -->
                    
                  </tr>
                  <?php endforeach; ?>
              </table>
</body></html>