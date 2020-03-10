
    <?php
      include_once("Partial/_Header.html");
      include_once("Partial/_Navigation.html");
      include_once("Partial/_Body.html");

      function promedio(){
          $numeros = array($_POST["n1"], $_POST["n2"], $_POST["n3"], $_POST["n4"], $_POST["n5"]);
          $promedio = 0;
          sort($numeros);
          for ($i=0; $i <count($numeros) ; $i++) {
            $promedio += $numeros[$i];
          }
          $promedio = $promedio/5;
          echo "<br><br><div class ='container'><h5>El promedio es: " . $promedio . "</h5><br>";
          echo "<h5>La mediana es: " . $numeros[2] . "</h5><br>";
          echo "<h5>Los numeros en orden ascendente son: ";
          for ($i=0; $i <count($numeros) ; $i++) {
            echo $numeros[$i] . " ";
          }
          echo "<br>" . "<br><h5>Los numeros en orden descendente son: ";
          for ($i=count($numeros) - 1; $i >= 0 ; $i--) {
            echo $numeros[$i] . " ";
          }
          echo "</h5><br> </div>";
        }
  function tabla(){
        $n6 = $_POST["n6"];
        echo "<table border='2' class='highlight centered responsive-table' cellspacing='0'>
          <tr><th>Numero</th><th>Cuadrado</th><th>Cubo</th></tr>";
        for ($i=0; $i <= $n6; $i++) {
          $cubo = $i*$i*$i;
          $cuadrado = $i*$i;
          echo"<tr ><td>$i</td><td>$cuadrado</td><td>$cubo</td><tr>";
        }
        echo "</table> <br> <br> <br>";
  }
   		promedio();
        tabla();
        include_once("Partial/_Footer.html");
      
     ?> 

