<div class="content-page">
   <!-- Start content -->
   <div class="content">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="btn-group pull-right m-t-15">
                  <a href="<?php echo base_url('admin/user') ?>" class="btn btn-default dropdown-toggle waves-effect waves-light"><i class="glyphicon glyphicon-fast-backward"></i> Kembali <span class="m-l-5"></span></a>
               </div>
               <h4 class="page-title"><?php echo $judul?></h4>
               <ol class="breadcrumb">
                  <li>
                     <a href="<?php echo base_url('admin/dasbor')?>">Home</a>
                  </li>
                  <li class="active">
                     Tambah User
                  </li>
               </ol>
            </div>
         </div>

<?
echo validation_errors('<div class="alert alert-danger"> <i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/user/tambah'));
?>
         <div class="row">
            <div class="col-sm-12">
               <div class="card-box">
                  <h4 class="m-t-0 header-title"><b>Form <?php echo $judul?> : </b></h4>
                  <br>
                  <p class="text-muted m-b-30 font-13">
                     <a href="<?php echo base_url('admin/user') ?>" class="btn btn-info waves-effect waves-light"><i class="glyphicon glyphicon-fast-backward"></i> Kembali <span class="m-l-5"></span></a>
                  </p>


                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Nama</label>
                           <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama') ?>" required>
                        </div>

                        <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
                        </div>

                        <div class="form-group">
                           <label>Username</label>
                           <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
                        </div>

                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Level Hak Akses</label>
                           <select name="akses_level" class="form-control">
                              <option value="Admin">Admin</option>
                              <option value="User">User</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label >Keterangan Lain</label>
                           <textarea name="keterangan" class="form-control" placeholder="Keterangan" ><?php echo set_value('keterangan')?></textarea>
                        </div>
                     </div>
                  </div><hr>

                  <div class="button-list form-group text-center">
                      <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">
                         <span class="btn-label"><i class="fa fa-check"></i></span> Simpan Data
                      </button>

                      <button type="reset" name="reset" class="btn btn-danger waves-effect waves-light">
                         <span class="btn-label"><i class="fa fa-times"></i>
                         </span>Reset</button>
                  </div>
               </div>
            </div>
         </div>
<?
echo form_close();
?>
      </div> <!-- container -->

   </div> <!-- content -->
