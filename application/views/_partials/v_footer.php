<?php
$query = $this->db->get('tbl_sekolah');
if ($query->num_rows() > 0) {
    $row = $query->row_array();
}
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo $row['nama_sekolah']; ?></a></strong> |
    <?php echo $row['telepon_sekolah']; ?> | <?php echo $row['email_sekolah']; ?> All rights reserved.
</footer>