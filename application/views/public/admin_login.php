<div class="container">
    <?php if($this->session->flashdata('register')){ ?>
        <div class="col-md-12">
            <div class="col-lg-6">
                <div id="div1" class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('register'); ?></strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if($this->session->flashdata('email')){ ?>
        <div class="col-md-12">
            <div class="col-lg-6">
                <div id="div1" class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->flashdata('email'); ?></strong>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-md-12">
     <?php echo form_open('login/admin_login', ['class'=>'form-horizontal']); ?>
        <fieldset>
            <?php if($error = $this->session->flashdata('login_failed')) { ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $error ?></strong>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
                <label id="user" for="inputEmail" class="col-lg-2 control-label" style="color: black; font-size: 18px">Email*</label>
                <div class="col-lg-10">
                    <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email*','value'=>set_value('email')]) ?>
                </div>
            </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('email'); ?></div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label" style="color: black; font-size: 18px">Password*</label>
                <div class="col-lg-10">
                    <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password*','type'=>'password']) ?>
                </div>
            </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('password'); ?></div>
            </div>
            <div class="form-group">
                <div class=" col-lg-offset-1">
                    <?php echo form_submit('submit','Login',['class'=>'btn btn-primary']); ?>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
</div>

