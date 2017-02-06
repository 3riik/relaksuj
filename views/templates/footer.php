<?php

/* 
 * 3riik
 */
?>
<div id="footer">
    <div class="line"></div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<?php echo $before_body;?>

</body>
</html>