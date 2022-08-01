<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">

    <?php if ($TAB=='tab1') { ?><li role="presentation" class="active"><?php } else { ?><li role="presentation"><?php } ?>
      <a href="#detail" aria-controls="family" role="tab" data-toggle="tab"><?php print $TITLE_ID; ?> Detail</a>
    </li>     
  </ul>

  <div class="tab-content">

  <div role="tabpanel" class="tab-pane <?php if ($TAB=='tab1') { print 'active'; } ?>" id="detail">
  <div class="container" style="width:100%">
  <?php include("detail.php"); ?>
  </div>
  </div>

  <div role="tabpanel" class="tab-pane <?php if ($TAB=='tab2') { print 'active'; } ?>" id="contact">
  <div class="container" style="padding:5px;width:100%">
  <?php include("contact.php"); ?>
  </div>
  </div>


  <div role="tabpanel" class="tab-pane" id="custom">
  <div class="container" style="padding:5px;width:100%">
  <?php include("../libraries/custom_info.php"); ?>
  </div>
  </div>

  <div role="tabpanel" class="tab-pane" id="history">
  <div class="container" style="padding:5px;width:100%">
  <?php include("../libraries/history.php"); ?>
  </div>
  </div>

  </div>


