<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * 3riik
 */
?>
<div id="footer">
    <div class="line"></div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<?php echo $before_body;?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?= base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.dropdown-toggle').dropdown()
</script>
</body>

</html>