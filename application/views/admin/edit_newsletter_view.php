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
<script>
    function doconfirm()
    {
        job=confirm("Are you sure to delete permanently?");
        if(job!=true)
        {
            return false;
        }
    }
</script>
<div class="container">
    <?php
    $id_news = $this->uri->segment(3);
    if(@$news->id == $id_news) {
        echo form_open_multipart("admin/update_newsletter/{$news->id}", ['class' => 'form-horizontal']); ?>
        <div class="container-fluid">
            <div class="row">
                <h2 class="demo-text">Edituj clanak</h2>
                <div class="container">
                    <div class="row">
                        <h4>Naslov: </h4>
                        <div>
                            <input class="form-control" type="text" name="title" placeholder="Naslov" size="50"
                                   value="<?= $news->title ?>"><br><br>
                        </div>
                        <h4>Tekst: </h4>
                        <div class="col-lg-12 nopadding">
                            <textarea id="edit" name="description"><?= $news->description ?></textarea><br>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h4>Dodaj sliku: </h4>
                                    <div class="col-lg-8">
                                        <?php echo form_upload(['name' => 'userfile', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"><span style="color: red; font-size: 15px"><?php echo @$error_upload; ?></span></div>
                        </div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4">
                            <td colspan="2">
                                <input class="btn btn-primary btn-lg" type="button" name="cancel" value="Otkazi"
                                       onClick="window.location='<?= base_url('dashboard') ?>';"/>
                                <input type="submit" name="submit" value="Edituj Clanak" class="btn btn-primary btn-lg"
                                       align="right">
                                <!-- onclick=" $('#txtEditor').val($('.Editor-editor').text());"-->
                            </td>
                        </div>
                        <div class="col-md-12"></div>
                        <?php if (!empty($news->image_path)) { ?>
                            <div class="well" style="margin-top: 50px">
                                <img style="border-radius: 10px;" src="<?= base_url($news->image_path) ?>" width="200" height="150">
                                <input type="hidden" name="old_image" value="<?= $news->image_path ?>">
                            </div>
                        <?php } ?>
                        <!--<span style="font-size: 15px; margin-left: 100px; margin-top: -20px" class='glyphicon glyphicon-trash btn btn-danger' title="delete" onclick="return doconfirm();"></span>-->
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close();
        if (!empty($news->image_path)) { ?>
            <?php echo form_open('Admin/delete_image/' . $news->id, ['id' => 'form']); ?>
            <input type="hidden" name="image" value="<?= $news->image_path ?>">
            <input style="margin-left: 80px; margin-top: -20px" type="submit" name="submit" class='btn btn-danger'
                   value="Delete" onclick="return doconfirm();">
            <?php echo form_close();
        }
    }
    else
    {
        ?>
        <div class="alert alert-warning col-md-4">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning</strong> Clanak koji trazite ne postoji!!<br> Molimo vas vratite se na <?= anchor('dashboard', 'pocetnu stranicu') ?>
        </div>
        <?php
    }
    ?>
</div>