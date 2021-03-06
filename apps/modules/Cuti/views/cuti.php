<?php $this->load->view('_heading/_headerContent') ?>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-md-2">
                <?php
                $a = "SELECT a.add
                 FROM menu_akses a left join tbl_menu b on a.id_menu=b.id_menu 
                 where b.id_menu= '65' and a.grup_id= '" . $this->session->userdata('grup_id') . "'";
                $cek = $this->db->query($a)->row_array();
                if ($cek['add'] != 0) { ?>
                    <a class="klik ajaxify" href="<?php echo site_url('add-cuti'); ?>"><button class="btn btn-primary" data-toogle="modal" data-target="#examplemodal"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button></a>
                <?php } else {
                } ?>
            </div>
        </div>

        <!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No.Surat</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Tgl Cuti</th>
                            <th>Tgl Berakhir</th>
                            <th>Jenis Cuti</th>
                            <th>Sisa Cuti</th>
                            <th>Ket</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th style="width:125px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    //untuk load data table ajax	


    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({
            "processing": false, //Feature control the processing indicator.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Cuti/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{

            }, ],

        });

    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    $(document).on("click", ".hapus-cuti", function() {
        var no_surat = $(this).attr("data-id");

        swal({
                title: "Hapus Data?",
                text: "Yakin anda akan menghapus data ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                confirmButtonColor: '#dc1227',
                customClass: ".sweet-alert button",
                closeOnConfirm: true,
                html: true
            },
            function() {
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url('Cuti/Cuti/hapus'); ?>",
                    data: "no_surat=" + no_surat,
                    success: function(data) {
                        $("tr[data-id='" + no_surat + "']").fadeOut("fast", function() {
                            $(this).remove();
                        });
                        hapus_berhasil();
                        reload_table();
                    }
                });
            });
    });
</script>