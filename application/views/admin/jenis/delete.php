
<button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#Delete<?php echo $jenis->id_jenis ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span>Delete</button>
   <div id="Delete<?php echo $jenis->id_jenis ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel">Hapus Data Jenis : <?php echo $jenis->nama_jenis ?></h4>
               </div>
               <div class="modal-body">
                  <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin Ingin Menghapus Data Ini ?</p>
               </div>
               <div class="modal-footer">
                  <a href="<?php echo base_url('admin/jenis/delete/'.$jenis->id_jenis) ?>" class="btn btn-danger waves-effect waves-light" ><span class="btn-label"><i class="fa fa-trash-o"></i></span> Hapus Data</a>
                  <a href="<?php echo base_url('admin/jenis/edit/'.$jenis->id_jenis)?>" class="btn btn-success waves-effect waves-light"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</a>
                  <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
               </div>
          </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
