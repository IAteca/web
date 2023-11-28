<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('IAbasedatos.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Base de datos abierta correctamente\n";
   }
   $sql =<<<EOF
      SELECT * from ia_data;
EOF;
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "ID = ". $row['id'] . "\n";
      echo "Nombre = ". $row['nombre'] ."\n";
      echo "Desarrollador = ". $row['desarrollador'] ."\n";
      echo "Categoría = ". $row['categoria'] ."\n";
   }
   echo "Operación realizada correctamente\n";
   $db->close();
?>
