<script>
    $(function() {
        $('#edit').froalaEditor({
            // Set custom buttons with separator between them.
            toolbarButtons: ['fullscreen', '|', 'bold', 'italic', 'strikeThrough','fontFamily','color', 'underline', '|', 'fontSize', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|', 'insertImage', 'insertLink', 'insertVideo', 'insertFile', 'html','undo', 'redo'],
            toolbarButtonsXS: ['fullscreen', '|', 'bold', 'italic', 'strikeThrough','fontFamily','color', 'underline', '|', 'fontSize', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|', 'insertImage', 'insertLink', 'insertVideo', 'insertFile', 'html','undo', 'redo'],
            toolbarButtonsSM: ['fullscreen', '|', 'bold', 'italic', 'strikeThrough','fontFamily','color', 'underline', '|', 'fontSize', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|', 'insertImage', 'insertLink', 'insertVideo', 'insertFile', 'html','undo', 'redo'],
            toolbarButtonsMD: ['fullscreen', '|', 'bold', 'italic', 'strikeThrough','fontFamily','color', 'underline', '|', 'fontSize', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|', 'insertImage', 'insertLink', 'insertVideo', 'insertFile', 'html','undo', 'redo'],
            height: 300
        })
    });
</script>
<div class="container">
<?php echo form_open_multipart('admin/add_newsletter', ['class'=>'form-horizontal']); ?>
    <div class="container-fluid">
        <div class="row">
            <h2 class="demo-text">Dodaj clanak</h2>
            <div class="container">
                <div class="row">
                    <h4>Naslov*: </h4>
                    <div>
                        <input class="form-control" type="text" name="title" placeholder="Naslov" size="50" required="" value="<?php if(isset($_POST['title'])) echo $_POST['title'] ?>"><br><br>
                    </div>
                    <h4>Tekst: </h4>
                    <div class="col-lg-12 nopadding">
                        <textarea id="edit" name="description" ><?php if(isset($_POST['description'])) echo $_POST['description'] ?></textarea><br>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <h4>Dodaj sliku*: </h4>
                                <div class="col-lg-3">
                                    <!--< ?php echo form_upload(['name'=>'userfile[]','class'=>'form-control', 'multiple']) ?>-->
                                    <input type="file" name="userfile" id="userfile">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"><span style="color: red; font-size: 15px; margin-top: 10px"><?php echo @$error_upload;  ?></span></div>
                    </div>
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <td colspan="2">
                            <input class="btn btn-primary btn-lg" type="button" name="cancel" value="Otkazi" onClick="window.location='<?= base_url('dashboard') ?>';" />
                            <input type="submit" name="submit" value="Dodaj Clanak" class="btn btn-primary btn-lg" align="right">
                            <!-- onclick=" $('#txtEditor').val($('.Editor-editor').text());"-->
                        </td>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>
</div>