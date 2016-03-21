<script>
    jQuery(document).ready(function() {
        jQuery('#userTable1').dataTable();
    });
</script>

<script>
    $("#bab")
            .change(function() {
                var bab_id = $("#bab").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/result_tabel/getTableList/" + bab_id,
                    success: function(data) {
                        $("#tabel").html(data);
                    }
                });
            })
            .change();
</script>
<script>
    jQuery(document).ready(function() {
        jQuery('#userTable1').dataTable();
    });

    $('#userTable1').dataTable({        
        "sScrollX": "100%",
        "bScrollCollapse": true
    });
</script>
