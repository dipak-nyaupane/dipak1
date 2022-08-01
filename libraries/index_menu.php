<?php  $ICON = "40"; ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="active">
        <form action='index.php' method='post'>
	<input class=hidden name='o' value='home'>
        <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
      	<img src="images/home.png" width="<?php print $ICON; ?>"> Home
	</button>
        </form>
 	</li>

        <li>
        <form action='index.php' method='post'>
	<input class=hidden name='o' value='erp'>
        <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
      	<img src="images/erp_logo.png" width="<?php print $ICON; ?>"> imERP
	</button>
        </form>
 	</li>


        <li>
        <form action='index.php' method='post'>
	<input class=hidden name='o' value='attendance'>
        <button type="submit" class="btn btn-default" style="border:none;background:none;"></span> 
      	<img src="images/attendance.png" width="<?php print $ICON; ?>"> Attendence System
	</button>
        </form>
 	</li>

      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Email Us</a></li>
            <li><a href="#">Bookmark This Page</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="index.php?id=m">Mission</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>