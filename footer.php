</main>
<div id="snowflakes" aria-hidden="true">
  <?php for ($x = 1; $x <= 12; $x++): ?>
    <div class="snowflake">
      <div class="inner">❅</div>
    </div>
  <?php endfor; ?>
</div>
<?php if (is_page(8)): ?>
  <div class="cloud"></div>
<?php endif;
wp_footer(); ?>
</body>

</html>