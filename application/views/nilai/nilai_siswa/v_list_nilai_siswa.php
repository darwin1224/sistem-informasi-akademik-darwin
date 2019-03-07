<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Nilai Siswa
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Nilai Siswa</li>
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
                            <form id="form-input-nilai-siswa">
                                <table id="datanilaisiswa"
                                    class="table table-striped table-bordered table-condensed table-hover"
                                    style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th width="12%">Golongan</th>
                                            <th width="12%">NIM</th>
                                            <th>Nama</th>
                                            <th width="10%">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdatanilaisiswa">
                                        <?php $no = 1;
                                        foreach ($siswa as $row): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no;
                                                $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->nama_golongan; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->id_siswa; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->nama_siswa; ?>
                                            </td>
                                            <td style="text-align: center;"><input type="text" name="inputnilai"
                                                    placeholder="0" class="inputNilaisiswa"
                                                    data-id="<?php echo $row->id_siswa; ?>"
                                                    value="<?php echo $this->M_nilai->check_nilai($row->id_siswa, $this->uri->segment(3)); ?>">
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
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

<?php $this->load->view('nilai/nilai_siswa/v_script_nilai_siswa'); ?>