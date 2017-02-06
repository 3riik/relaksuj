<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * @3riik web-design
 */
?>



  <h1>Novinky</h1>
  <div class="line"></div>
<?php if (!$this->ion_auth->logged_in())
{
     echo '<p>Prihláste sa prosím.</p>';
}
?>




