<?php
/**
 * @file
 * Node template for reports
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php
  $category = $node->field_category[LANGUAGE_NONE][0]['taxonomy_term'];
  $status   = $node->field_status[LANGUAGE_NONE][0]['taxonomy_term'];
  ?>
  <div class="row">
    <div class="col-md-6">
      <header>
        <?php print render($title_prefix); ?>
        <?php if (!$page && $title): ?>
          <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($display_submitted): ?>
          <span class="submitted">
            <?php print $user_picture; ?>
            <?php print $submitted; ?>
          </span>
        <?php endif; ?>
        <div class="cat-stat-wrapper">
            <span class="label label-default marker-category col-<?php echo $category->field_category_hex[LANGUAGE_NONE][0]['value'] ?> col-md-6"><i class="icon-li icon-<?php echo $category->field_category_icon[LANGUAGE_NONE][0]['value'] ?> "></i> <?php echo $category->name?> </span> <span class="label label-default marker-status col-<?php echo $status->field_status_hex[LANGUAGE_NONE][0]['value'] ?> col-md-6"><i class="icon-li icon-<?php echo $status->field_status_icon[LANGUAGE_NONE][0]['value'] ?>"></i> <?php echo $status->name ?></span>
        </div>
      </header>
      <?php
        // Hide comments, tags, and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_tags']);
        print render($content['body']);
        print render($content['field_address']);
        print render($content['field_statement']);

      ?>
    </div>
    <div class="col-md-5 col-md-offset-1">
      <?php print render($content['field_geo']); ?>
    </div>
  </div>


  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>
  <div class="row">
    <div class="col-md-6">
      <?php print render($content['comments']); ?>
    </div>
    <div class="col-md-5 col-md-offset-1 ">
      <?php if (!empty($content['field_image'])): ?>
      <div class="thumbnail">
        <?php print render($content['field_image']); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</article> <!-- /.node -->
