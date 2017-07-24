<?php
    $this->load->view('templates/header');
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="col-md-9">
        <section>
            <?php $this->load->view($subview);?>
        </section>
    </div>
    <div class="col-md-3">
        <section>
            <div class="row"><?php echo mailto('aliraza_1203@outlook.com','<i class="fa fa-user"></i>'.'aliraza_1203@outlook.com');?></div>
            <div class="row"><?php echo anchor('logout',"<i class='fa fa-power-off'></i>".'logout')?></div>
        </section>
    </div>
</div>
<?php
$this->load->view('templates/footer');