<html lang="en">

<head>
  <?php $this->load->view("kasir/_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("kasir/_partials/navbar.php") ?>
    <div id="wrapper">

      <?php $this->load->view("kasir/_partials/sidebar.php") ?>

        <div id="content-wrapper">

          <div class="container-fluid">

            <?php $this->load->view("kasir/_partials/breadcrumb.php") ?>

              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-6">
                  <div class= "card mb-3">
                    <div class="card-header">
                    <a href="<?php echo site_url('kasir/layanan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                          <label for="name">Kode Nota</label>
                          <?php
                          if($trans == null) {
                            $kdNext= "T000";
                          }
                          else{
                            $kdNext = $trans->kd_nota;
                          }
                          if($kdNext != null)
                          {
                            $kd = substr($kdNext, 2);
                            $kd = $kd + 1;

                            if($kd <= 9)
                            {
                              $kd = "T00".$kd;
                            }
                            else if($kd <= 99)
                            {
                              $kd = "T0".$kd;
                            }
                            else
                            {
                              $kd = "T".$kd;
                            }

                          }?>
                          <input readonly value="<?php echo $kd ?>" class="form-control" type="text" name="kd_nota" placeholder="Kode Nota" id="kd_nota"/>
                          <div class="invalid-feedback">
                          </div>
                        </div>
                    <div class="row">
                            <div class="form-group col-md">
                              <label for="price">Total</label>
                              <input readonly class="form-control <?php echo form_error('byr') ? 'is-invalid':'' ?>" type="number" id="ttl" name="ttl" min="0" placeholder="Total" />
                              <div class="invalid-feedback">
                                <?php echo form_error('byr') ?>
                              </div>
                            </div>
                            <div class="form-group col-md">
                              <label for="price">Bayar</label>
                              <input class="form-control <?php echo form_error('byr') ? 'is-invalid':'' ?>" onChange="" type="number" id="byr" name="byr" min="0" placeholder="Bayar" />
                              <div class="invalid-feedback">
                                <?php echo form_error('byr') ?>
                              </div>
                            </div>

                            <div class="form-group col-md">
                              <label for="price">Kembalian</label>
                              <input readonly class="form-control <?php echo form_error('kmbl') ? 'is-invalid':'' ?>" type="number" name="kmbl" min="0" id="kmbl" placeholder="Kembalian" />
                              <div class="invalid-feedback">
                                <?php echo form_error('kmbl') ?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="form-group col-md">
                            <label for="price">Nama Pasien</label>
                            <select class="form-control <?php echo form_error('nama_lyn') ? 'is-invalid':'' ?>" onChange="lyn(this.value)" name="pasien_id" id="pasien_id">
                            <option value=""> ~Pilih Pasien~ </option>
                                <?php
                                  foreach ($pasien as $ps) {
                                    ?>
                                      <option value='{"pasien_id":"<?php echo $ps->pasien_id ?>","nama":"<?php echo $ps->nama_pasien ?>"}'><?php echo $ps->nama_pasien ?></option>
                                      
                                    <?php
                                  }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo form_error('id_pasien') ?>
                            </div>
                          </div>
                          <!-- <div class="form-group col-md">
                              <label for="price">Nama Pasien</label>
                              <input class="form-control <?php echo form_error('harga_layanan') ? 'is-invalid':'' ?>" type="text" name="nama_pasien"  id="nama_pasien" placeholder="Nama Pasien"  readonly/>
                              <div class="invalid-feedback">
                                <?php echo form_error('harga_layanan') ?>
                              </div>
                            </div> -->
                          <div class="form-group col-md">
                            <label for="price">Nama Layanan</label>
                            <select class="form-control <?php echo form_error('nama_lyn') ? 'is-invalid':'' ?>"  onChange="lyn(this.value)" name="kd_layanan" id="kd_layanan">
                            <option value=""> ~Pilih Layanan~ </option>
                                <?php
                                  foreach ($layanan as $ob) {
                                    ?>
                                      <option value='{"kd_layanan":"<?php echo $ob->kd_layanan ?>","hrg":"<?php echo $ob->harga_layanan ?>"}'><?php echo $ob->nama_lyn ?></option>
                                    <?php
                                  }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo form_error('nama_lyn') ?>
                            </div>
                          </div>
                            <div class="form-group col-md">
                              <label for="price">Harga Layanan</label>
                              <input class="form-control <?php echo form_error('harga_layanan') ? 'is-invalid':'' ?>" type="number" name="harga_layanan" min="0" id="harga_layanan" placeholder="Harga Layanan"  readonly/>
                              <div class="invalid-feedback">
                                <?php echo form_error('harga_layanan') ?>
                              </div>
                            </div>

                            <!-- <div class="form-group col-md ">
                              <label for="price"> Stok</label>
                              <input class="form-control <?php echo form_error('Stock') ? 'is-invalid':'' ?>" type="number" name="Stock" min="0" id="Stock" placeholder="Stock"  readonly/>
                              <div class="invalid-feedback">
                                <?php echo form_error('Stock') ?>
                              </div>
                            </div>   -->

                          </div>

                          <div class="row">
                          <!-- <div class="form-group col-md">
                            <label for="price">Jumlah </label>
                            <input class="form-control <?php echo form_error('qty') ? 'is-invalid':'' ?>" id="qty" type="number" name="qty"  placeholder="Jumlah"  />
                            <div class="invalid-feedback">

                              <?php echo form_error('qty') ?>
                            </div>
                          </div> -->
                          <div class="form-group col-md">
                            <label for="price">Sub Total</label>
                            <input class="form-control <?php echo form_error('Stock') ? 'is-invalid':'' ?>" type="number" name="sub_total" min="0" id="sub_total" placeholder="Sub Total"  readonly/>
                            <div class="invalid-feedback">
                              <?php echo form_error('sub_total') ?>
                            </div>
                          </div>
                          </div>
                          <div class="form-group ">

                            <button type="button" name="simpan" disabled id="simpan" class="btn btn-md btn-success" >Simpan</button> &nbsp; <button type="button" disabled id="addItem" name="addItem" class="btn btn-md btn-primary">Tambah Ke List</button>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col">
                  <div class="card mb-3">
                    <div class="card-header">
                      Form Transaksi
                    </div>
                    <div class="card-body">
                        <table class="table" id="data_tabel">
                          <thead>
                            <th>Kode Layanan</th>
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                            <th>Nama Pasien</th>
                            <th>Sub Total</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>

                    <div class="card-footer small text-muted">
                      * required fields
                    </div>
                    </div>

                  </div>
                  </div>
                  </form>
                  <!-- /.container-fluid -->

                  <!-- Sticky Footer -->
                  <?php $this->load->view("admin/_partials/footer.php") ?>

          </div>
          <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

        
    <!-- Logout Modal-->

    <?php $this->load->view("admin/_partials/modal.php") ?>

          <?php $this->load->view("admin/_partials/js.php") ?>
<script>
function lyn(selectObject){
  console.log(selectObject);
  var ob = JSON.parse(selectObject);
  // $("#nama_pasien").val(ob.nama);
  $('#harga_layanan').val(ob.hrg);
  // $('#Stock').val(ob.Stock);
  $("#sub_total").val(ob.hrg);
  if ($("#sub_total").val() !== '') {
        $('#addItem').removeAttr("disabled");
      }
}
  $(function(){

    $('#byr').keyup(function(){
      var byr = parseFloat($(this).val());
      var ttl = parseFloat($('#ttl').val());

      var kmbl = byr - ttl;

      $('#kmbl').val(kmbl);

      if($('#kmbl').val()>=0){
          $('#simpan').removeAttr("disabled");
      }else{
          $('#simpan').attr('disabled', 'disabled');
      }
    })
    //function quantiti * harga
    // $("#qty").keyup(function(){
    //   var Stock = parseInt($("#Stock").val())
    //   var hrg = $("#harga_obat").val();
    //   var qty = parseInt($("#qty").val())
    //   // console.log("qty "+qty)
    //   // console.log("stock "+Stock)
    //   var timeout =null;
    //   var sub = hrg*qty;

    //   // clearTimeout(timeout) 
    //   timeout = setTimeout(() => {
    //     if (qty >= Stock) {
    //      $("#qty").val(Stock);
    //     }else if($("#qty").val() === '') {
    //       $('#addItem').attr('disabled', 'disabled');
    //     }else{
    //       $('#addItem').removeAttr("disabled");
    //     }
    //   }, 300) 
    // });
      

  //Nambah Kwe table
  $('#addItem').click(function(){
  var ob = JSON.parse($("#kd_layanan option:selected").val());
  var lyn = JSON.parse($("#pasien_id option:selected").val());
    var pasien_id = lyn.pasien_id;
    var kd_layanan = ob.kd_layanan;
    var nama_lyn = $("#kd_layanan option:selected").text();
    var harga_layanan = $('#harga_layanan').val();
    var nama_pasien = $("#pasien_id option:selected").text();
    var sub_total = $('#sub_total').val();

    //proses nambahin ke table
    $('#data_tabel tbody:last-child').append(
      '<tr>'+
        '<td>'+kd_layanan+'</td>'+
        '<td>'+nama_lyn+'</td>'+
        '<td>'+harga_layanan+'</td>'+
        '<td>'+pasien_id+'</td>'+
        '<td id="subt">'+sub_total+'</td>'+
        '</tr>'
    );
    var sum = 0;
    // iterate through each td based on class and add the values
    $("#data_tabel tr").each(function(row, tr) {

        var value = $(tr).find('td:eq(4)').text();
        // add only if the value is number
        if(!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);
        }
    });

    $('#ttl').val(sum)
    //bersihin form
    $('#kd_layanan option').eq(0).prop('selected', true);
    $('#nama_layanan').val('');
    $('#harga_layanan').val('');
    $('#pasien_id').val('');
    $('#sub_total').val('');

  });


  //simpan semua
    $("#simpan").click(function(){
      var table_data = [];

      $('#data_tabel tr').each(function(row, tr){

        if($(tr).find('td:eq(0)').text()==""){

        }else{
          var sub = {
            'kd_nota':$('#kd_nota').val(),
            'kd_layanan':$(tr).find('td:eq(0)').text(),
            'pasien_id':$(tr).find('td:eq(3)').text(),
            'sub_total':$(tr).find('td:eq(4)').text()
          };
          table_data.push(sub);
        }
      });
      // //Pop Up
      swal({
        title: 'Simpan Semua Data?',
        text:'',
        type:'',
        showLoaderOnConfirm:true,
        showCancelButton:true,
        confirmButtonText:'Yups',
        closeOnConfirm: false
        })
        .then(function(){

            var kasir ='<?php echo $this->session->userdata('id') ?>';
            var byr = $('#byr').val();
            var kmbl = $('#kmbl').val();
            console.log(table_data)
            var data = {
              'data_table' : table_data,
              'id_ksr' : kasir,
              'kd_nota':$('#kd_nota').val(),
              'ttl': $('#ttl').val(),
              'byr': $('#byr').val(),
              'kmbl': $('#kmbl').val()

            };

            $.ajax({
              data: data,
              type:'POST',
              url:'<?php echo base_url('kasir/layanan/save'); ?>',
              dataType: 'json',
              success: function(result){
                if(result.status == "Success"){
                  swal('Transaksi Berhasil.','','success').then(function() {
                      window.location = "<?php echo base_url('kasir/layanan/') ?>";
                    });
                }else {
                  swal('Gagal Menyimpan','Silahkan Lakukan Kembali Atau Hubungi Admin','warning').then(function() {
                      window.location = "<?php echo base_url('kasir/layanan/add') ?>";
                    });
                }
              }
            });
      });
    });
  });
</script>
</body>

</html>
