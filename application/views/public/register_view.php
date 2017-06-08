<div class="container">
    <?php echo form_open('login/register', ['class'=>'form-horizontal']); ?>
    <fieldset>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label id="user" for="inputEmail" class="col-lg-3 control-label" style="color: black; font-size: 18px">First Name*</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'firstname','class'=>'form-control','placeholder'=>'First Name*','value'=>set_value('firstname')]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('firstname'); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label id="user" for="inputEmail" class="col-lg-3 control-label" style="color: black; font-size: 18px">Last Name*</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'lastname','class'=>'form-control','placeholder'=>'Last Name*','value'=>set_value('lastname')]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('lastname'); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label id="user" for="inputEmail" class="col-lg-3 control-label" style="color: black; font-size: 18px">Email*</label>
                    <div class="col-lg-9">
                        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email*','value'=>set_value('email')]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('email'); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" style="color: black; font-size: 18px">Password*</label>
                    <div class="col-lg-9">
                        <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password*','type'=>'password']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('password'); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label" style="color: black; font-size: 18px">Confirm Password*</label>
                    <div class="col-lg-9">
                        <?php echo form_password(['name'=>'passconf','class'=>'form-control','placeholder'=>'Confirm Password*','type'=>'password']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="font-size: 18px"> <?php echo form_error('passconf'); ?></div>
        </div>
        <div class="form-group">
            <div class=" col-lg-offset-1">
                <?php echo form_submit('submit','Register',['class'=>'btn btn-primary']); ?>
            </div>
        </div>
    </fieldset>
    </form>

</div>