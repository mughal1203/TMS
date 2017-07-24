<div class="row">
    <div class="col-md-12">
        <h2>Edit User</h2>
    </div>
</div>
<?php echo validation_errors()?>
<div class="tabbable-panel">
    <div class="tabbable-line">
        <ul class="nav nav-tabs ">
            <li class="active"><a href="#tab1" data-toggle="tab">User Edit</a></li>
            <li><a href="#tab2" data-toggle="tab">Password Reset</a></li>
            <li><a href="#tab3" data-toggle="tab">Upload Photo</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?php echo form_open('user/create');?>
                <div class="row" style="background-color: white; padding: 20px; -webkit-border-radius:20px ;-moz-border-radius:20px ;border-radius:20px ;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <div class="col-md-12">
                                    <input type="text" name="email" value="<?php echo $user['email'];?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" placeholder="First Name" value="<?php echo $user['first_name'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $user['last_name'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Primary Phone No</label>
                                        <input type="text" name="primary_no" placeholder="03XXXXXXXXX" value="<?php echo $user_phones['primary_no'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Secondary Phone No</label>
                                        <input type="text" name="secondary_no" placeholder="03XXXXXXXXX" value="<?php echo $user_phones['secondary_no'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo form_dropdown('city',$cities,$user_address['city'], ['class'=>'selectpicker form-control show-menu-arrow','data-style'=>"btn-new",'data-live-search'=>true,'data-size'=>5])?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="md-textarea" placeholder="Address" name="address"><?php echo $user_address['address']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-check-label">User Type</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo form_dropdown('Role',$user_type,$user['user_type_id'], ['class'=>'selectpicker form-control','data-style'=>"btn-new"])?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-deep-orange btn-large pull-right">Submit</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close()?>
            </div>
            <div class="tab-pane" id="tab2">
                <h2>tab2</h2>
            </div>
            <div class="tab-pane" id="tab3">
                <h2>tab3</h2>
            </div>
        </div>
    </div>
</div>