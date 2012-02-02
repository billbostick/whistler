<?php
// $Id: $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language ?>" xml:lang="<?php print $language ?>">
<head>
<title><?php print $head_title ?></title>
<?php print $head ?><?php print $styles ?><?php print $scripts ?>
<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>

<?php if (theme_get_setting('whistler_width')) { ?>
<?php $width = theme_get_setting('whistler_fixedwidth'); ?>
  <style type="text/css">
    #page-container { width : <?php print theme_get_setting('whistler_fixedwidth') + 4 ?>px; }
		.page-right { width: <?php print theme_get_setting('whistler_fixedwidth') + 4 ?>px;}
		.page-left { width: <?php print theme_get_setting('whistler_fixedwidth') ?>px;}
  </style>
<?php } 
  else { ?>
  <style type="text/css">
    #page-container {
      width: 95%;
    }
  </style>
<?php }  ?>
 
<?php if ($left_sidebar_width = theme_get_setting('whistler_leftsidebarwidth')) { ?>
  <style type="text/css">
     body.sidebar-left #main { margin-left: -<?php print $left_sidebar_width ?>px; }
     body.sidebars #main { margin-left: -<?php print $left_sidebar_width ?>px; }
     body.sidebar-left #squeeze { margin-left: <?php print $left_sidebar_width ?>px; }
     body.sidebars #squeeze { margin-left: <?php print $left_sidebar_width ?>px; }
     #sidebar-left { width: <?php print $left_sidebar_width ?>px; }
     body.sidebar-left #mcc, body.sidebars #mcc { background-position: -<?php print (950 - $left_sidebar_width) ?>px 0; }
  </style>
<?php }  ?>

<?php if ($right_sidebar_width = theme_get_setting('whistler_rightsidebarwidth')) { ?>
  <style type="text/css">
     body.sidebar-right #main { margin-right: -<?php print $right_sidebar_width ?>px; }
     body.sidebars #main { margin-right: -<?php print $right_sidebar_width ?>px; }
     body.sidebar-right #squeeze { margin-right: <?php print $right_sidebar_width ?>px; }
     body.sidebars #squeeze { margin-right: <?php print $right_sidebar_width ?>px; }
     #sidebar-right { width: <?php print $right_sidebar_width ?>px; }
  </style>
<?php }  ?>

<?php if (theme_get_setting('whistler_fontfamily')) { ?>
  <style type="text/css">
    body {
      font-family : <?php print theme_get_setting('whistler_fontfamily') ?>;
    }
  </style>
<?php }  ?>

<?php if (theme_get_setting('whistler_fontfamily') == 'Custom') { ?>
  <?php if (theme_get_setting('whistler_customfont')) { ?>
    <style type="text/css">
       body {
         font-family : <?php print theme_get_setting('whistler_customfont') ?>;
       }
     </style>
  <?php }  ?>
<?php }  ?>

<?php if (theme_get_setting('whistler_iepngfix')) { ?>
<!--[if lte IE 6]>
  <script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
  </script> 
<![endif]-->
<?php } ?>

<?php if (theme_get_setting('whistler_usecustomlogosize')) { ?>
  <style type="text/css">
    img#logo {
      width : <?php print theme_get_setting('whistler_logowidth') ?>px;
      height: <?php print theme_get_setting('whistler_logoheight') ?>px;
    }
  </style>
<?php }  ?>
<!--[if IE]>
  <style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie.css";</style>
<![endif]-->
<!--[if lte IE 6]>
  <style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie6.css";</style>
<![endif]-->
<?php if ($suckerfish) { ?>
  <?php if (theme_get_setting('whistler_suckerfish')) { ?>
    <script type="text/javascript" src="<?php print $GLOBALS['base_url'] ."/"; print $directory; ?>/js/suckerfish.js"></script>
  <?php }  ?>
<?php } ?>
<script type="text/javascript" src="<?php print $GLOBALS['base_url']."/"; print $directory; ?>/js/pickstyle.js"></script>
</head>
<body<?php print phptemplate_body_class($sidebar_left, $sidebar_right); ?>>
  <div id="page-container">
  <div class="page-right">
  <div class="page-left">
  <div id="page">
    <div id="masthead">
      <div id="header" class="clear-block">
        <div class="header-right">
          <div class="header-left"> <?php print $search_box; ?>
            <div id="logo-title">
              <?php if ($logo): ?>
                <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo" /> </a>
              <?php endif; ?>
            </div><!-- /logo-title -->
            <div id="name-and-slogan">
              <?php if ($site_name): ?>
                <h1 id='site-name'> <a href="<?php print $base_path ?>" title="<?php print t('Home'); ?>"> <?php print $site_name; ?> </a> </h1>
              <?php endif; ?>
              <?php if ($site_slogan): ?>
                <div id='site-slogan'> <?php print $site_slogan; ?> </div>
              <?php endif; ?>
            </div><!-- /name-and-slogan -->
            <?php if ($header): ?>
              <div style="clear:both"></div>
            <?php print $header; ?>
          <?php endif; ?>
        </div><!-- /header-left -->
      </div><!-- /header-right -->
    </div><!-- /header -->
  </div>
  <?php if ($primary_links): ?>
    <div id="primary" class="clear-block"> <?php print theme('menu_links', $primary_links); ?> </div>
  <?php endif; ?>
  <?php if ($secondary_links): ?>
    <div id="secondary" class="clear-block"> <?php print theme('menu_links', $secondary_links); ?> </div>
  <?php endif; ?>
  <?php if ($suckerfish): ?>
		<div id="suckerfishmenu" class="clear-block">
			<?php print $suckerfish; ?>
		</div>
  <?php endif; ?>
  <?php if ($primary_links || $suckerfish): ?>
    <div id="nav-bottom"></div>
  <?php endif; ?>
  <?php if ($banner): ?>
    <div id="banner" class="clear-block"> <?php print $banner; ?></div>
  <?php endif; ?>
