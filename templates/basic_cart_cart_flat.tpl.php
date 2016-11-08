<?php
/**
 * @file
 * Basic cart shopping cart html template
 */
?>

<?php if (empty($cart)): ?>
  <p><?php print t('Your shopping cart is empty.'); ?></p>
<?php else: ?>
  <h2>Your item list</h2>
  <div class="basic-cart-cart basic-cart-grid">
    <?php if(is_array($cart) && count($cart) >= 1): ?>
      <?php foreach($cart as $nid => $node): ?>
        <div class="basic-cart-cart-contents row">
          <div class="basic-cart-cart-node-title cell">
            <?php print l($node->title, 'node/' . $node->nid); ?>
            <span class="basic-cart-cart-node-summary"><?php print $node->field_sku['und'][0]['value']; ?></span>
          </div>

          <div class="basic-cart-cart-quantity cell"><?php print $node->basic_cart_quantity; ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
<?php endif; ?>
