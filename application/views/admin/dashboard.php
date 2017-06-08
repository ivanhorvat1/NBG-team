<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
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
<script>
    $(document).ready(function () {
        $('#multiselect').click(function() {
            if (this.checked){
                $('.p').each(function () {
                    this.checked = true;
                });
            }else
            {
                $('.p').each(function () {
                    this.checked = false;
                });
            }
        })
    });
</script>
<div class="container">
    <div class="col-md-12">
    <?php if($this->session->flashdata('news')){
        $class = $this->session->flashdata('classN') ?>
        <div class="row" style="margin-left: 250px; margin-bottom: -100px">
            <div class="col-lg-6">
                <div id="div1" class="alert alert-dismissible <?= $class ?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('news'); ?></strong>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="col-md-12">
        <h4>Dobrodosao <?php
            echo $user->firstname." ". $user->lastname;
            ?>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-6">
            <?= anchor('admin/store_newsletter','Dodaj clanak',['class'=>'btn bg-primary btn-lg pull-right']) ?>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-10">
            <form method="post" action="<?= base_url('admin/delete_all_newsletters') ?>">
                <?php if (count($news)) { ?>
                <div class="col-md-1">
                <input type="checkbox" name="multiselect" id="multiselect">
                </div><br><br>
                <div class="col-md-2">
                    <button type="submit" name="submit"  class="btn btn-danger" onclick="return doconfirm();">Delete</button>
                </div><br><br><br>
                <?php } ?>
            <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($news)) {
                        foreach ($news as $n) {
                            ?>
                            <tr>
                                <td><input type="checkbox" class="p" name="brisi[]" value="<?php echo $n['id']; ?>"></td>
                                <td><?= $n['title'] ?></td>
                                <td><a href="<?= base_url("admin/edit_newsletter/{$n['id']}") ?>" title="edit">
                                        <span style="font-size:0.8em;" class="glyphicon glyphicon-pencil btn btn-primary btn-sm "></span></a>
                                    <a href="<?= base_url("admin/delete_newsletter/{$n['id']}") ?>" title="delete">
                                        <span style="font-size:0.8em;" class="glyphicon glyphicon-trash btn btn-danger btn-sm " onclick="return doconfirm();"></span></a>
                                    <a href="<?= base_url("admin/view_newsletter/{$n['id']}") ?>" title="view">
                                        <span style="font-size:0.8em;" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm "></span></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <td><h4>Dodajte clanak</h4></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
            </table>
            </form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all"
            }]
        });
    });
</script>

