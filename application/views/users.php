<?php include 'adminhead.php'; ?>
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

    <!-- ========== Pop Up Add Users  - block begin ========== -->
    <div id="dialog-form" title="Create new user">
        <p class="validateTips">All form fields are required.</p>
        <form>
            <fieldset>
                <label for="name">Name</label>
                <input type="text" name="name" id="newname" required="required" class="text ui-widget-content ui-corner-all">
                <label for="email">Email</label>
                <input type="email" name="email" id="newemail" value="" required="required" class="text ui-widget-content ui-corner-all">
                <label for="password">Password</label>
                <input type="password" name="password" id="newpassword" value="" required="required" class="text ui-widget-content ui-corner-all">
            </fieldset>
        </form>
    </div>
    <!-- ========== Pop Up Add Users  - block end ========== -->

    <!-- ========== Pop Up Edit Users  - block begin ========== -->
    <div id="dialog-edit" title="Edit User">
        <p class="validateTips">All form fields are required.</p>
        <form>
            <fieldset>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required="required" class="text ui-widget-content ui-corner-all">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="" required="required" class="text ui-widget-content ui-corner-all">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="" required="required" class="text ui-widget-content ui-corner-all">
            </fieldset>
        </form>
    </div>
    <!-- ========== Pop Up Edit Users  - block end ========== -->

    <!-- ========== Pop Up Delete Users  - block begin ========== -->
    <div id="dialog-confirm" title="Delete data?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>
    <!-- ========== Pop Up Delete Users  - block begin ========== -->

    <section class="grid_12">
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Users Management
            </div>

            <div class="inside">
                <!-- Forms -->
                <table id="userTable1" class="display">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users->result() as $row) {
                            echo '<tr>';
                            echo '<td>' . $row->user_name . '</td>';
                            echo '<td>' . $row->user_email . '</td>';
                            echo '<td>' . $row->user_password . '</td>';
                            echo '<td><a href="#" class="edit-user" value=' . $row->user_id . '>Edit</a> | <a href="#" class="delete-user" value=' . $row->user_id . '>Delete</a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Form footer Begin-->
                <section class="box_footer">
                    <div class="grid-12-12">
                        <button id="create-user" class="right button green">Create new user</button>
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
                "Create an account": function() {

                    iname = $("#newname").val();
                    iemail = $("#newemail").val();
                    ipass = $("#newpassword").val();

                    var bValid = true;

                    bValid = bValid && iname;
                    bValid = bValid && iemail;
                    bValid = bValid && ipass;

                    if (bValid)
                    {
                        var data = {"user": iname,
                            "email": iemail,
                            "pass": ipass,
                        };
                        var data_encoded = JSON.stringify(data);

                        url = "<?php echo site_url(); ?>/users/addUsers";

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
                    iname = $("#name").val();
                    iemail = $("#email").val();
                    ipass = $("#password").val();
                    iid = id;

                    var bValid = true;

                    bValid = bValid && iname;
                    bValid = bValid && iemail;
                    bValid = bValid && ipass;

                    if (bValid)
                    {
                        var data = {"user": iname,
                            "email": iemail,
                            "pass": ipass,
                            "id": iid,
                        };
                        var data_encoded = JSON.stringify(data);
                        url = "<?php echo site_url(); ?>/users/updateUsers";

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
                    $("#newname").val("");
                    $("#newemail").val("");
                });

        $(".edit-user")
                .click(function() {
                    $("#dialog-edit").dialog("open");

                    var tdValue = $(this).parent('td').parent('tr').children('td').map(function(index, val) {
                        return $(this).text();
                    }).toArray();
                    $("#name").val(tdValue[0]);
                    $("#email").val(tdValue[1]);
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