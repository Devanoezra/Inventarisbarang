<div class="block-header">
    <h1 style="text-align: center;font-family: courier;">Peminjam</h1>
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
                                <th>NO</th> <th>ID</th> <th>NAMA PEMINJAM</th> <th>ALAMAT</th> <th>NO TELP</th>
                                <th>AKSI</th>
                            </tr>
                            <?php
                            $no=0;
                            foreach ($data_peminjam as $dt_pem) {
                                $no++;
                                echo '<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$dt_pem->id_peminjam.'</td>
                                        <td>'.$dt_pem->nama_peminjam.'</td>
                                        <td>'.$dt_pem->alamat.'</td>
                                        <td>'.$dt_pem->telepon.'</td>

                                        <td><a href="#update_peminjam" class="btn btn-warning" data-toggle="modal"
                                        onclick="tm_details('.$dt_pem->id_peminjam.')">Update</a>
                                        <a href="'.base_url('index.php/peminjam/hapus_peminjam/'.$dt_pem->id_peminjam).'
                                        "class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Delete</a></td>
                                </tr>';
                            }
                            ?>
                            <tr>

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
        <h4 class="modal-title">Tambah Peminjam</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
        Nama Peminjam
        <input type="text" name="nama_peminjam" class="form-control"><br>
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
        Alamat
        <input type="text" name="alamat" class="form-control"><br>
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
        No Telepon
        <input type="text" name="telepon" class="form-control"><br>
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="update_peminjam">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Peminjam</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/peminjam/update_peminjam')?>" method="post">
        <input type="hidden" name="id_peminjam" id="id_peminjam">
        Nama Peminjam
        <input id="nama_peminjam" type="text" name="nama_peminjam" class="form-control"><br>
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
        Alamat
        <input id="alamat" type="text" name="alamat" class="form-control"><br>
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
        No Telepon
        <input id="telepon" type="text" name="telepon" class="form-control"><br>
        <form action="<?=base_url('index.php/peminjam/simpan_peminjam')?>" method="post">
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
function tm_details(id_user) {
    $.getJSON("<?=base_url()?>index.php/peminjam/get_detail_peminjam/"
    +id_user,function(data){
      $("#id_peminjam").val(data['id_peminjam']);
      $("#nama_peminjam").val(data['nama_peminjam']);
      $("#alamat").val(data['alamat']);
      $("#telepon").val(data['telepon']);

    });
}
</script>
