<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
  <?php if ($picture) { print $picture; }?>

  <?php if ($page == 0) { ?>
    <?php if ($title) { ?>
      <h2 class="title"><a href="<?php print $node_url?>"><?php print $title?></a></h2>
    <?php }; ?>
  <?php }; ?>

  <?php if ($submitted) { ?>
    <span class="submitted"><?php print $submitted?></span> 
  <?php }; ?>

  <?php if ($terms) { ?>
    <span class="taxonomy">Filed Under: <?php
    foreach($node->taxonomy as $tid => $taxo)
      $taxo_links[] = l($taxo->name,"taxonomy/term/$taxo->tid", array('title' => $taxo->name));
    print implode(', ',$taxo_links);
  ?></span>
  <?php }; ?>

  <div class="content"><?php print $content?></div>
  <div class="clear-block clear"></div>

  <?php if ($links): ?>
    <div class="links">&raquo; <?php print $links; ?></div>
  <?php endif; ?>

</div>

