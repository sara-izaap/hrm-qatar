
<section class="container-fluid login-page">
  <div class="row">
    <div class="login-container">
          <div class="m_bottom"><img src="<?php echo include_img_path();?>logo.jpg" alt="MIQAS SOLUTIONS.WLL"></div>
          <div class="form-box">
        <form name="login" method="POST">
              <div class="form-group">
                <input name="email" type="text" placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                
                <?php if(validation_errors() || $this->session->flashdata('log_fail1')==TRUE):?>
                <div id="output">

                  <?php echo validation_errors(); ?>

                  <?php if($this->session->flashdata('log_fail1')==TRUE){

                    echo "<p>".$this->session->flashdata('log_fail1')."</p>";
                  }?>

                </div>
                <?php endif;?>

              </div>
              <div class="form-group">
            <label for="forGot" class="custom-checkbox">Remember me!</label>
            <input type="checkbox" name="forGot" id="forGot">
          </div>
          <button class="btn login" type="submit">Login</button>
        </form>
        <div>  </div>
      </div>
    </div>
  </div>
</section>