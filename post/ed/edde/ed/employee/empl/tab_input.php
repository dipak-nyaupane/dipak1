<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#detail<?php print $MY_ID; ?>" aria-controls="detail" role="tab" data-toggle="tab"><?php print $TITLE_ID; ?> Detail</a>
    </li>  
  </ul>

  <!-- Tab panes detail-->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="detail<?php print $MY_ID; ?>">
  <div class="container" style="width:100%">
  <?php include("detail_input.php"); ?>
  </div>
  </div>

  </div>


