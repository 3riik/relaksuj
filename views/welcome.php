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
	<div class="box">
  <p class="warning">Toto je reprezentatívna stránka. Pre prihlásenie a overenie funkčnosti použite tieto údaje: </p>
  <p>Meno: <i>administrator</i></p>
  <p>Heslo: <i>password</i></p>
  </div>
 

  

  
