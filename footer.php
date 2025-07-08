</main>
<div id="snowflakes" aria-hidden="true">
  <?php for ($x = 1; $x <= 12; $x++): ?>
    <div class="snowflake">
      <div class="inner">❅</div>
    </div>
  <?php endfor; ?>
</div>
<?php if (is_front_page()):
  for ($x = 1; $x <= 3; $x++): ?>
    <div class="mountain" id="mountain-<?php echo $x; ?>">
      <div class="mountain-top">
        <div class="mountain-cap-1"></div>
        <div class="mountain-cap-2"></div>
      </div>
    </div>
  <?php endfor; ?>
  <div class="cloud"></div>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>

</html>