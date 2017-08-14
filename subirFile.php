<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_POST) {
require('core/core.php'); # Conexion a la base de datos


        switch (isset($_REQUEST['mode']) ? $_REQUEST['mode'] : null) {
            case 'subirFile':
                
                 if(isset($_FILES['uploadeFile']))
                    {

                         $fname = $_FILES['uploadeFile']['name'];
                         
                         $chk_ext = explode(".",$fname);
                 
                         if(strtolower(end($chk_ext)) == "csv")
                         {

                             $filename = $_FILES['uploadeFile']['tmp_name'];
                             $handle = fopen($filename, "r");
                 
                             while (($data = fgetcsv($handle, 1000, "|")) !== FALSE)
                             {
                               //Insertamos los datos con los valores...
                                $amount = str_replace(array(".", ","), array("", "."), $data[3]);
                                $balance = str_replace(array(".", ","), array("", "."), $data[4]);

                                $db = new Conexion();
                                $sql = $db->query("
                                    INSERT INTO TABLA (COLUMNA1,COLUMNA2,COLUMNA3,COLUMNA4,COLUMNA5,COLUMNA6) 
                                    VALUES ($data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')" );
                             }

                             fclose($handle);
                             echo "SuccessUpload";
                         }
                         else
                         {

                             echo "ErrorTypeFile";
                         }
                    }

                break;
            
            default:
                header('Location: index.php');
                break;
        }
        

}



?>
