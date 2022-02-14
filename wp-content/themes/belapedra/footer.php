<footer>

   <div class="footer-container">

      <ul class="footer-informacoes">
         <li>BELAPEDRA</li>
         <li>JOSÉ BONIFÁCIO, 670 - GAURAMA - RS</li>
         <li>CEP: 99830-000</li>
         <li>FONE: +55 (54) 3391 1850</li>
         <li>E-MAIL: CONTATO@BELAPEDRA.COM.BR</li>
      </ul>


      <div class="footer-direita">
         <?php
         wp_nav_menu(array(
            'menu' => 'Footer',
            'menu_class' => 'footer-menu'
         ));
         ?>
         <div class="footer-extras">
            <p>Acompanhe no Google Plus <img src="/wp-content/themes/belapedra/assets/images/google.png" alt="Google Plus"></p>
            <img src="/wp-content/themes/belapedra/assets/images/bandeira_br.png" alt="PTBR">
            <img src="/wp-content/themes/belapedra/assets/images/bandeira_usa.png" alt="US">
         </div>
         <div class="astrus-logo">
            <img src="/wp-content/themes/belapedra/assets/images/astrus_logo.png" alt="Logo da Astrus">
         </div>
      </div>
   </div>

</footer>


<?php wp_footer(); ?>
</body>

</html>