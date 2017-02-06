<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * @3riik web-design
 */
?>

<h1>Prihlásený</h1>
<a href="<?= site_url('admin/user/profile'); ?>"><?php echo $this->ion_auth->user()->row()->username; ?></a>
<p><a href="<?php echo site_url('admin/user/logout'); ?>">Odhlásiť</a></p>
