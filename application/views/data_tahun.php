<?php include 'head.php'; ?>
<section id="container" class="container_12">
    <!-- ========== Pop Up Style  - block begin ========== -->
    <style>
        body { font-size: 75%; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <!-- ========== Pop Up Style  - block end ========== -->

    <!-- ========== Pop Up Add Year  - block begin ========== -->
    <div id="dialog-form" title="Tambahkan Tahun">
        <p class="validateTips">All form fields are required.</p>
        <form>
            <fieldset>
                <label for="name">Tahun</label>
                <input type="text" name="tahun" id="newtahun" required="required" class="text ui-widget-content ui-corner-all validate[required,custom[onlyNumberSp]] ">
            </fieldset>
        </form>
    </div>
    <!-- ========== Pop Up Add Year  - block end ========== -->

    <!-- ========== Pop Up Edit Year  - block begin ========== -->
    <div id="dialog-edit" title="Edit Tahun">
        <p class="validateTips">All form fields are required.</p>
        <form>
            <fieldset>
                 <label for="name">Tahun</label>
                <input type="text" name="tahun" id="tahunedit" required="required" class="text ui-widget-content ui-corner-all validate[required,custom[onlyNumberSp]] ">
            </fieldset>
        </form>
    </div>
    <!-- ========== Pop Up Edit Year  - block end ========== -->

    <!-- ========== Pop Up Delete Year  - block begin ========== -->
    <div id="dialog-confirm" title="Delete data?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>
    <!-- ========== Pop Up Delete Year  - block begin ========== -->

    <section class="grid_12">
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Data Tahun
            </div>

            <div class="inside">
                <!-- Forms -->
                <table id="userTable1" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tahun</th> 
							<th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tahun->result() as $row) {
                            echo '<tr>';
                            echo '<td>' . $row->TAHUN_ID . '</td>';
                            echo '<td>' . $row->TAHUN_TAHUN . '</td>'; 
							echo '<td><a href="#" class="edit-tahun" value=' . $row->TAHUN_ID . '>Edit</a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Form footer Begin-->
                <section class="box_footer">
                    <div class="grid-12-12">
                        <button id="create-user" class="right button green">Tambahkan Tahun</button>
                    </div>
                    <div class="clear"></div>
                </section>
                <!-- Form footer End-->
            </div>
        </div>
    </section>
</section>
<div class="clear"></div>

<script>
    jQuery(document).ready(function() {
        jQuery('#userTable1').dataTable();
    });
    $(function() {
        var id;

        $("#dialog-form").dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Tambah": function() {

                    itahun = $("#newtahun").val(); 

                    var bValid = true; 
					
                    bValid = bValid && itahun;
					
					var text = /^[0-9]+$/;
					
					if ((itahun != "") && (!text.test(itahun))) {

						alert("Masukkan Angka");
						 bValid = false;
						 return false;
					}

					if (itahun.length != 4) {
						alert("Input Tahun Tidak Benar");  bValid = false;
						 return false;
					}
					
					var current_year=new Date().getFullYear();
					if((itahun < 1920) ) {
						alert("Range Tahun antara 2000 sampai 2099");
						  bValid = false;
						  return false;
					}					
					 
                    if (bValid)
                    {
                        var data = {"tahun": itahun 
                        };
                        var data_encoded = JSON.stringify(data);

                        url = "<?php echo site_url(); ?>/data_tahun/addTahun";

                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: url,
                            data: {'data': data_encoded
                            },
                            success: function() {
                                location.reload();
                            },
                        });
                    }

                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                allFields.val("").removeClass("ui-state-error");
            }

        });

        $("#dialog-edit").dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Update": function() {
                    itahun = $("#tahunedit").val(); 
                    iid = id;

                    var bValid = true;

                    bValid = bValid && itahun; 
					
					if ((itahun != "") && (!text.test(itahun))) {

						alert("Masukkan Angka");
						 bValid = false;
						 return false;
					}

					if (itahun.length != 4) {
						alert("Input Tahun Tidak Benar");  bValid = false;
						 return false;
					}
					
					var current_year=new Date().getFullYear();
					if((itahun < 1920) ) {
						alert("Range Tahun antara 2000 sampai 2099");
						  bValid = false;
						  return false;
					}	

                    if (bValid)
                    {
                        var data = {"tahun": itahun, 
                            "id": iid,
                        };
                        var data_encoded = JSON.stringify(data);
                        url = "<?php echo site_url(); ?>/data_tahun/updateTahun";

                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: url,
                            data: {'data': data_encoded
                            },
                            success: function() {
                                location.reload();
                            },
                        });
                    }
                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                allFields.val("").removeClass("ui-state-error");
            }

        });

        $("#dialog-confirm").dialog({
            autoOpen: false,
            resizable: false,
            height: 140,
            modal: true,
            buttons: {
                "Delete data": function() {

                    url = "<?php echo site_url(); ?>/users/deleteUsers";

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {'data': id
                        },
                        success: function() {
                            location.reload();
                        },
                    });
                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            }
        });

        $("#create-user")
                .button()
                .click(function() {
                    $("#dialog-form").dialog("open");
                    $("#newtahun").val(""); 
                });

        $(".edit-tahun")
                .click(function() {
                    $("#dialog-edit").dialog("open");

                    var tdValue = $(this).parent('td').parent('tr').children('td').map(function(index, val) {
                        return $(this).text();
                    }).toArray();
					$("#id").val(tdValue[0]); 
                    $("#tahunedit").val(tdValue[1]); 
                    id = $(this).attr("value");
                });

        $(".delete-user")
                .click(function() {
                    $("#dialog-confirm").dialog("open");
                    id = $(this).attr("value");
                });
    });
</script>	


<?php include 'footer.php'; ?>