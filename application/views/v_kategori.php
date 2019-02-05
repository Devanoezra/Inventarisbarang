<div class="block-header">
    <h1 style="text-align: center; font-family: courier;">Kategori</h1>
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
                        <a href="#tambah" class="btn btn-primary btn-lg active" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>
                            <table class="table table-hover table-striped">
                            <tr>
                                <th>NO</th> <th>ID</th> <th>NAMA KATEGORI</th> <th>AKSI</th>
                            </tr>
                            <?php
                            $no=0;
                            foreach ($data_kategori as $dt_kat) {
                                $no++;
                                echo '<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$dt_kat->id_kategori.'</td>
                                        <td>'.$dt_kat->nama_kategori.'</td>
                                        <td><a href="#update_kategori" class="btn btn-warning" data-toggle="modal"
                                        onclick="tm_details('.$dt_kat->id_kategori.')">Update</a>
                                        <a href="'.base_url('index.php/kategori/hapus_kategori/'.$dt_kat->id_kategori).'
                                        "class="btn btn-primary btn-lg active" data-toggle="modal" onclick="return confirm(\'anda yakin\')">Delete</a></td>
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
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/kategori/simpan_kategori')?>" method="post">
        Nama Kategori
        <input type="text" name="nama_kategori" class="form-control"><br>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
        <div class="modal fade" id="update_kategori">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Update Kategori</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url('index.php/kategori/update_kategori')?>" method="post">
                <input type="hidden" name="id_kategori" id="id_kategori">
                Nama Kategori
                <input id="nama_kategori" type="text" name="nama_kategori" class="form-control"><br>
                <form action="<?=base_url('index.php/kategori/simpan_kategori')?>" method="post">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>

function tm_details(id_kat) {
    $.getJSON("<?=base_url()?>index.php/kategori/get_detail_kategori/"
    +id_kat,function(data){
      $("#id_kategori").val(data['id_kategori']);
      $("#nama_kategori").val(data['nama_kategori']);


    });
}
</script>