<div id="mcc">
  <div id="middlecontainer">
    <?php if ($sidebar_left) { ?>
      <div id="sidebar-left">
        <?php print $sidebar_left ?>
      </div>
    <?php } ?>
    <div id="main">
      <div id="squeeze">
  <?php
    $section1count = 0;
    if ($user1) { 
      $section1count++; 
    }
    if ($user2) { 
      $section1count++; 
    }
    if ($user3) {
      $section1count++; 
    }
    if ($user4) {
      $section1count++; 
    }
  ?>
  <?php if ($section1count): ?>
    <?php $section1width = 'width'. floor(99 / $section1count); ?>
    <div class="clear-block clr" id="section1">
      <div class="sections">
        <?php if ($user1): ?>
          <div class="section user1 <?php echo $section1width ?>"><?php print $user1; ?></div>
        <?php endif; ?>
        <?php if ($user2): ?>
          <div class="section user2 <?php echo $section1width ?>"><?php print $user2; ?></div>
        <?php endif; ?>
        <?php if ($user3): ?>
          <div class="section user3 <?php echo $section1width ?>"><?php print $user3; ?></div>
        <?php endif; ?>
        <?php if ($user4): ?>
          <div class="section user4 <?php echo $section1width ?>"><?php print $user4; ?></div>
        <?php endif; ?>
      </div>
      <div class="section1-bottom" style="clear:both"></div>
    </div><!-- /section1 -->
  <?php endif; ?>
        <div id="squeeze-contents">
        <?php if (theme_get_setting('whistler_breadcrumb')): ?>
          <?php if ($breadcrumb): ?>
            <div id="breadcrumb"> <?php print $breadcrumb; ?> </div>
          <?php endif; ?>
        <?php endif; ?>
        <?php if ($mission) { ?>
          <div id="mission"><?php print $mission ?></div>
        <?php } ?>
        <?php if ($content_top):?>
          <div id="content-top"><?php print $content_top; ?></div>
        <?php endif; ?>
        <?php if ($title) { ?><h1 class="title"><?php print $title ?></h1><?php } ?>
        <div class="tabs"><?php print $tabs ?></div>
        <?php print $help ?>
        <?php print $messages ?>
        <?php print $content; ?> 
        <?php print $feed_icons; ?>
        <?php if ($content_bottom): ?>
          <div id="content-bottom">
            <?php print $content_bottom; ?>
          </div>
        <?php endif; ?>
      </div><!-- /squeeze-contents -->
      </div><!--/squeeze-->
    <?php if ($sidebar_right) { ?>
      <div id="sidebar-right">
        <?php print $sidebar_right ?>
      </div>
    <?php } ?>
    </div><!--/main-->
  </div><!--middle-container-->
</div>
  <div style="clear:both"></div>
  <?php
    $section2count = 0;
      if ($user7) {
        $section2count++; 
      }
      if ($user5) {
        $section2count++; 
      }
      if ($user6) {
        $section2count++; 
      }
      if ($user7) {
        $section2count++; 
      }
      if ($user8) {
        $section2count++; 
      }
  ?>
  <?php if ($section2count): ?>
    <?php $section2width = 'width'. floor(99 / $section2count); ?>
    <div class="clear-block clr" id="section2">
      <div class="sections">
        <?php if ($user5): ?>
          <div class="section user5 <?php echo $section2width ?>"><?php print $user5; ?></div>
        <?php endif; ?>
        <?php if ($user6): ?>
          <div class="section user6 <?php echo $section2width ?>"><?php print $user6; ?></div>
        <?php endif; ?>
        <?php if ($user7): ?>
          <div class="section user7 <?php echo $section2width ?>"><?php print $user7; ?></div>
        <?php endif; ?>
        <?php if ($user8): ?>
          <div class="section user8 <?php echo $section2width ?>"><?php print $user8; ?></div>
        <?php endif; ?>
      </div><!--sections-->
      <div style="clear:both"></div>
    </div><!-- /section2 -->
  <?php endif; ?>
  <div id="footer-wrapper" class="clear-block">
    <div class="footer-right">
      <div class="footer-left">
  <div id="footer">
    <?php if ($footer_region) { ?>
      <div id="footer-region">
        <?php print $footer_region?>
      </div>
    <?php } ?>
    <div id="footer-message">
      <?php if ($footer_message) { ?>
        <?php print $footer_message ?>
      <?php } ?>
      <br />
<script type="text/javascript">
<!-- Hide Script
	function move_in(img_name,img_src) {
	document[img_name].src=img_src;
	}

	function move_out(img_name,img_src) {
	document[img_name].src=img_src;
	}
//End Hide Script-->
<?php
  $logoPath = base_path() . path_to_theme() . '/roopletheme2.png';
  $logoRolloverPath = base_path() . path_to_theme() . '/roopletheme.png'; 

?>
</script>
<a href="http://www.roopletheme.com" onmouseover="move_in('rtlogo','<?php print $logoRolloverPath ?>')" onmouseout="move_out('rtlogo','<?php print $logoPath ?>')" title="RoopleTheme!" target="_blank"><img class="rtlogo" src="<?php print $logoPath ?>" name="rtlogo" alt="RoopleTheme!"/></a>
    </div><!--footer-message-->
  </div><!--footer-->
      </div><!-- /footer-left -->
    </div><!-- /footer-right -->
  </div><!-- /footer-wrapper -->
  <?php print $closure ?> 
  </div><!-- /page -->
  </div><!-- /page-left -->
  </div><!-- /page-right -->
  </div><!-- /page-container -->
</body>
</html>
