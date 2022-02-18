<?php get_header();
$titulo = get_field('titulo');
$descricao = get_field('descricao_titulo');
$captcha = get_field('captcha');
$mapa = get_field('mapa');
?>


<?php if (have_posts()) :
   echo '<main id="page-contato">';

   while (have_posts()) : the_post();
      echo '<div class="titulo-contato">';
      echo '<h1>' . $titulo . '</h1>';
      echo '<p>' . $descricao . '</p>';
      echo '</div>'; ?>


      <div class="formulario">
         <form action="">
            <input type="text" id="contato-nome" placeholder="NOME" required>
            <input type="text" id="contato-telefone" placeholder="TELEFONE" required>
            <input type="email" id="contato-email" placeholder="E-MAIL" required>

            <select id="contato-pais" required name="country">
               <option id="option-disable" value disabled selected hidden>PAÍS</option>

               <?php
               // $resp = get_JSON('https://servicodados.ibge.gov.br/api/v1/localidades/paises');
               $resp = get_JSON('http://www.geonames.org/childrenJSON?geonameId=6255150&username=demo');
               foreach ($resp->geonames as $country) {
                  // echo '<option value="' . $country->id->M49 . '">' . $country->nome . '</option>';
                  echo '<option value="' . $country->geonameId . '">' . $country->countryName . '</option>';
               }
               ?>

            </select>

            <select id="contato-estado" required>
               <option id="option-disable" value disabled selected hidden>ESTADO</option>

               <?php
               // $selectOption = $_POST['country'];
               // $resp = get_JSON("http://www.geonames.org/childrenJSON?geonameId=");
               // foreach ($resp as $state) {
               //    echo '<option value="' . $state->id . '">' . $state->nome . '</option>';
               // }
               ?>

            </select>
            <select id="contato-cidade" required>
               <option id="option-disable" value disabled selected hidden>CIDADE</option>
               <option>Erechim</option>
            </select>



            <textarea type="text" id="contato-mensagem" placeholder="MENSAGEM" required></textarea>
            <div class="captcha">
               <?= $captcha ?>
            </div>
            <button type="submit" id="contato-submit">ENVIAR</button>
         </form>
      </div>

      <div class="mapa">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3536.199841106131!2d-52.09868628395608!3d-27.58733328284185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e30bf1dc24d6d7%3A0xd9d67886b56f8679!2sR.%20Jos%C3%A9%20Bonif%C3%A1cio%2C%20670%20-%20Gaurama%2C%20RS%2C%2099830-000!5e0!3m2!1spt-PT!2sbr!4v1645100474535!5m2!1spt-PT!2sbr" width=100% height=100% style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

<?php endwhile;
   echo '</main>';
endif; ?>


<?php get_footer(); ?>