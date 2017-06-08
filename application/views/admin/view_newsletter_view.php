<div class="container">
    <?php
    $id_news = $this->uri->segment(3);
    if(@$news->id == $id_news) { ?>
        <h3>Naslov: <?= $news->title ?></h3><br>
        <h5>Tekst: </h5>
        <?php //$news->description
        $text = wordwrap($news->description, 2, "\n", false);
        echo $text;
         ?>
        <?php if (!empty($news->image_path)) { ?>
            <div class="well">
                <img style="border-radius: 10px;" src="<?= base_url($news->image_path) ?>" width="400" height="300" alt="No picture">
            </div>
        <?php }
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







