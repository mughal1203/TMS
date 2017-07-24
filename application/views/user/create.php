<div class="row">
    <div class="col-md-12">
        <h2>Create User</h2>
    </div>
</div>
<?php echo validation_errors()?>
<?php echo form_open('user/create');?>
<div class="row" style="background-color: white; padding: 20px; -webkit-border-radius:20px ;-moz-border-radius:20px ;border-radius:20px ;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Last Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="password">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Primary Phone No</label>
                        <input type="text" name="primary_no" placeholder="03XXXXXXXXX">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Secondary Phone No</label>
                        <input type="text" name="secondary_no" placeholder="03XXXXXXXXX">
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
                                <?php echo form_dropdown('city',$cities,'', ['class'=>'selectpicker form-control show-menu-arrow','data-style'=>"btn-new",'data-live-search'=>true,'data-size'=>5])?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="md-textarea" placeholder="Address" name="address"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-check-label">User Type</label>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo form_dropdown('Role',$user_type,'', ['class'=>'selectpicker form-control show-menu-arrow','data-style'=>"btn-new"])?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-deep-orange btn-large pull-right">Submit</button>
        </div>
    </div>
</div>
<?php echo form_close()?>
<?php
/*    $keys = array_keys($cities);
    $count = count($keys);
    for ($i=0; $i<$count;$i++){
        $myKey[$i] = $cities[$keys[$i]];
    }
*/?><!--
<script>
    $('body').css('background-color','#ddd');
    var myArray = <?php /*echo json_encode($myKey)*/?>;
    $('.itemName').select2({
        placeholder: "Select an option",
        allowClear: true,
        data: myArray
    });
</script>-->