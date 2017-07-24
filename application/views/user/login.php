
    <?php echo validation_errors()?>
    <?php echo form_open()?>
    <div class="login-page">
        <div class="form">
            <h1>Login</h1>
                <input type="email" name="email" placeholder="Email"/>
                <input type="password" placeholder="password" name="password"/>
                <button type="submit" name="login_submit">login</button>
        </div>
    </div>
    <?php echo form_close()?>