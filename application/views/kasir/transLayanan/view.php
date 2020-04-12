<!DOCTYPE html>
<html lang="id"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Invoice</title>
    <style>
        #backgroundCuk:before{
                content: "";
                position: absolute;
                z-index: -1;
                align-content: center;
                width: 100%;
                height: 100%;

                 background: url(<?php echo base_url('assets/invoice/apotek.png') ?>) center no-repeat;
                 width: 790px;
                opacity: .2;
            }
    </style>
</head>

<body style="font-family: open sans, tahoma, sans-serif; margin: 0; -webkit-print-color-adjust: exact">

<div style="
    background-size: contain;
    position: relative;
    z-index: 1;" id=backgroundCuk>

    <table class="container" style="width: 790px; padding: 20px;" width="790" cellspacing="0" cellpadding="0">
        <tbody><tr>
            <td>
                <table style="width: 100%; padding-bottom: 20px;" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="margin-top: 8px; margin-bottom: 8px;">
                            <td>
                                <img src=<?php echo base_url('assets/invoice/apotek.png') ?> alt="Apotek Susah Sembuh" style="max-height: 50px; max-height: 50px">
                            </td>
                            <td style="text-align: right; padding-right: 15px;">
                                <a style="color: #42B549; font-size: 14px; text-decoration: none;" href="javascript:window.print()">
                                    <span style="vertical-align: middle">Cetak</span>
                                    <img src=<?php echo base_url('assets/invoice/print.png') ?> alt="Print" style="vertical-align: middle; max-height: 20px; max-height: 20px;">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; padding-bottom: 20px;" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="font-size: 20px; font-weight: 600;">
                            <td style="padding-bottom: 5px;">
                                <span>Invoice</span>
                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td style="padding-bottom: 5px;">
                                <span>Diterbitkan atas nama:</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 10px;">
                                <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody><tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 80px; font-weight: 600; padding: 3px 20px 3px 0;" width="80">Kasir</td>
                                                        <td style="padding: 3px 0;"><?php echo $trans->nama ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 80px; font-weight: 600; padding: 3px 20px 3px 0;" width="80">Kode Nota</td>
                                                        <td style="padding: 3px 0;"><?php echo $trans->kd_nota ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px;">
                                        <td>
                                            <table style="width: 100%; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 80px; font-weight: 600; padding: 3px 20px 3px 0;" width="80">Tanggal</td>
                                                        <td style="padding: 3px 0;"><?php echo tgl_ind($trans->tgl) ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; text-align: center; border-top: 1px solid rgba(0,0,0,0.1); border-bottom: 1px solid rgba(0,0,0,0.1); padding: 15px 0;" width="100%" cellspacing="0" cellpadding="0">
                    <thead style="font-size: 14px;">
                    <tr><th style="font-weight: 600; text-align: left; padding: 0 5px 15px 15px;">Nama Pasien</th>
                        <!-- <tr><th style="font-weight: 600; text-align: left; padding: 0 5px 15px 15px;">Nama Layanan</th> -->
                        
                        <th style="width: 115px; font-weight: 600; padding: 0 5px 15px;" width="115">Nama Layanan</th>
                        <th style="width: 115px; font-weight: 600; text-align: right; padding: 0 30px 15px 5px;" width="115">Harga Layanan</th>
                        <th style="width: 115px; font-weight: 600; text-align: right; padding: 0 30px 15px 5px;" width="115">Total</th>
                    </tr></thead>
                    <tbody>

                        <?php
                            // perulangan list kranjang
                            $total = 0;
                            foreach ($listTrans as $key) {
                                // echo "Nama obat".$key->nama_obat  ;
                                // # code...
                        ?>
                
                        <tr style="font-size: 13px;">
                        <td style="text-align: left; padding: 8px 5px 8px 15px;">
                                <span style="display: block; width: 270px;"><?php echo $key->nama_pasien ?></span>





                                <br>





                            </td>
                            <td style="width: 120px; padding: 8px 5px;" width="120"><?php echo $key->nama_lyn ?></td>
                            <td style="width: 115px; padding: 8px 5px;" width="115"><?php echo 'Rp'.number_format($key->harga_layanan,2,',','.')?></td>
                            <td style="width: 115px; text-align: right; padding: 8px 30px 8px 5px;" width="115"><?php echo 'Rp'.number_format($key->sub_total,2,',','.')  ?></td>
                        </tr>

                        <?php
                            $total = $total + $key->sub_total;
                            }
?>


                        <tr style="font-size: 13px; background-color: rgba(0,0,0,0.1);" bgcolor="#F1F1F1">
                            <td colspan="4" style="font-weight: 600; text-align: left; padding: 8px 5px 8px 15px;">Subtotal</td>
                            <td style="width: 115px; font-weight: 600; text-align: right; padding: 8px 30px 8px 5px;" width="115">Rp <?php echo 'Rp'.number_format($total,2,',','.')  ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody></table>
    </div>



</body></html>
