<div class="block-header">
    <h1 style="text-align: center;font-family: courier;">Transaksi</h1>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">

                                </div>

                            </div>

                        </div>
                        <div class="body">
                        <div class="row">
                        <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>
                            <table class="table table-hover table-striped">
                            <tr>
                                <th>NO</th> <th>ID</th> <th>PEMINJAM</th> <th>TANGGAL PEMINJAM</th> <th>BARANG</th> <th>JUMLAH BARANG</th>
                                <th>AKSI</th>
                            </tr>
                            <?php
                            $no=0;
                            foreach ($data_transaksi as $dt_tran) {
                                $no++;
                                echo '<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$dt_tran->id_transaksi.'</td>
                                        <td>'.$dt_tran->nama_peminjam.'</td>
                                        <td>'.$dt_tran->tanggal_peminjam.'</td>
                                        <td>'.$dt_tran->nama_barang.'</td>
                                        <td>'.$dt_tran->jumlah_barang.'</td>

                                        <td><a href="#update_transaksi" class="btn btn-warning" data-toggle="modal"
                                        onclick="tm_details('.$dt_tran->id_transaksi.')">Update</a>
                                        <a href="'.base_url('index.php/transaksi/hapus_transaksi/'.$dt_tran->id_transaksi).'
                                        "class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Delete</a></td>
                                </tr>';
                            }
                            ?>
                            <tr>
                                <td></td> <td></td> <td></td>
                            </tr>
                            </table>
        <?php if ($this->session->flashdata('pesan')!=null): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('pesan');?>
                            </div>
                <?php endif ?>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Transaksi</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/transaksi/simpan_transaksi')?>" method="post">
        ID Peminjam
        <select name="id_peminjam">
        <?php
        foreach($data_peminjam as $dt_pem)
        {
              echo "<option value='".$dt_pem->id_peminjam."'>
              ".$dt_pem->nama_peminjam."
              </option>";
        }
        ?>
        </select>
        <br><br>
        Tanggal Peminjam
        <input type="text" name="tanggal_peminjam" class="form-control"><br>
        <form action="<?=base_url('index.php/transaksi/simpan_transaksi')?>" method="post">

        ID Barang
        <select name="id_barang">

        <?php
        foreach($data_barang as $dt_brg)
        {
              echo "<option value='".$dt_brg->id_barang."'>
              ".$dt_brg->nama_barang."
              </option>";
        }
        ?>
        </select>
        <br><br>
        Jumlah Barang
        <input  type="text" name="jumlah_barang" class="form-control"><br>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_transaksi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Transaksi</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/transaksi/update_transaksi')?>" method="post">
        <input type="hidden" name="id_transaksi" id="id_transaksi">
        ID Peminjam
        <select id="id_peminjam" name="id_peminjam">
        <?php
        foreach($data_peminjam as $dt_pem)
        {
              echo "<option value='".$dt_pem->id_peminjam."'>
              ".$dt_pem->nama_peminjam."
              </option>";
        }
        ?>
        </select>
        <br><br>
        Tanggal Peminjam
        <input type="text" id="tanggal_peminjam" name="tanggal_peminjam" class="form-control"><br>
        <form action="<?=base_url('index.php/transaksi/simpan_transaksi')?>" method="post">

        ID Barang
        <select  id="id_barang" name="id_barang" >

        <?php
        foreach($data_barang as $dt_brg)
        {
              echo "<option value='".$dt_brg->id_barang."'>
              ".$dt_brg->nama_barang."
              </option>";
        }
        ?>
        </select>
        <br><br>
        Jumlah Barang
        <input  type="text" name="jumlah_barang" id="jumlah_barang" class="form-control"><br>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>



    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

function tm_details(id_trans) {
    $.getJSON("<?=base_url()?>index.php/transaksi/get_detail_transaksi/"
    +id_trans,function(data){
      $("#id_transaksi").val(data['id_transaksi']);
      $("#id_peminjam").val(data['id_peminjam']);
      $("#tanggal_peminjam").val(data['tanggal_peminjam']);
      $("#id_barang").val(data['id_barang']);
      $("#jumlah_barang").val(data['jumlah_barang']);


    });
}
</script>
