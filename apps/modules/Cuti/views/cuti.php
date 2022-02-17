<?php $this->load->view('_heading/_headerContent') ?>

<style>
    .select-kategori {
        width: 150px;
    }
</style>


<section class="content">
    <div class="box">
        <div class="box-header">


            <div class="col-md-2">
                <a class="klik ajaxify" href="<?php echo site_url('add-daftar'); ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button></a>
            </div>
            -
        </div>

        <!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Pengajuan</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Tanggal Cuti</th>
                            <th>Jenis Cuti</th>
                            <th>Sisa Cuti</th>
                            <th>Keperluan</th>
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
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "order": [], //Initial no order.
            oLanguage: {
                //
            },
            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

        });

    });


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }
    $(document).on("click", ".hapus-trainer", function() {
        var id_login = $(this).attr("data-id");

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
        }, );
    });
</script>