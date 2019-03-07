<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Siswa
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered" style="font-size:13px;">
                                <tr>
                                    <td>Tahun Akademik</td>
                                    <td class="tahun-akademik-aktif">
                                        <?php echo $this->M_tahunakademik->get_tahun_akademik_aktif('tahun_akademik'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kurikulum</td>
                                    <td class="kurikulum-aktif">
                                        <?php echo $this->M_kurikulum->get_kurikulum_aktif('nama_kurikulum'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td class="semester-aktif">
                                        <?php echo $this->M_tahunakademik->get_tahun_akademik_aktif('semester_tahun_akademik'); ?>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <table id="datasiswa" class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>NIM</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tempat/Tgl Lahir</th>
                                        <th>Agama</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatasiswa">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('siswa/siswa_guru/v_script_siswa_guru'); ?>