      <?php session_start(); ?>
      <?php require 'navbar.php'; ?> 
      <center><h4>Mapa</h4></center>

    <form class="filtros" action="#">     
       <center><h4 style="margin-top:3%;">Filtros:</h4></center>
       	<p>Categoria:</p>
        <input name="categoria" type="radio" value="adocao" id="adocao" checked class="with-gap" />
        <label for="adocao">
            <span>Adoção</span>
        </label>
        <input name="categoria" type="radio" value="perdido" id="perdido" class="with-gap" />
        <label for="perdido">
            <span>Perdido</span>
        </label>
        <input name="categoria" type="radio" value="encontrado" id="encontrado" class="with-gap" />
        <label for="encontrado">
            <span>Encontrado</span><br />
        </label><br/>
        <p style="margin-top: 10%;">Especie:</p>
        <input name="especie" type="radio" value="cachorro" id="cachorro" checked class="with-gap" />
        <label for="cachorro">
            <span>Cachorro</span>
        </label>
        <input name="especie" type="radio" value="gato" id="gato" class="with-gap" />
        <label for="gato">
            <span>Gato</span>
        </label>
        <input name="especie" type="radio" value="outro" id="outro" class="with-gap" />
        <label for="outro">
            <span>Outros</span>
        </label><br />
        
        <center><input type="submit" class="blue-grey darken-4 btn" name="Filtrar" value="filtrar" style="margin-top:5%;margin-bottom: 3%;"></center>
    
    </form>
  
    <br/>
    
  <div id="explicacao">  
  
  <!-- Botão DOAÇÃO -->
  <a class="waves-effect btn btnexp modal-trigger" href="#modal1"><img class="material-icons left" src="img/iconeAzul.png">Doação</a>
	<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Doação</h4>
      <p>Os pets em azul no mapa estão para disponíveis para doação.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Fechar</a>
    </div>
  </div>
  
  <br/>
  
  <!-- Botão PERDIDOS -->
  <a class="waves-effect btn btnexp modal-trigger" href="#modal2"><img class="material-icons left" src="img/iconeVermelho.png">Perdidos</a>
  
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Perdidos</h4>
      <p>Os pets em vermelho no mapa estão perdidos.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Fechar</a>
    </div>
  </div>
  
  <br/>
  
  <!-- Botão ENCONTRADOS -->
  <a class="waves-effect btn btnexp modal-trigger" href="#modal3"><img class="material-icons left" src="img/iconeVerde.png">Encontrados</a>
  
  <div id="modal3" class="modal">
    <div class="modal-content">
      <h4>Encontrados</h4>
      <p>Os pets em verde no mapa foram encontrados.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Fechar</a>
    </div>
  </div>
  
  <script>
  $(document).ready(function(){
    $('.modal').modal();
  });
  </script> 
        
</div>
	
  <br/>

	<div id="map"></div>
            <script>
      var map;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -13.700000, lng: -47.9200000},
          mapTypeControl: false,
          streetViewControl: false,
          fullscreenControl: false,
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        <?php 
        require "ajax/conexao.php";
                $stmt = $conn->query("SELECT idmapa, latitude, longitude, tipo FROM mapa INNER JOIN animal ON mapa.idanimal = animal.idanimal;");
                $result = $stmt->fetchAll();
                if($result){
                  foreach ($result as $row) { ?>
                  if ('<?php echo $row['tipo']; ?>' == 'perdido') {
                    var imgMarcador = 'img/iconeVermelho.png'
                  } else if('<?php echo $row['tipo']; ?>' == 'doacao') {
                    var imgMarcador = 'img/iconeAzul.png'
                  } else {
                    var imgMarcador = 'img/iconeVerde.png'
                  }
                  var marcador = new google.maps.Marker({
                    position: {lat: <?php echo $row['latitude'];?>, lng: <?php echo $row['longitude'];?>},
                    map: map,
                    icon: imgMarcador,
                    title: '<?php echo $row['idmapa'];?>'
                  });

                  <?php }} ?>

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            map.setCenter(pos);
            map.setZoom(10);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhEAbQFcG2bVTRxjMpKIMWBDLD7ihbYsc&callback=initMap">
    </script>
   
	
      <?php
          require 'footer.php';
        ?>

      <script type="text/javascript">
          $(document).ready(function() {
            $('select').material_select();
          });

          $('#cadastro').submit(function(event){
            event.preventDefault();
            $.ajax({
              url: 'ajax/cadastroAnimal.php',
              type: 'POST',
              data: $('#cadastro').serialize(),
              dataType: 'json',
              success: function(response){
                console.log(response);
              }
            });

          });
      </script>

    </body>
</html>