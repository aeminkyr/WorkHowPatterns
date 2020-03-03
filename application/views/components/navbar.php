<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?=base_url()?>"><b>SQUADRON</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li id="home" class="nav-item">
        <a class="nav-link" href="<?=base_url()?>">Anasayfa <span class="sr-only">(current)</span></a>
      </li>
      <li id ="dead" class="nav-item">
        <a class="nav-link" href="<?=base_url('deadlines')?>">Deadlines</a>
      </li>
      <li id="crew" class="nav-item">
        <a class="nav-link" href="<?=base_url('crew')?>">Ekip</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="nav-link" href="#"><?=$this->session->userdata('email');?></a>
    </span>
    <span class="navbar-text">        
      <a class="nav-link" href="<?=base_url('auth/logout')?>">Logout</a>
    </span>
  </div>
</nav>
