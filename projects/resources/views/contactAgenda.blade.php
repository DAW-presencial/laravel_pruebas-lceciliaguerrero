<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/agenda-contantos-sesiones.css">
    <?php
    /**
     * Formulario registro agenda de contactos
     * @author Laura Cecilia Guerrero <lcecilia@cifpfbmoll.eu>
     */
    /**
     * Genero las variables junto con la matriz de errores
     */
    $nameContact = "";
    $telfNumberContact = "";

    $errorsArray = array();

    session_start(["cookie_lifetime" => 1800]);
    /**
     * Si no existe la matriz de la agenda de contactos entonces me la creo
     */
    if (isset($_SESSION['agendaContacts'])) {
        $agendaContacts = $_SESSION['agendaContacts'];
    } else {
        $agendaContacts = array();
    }


    /**
     * Valido el nombre
     * @param string $varNameContact
     * @return string
     * @global array $errorsArray
     */
    function validateNameContact($varNameContact)
    {
        global $errorsArray;
        $valName = trim($varNameContact);
        if (is_string($valName) && (strlen($valName) > 2)) {
            return $varNameContact;
        }
        $errorsArray[] .= "<p style='color: rgba(255, 0, 0, 0.99)'>Error nombre: debe tener al menos 2 caracteres alfanuméricos.</p>";
        return '';
    }

    /**
     * errores array
     * @param array $varErrorsArray
     */
    function createFormValidateContact($errorsArray)
    {
        if (count($errorsArray)) {
            foreach ($errorsArray as $error) {
                echo "<br/>$error";
            }
            echo '<br/>Codificación JSON: ' . json_encode($errorsArray);
        }
    }

    ?>
</head>
<body>
<header>
    <h1>Agenda de contactos</h1>
</header>
<main>
    <section>
        <h2>crear contacto</h2>
        <?php
        if (isset($_GET["enviarDatos"])) {
            $nameContact = filter_input(INPUT_GET, 'nombre', FILTER_CALLBACK, array('options' => 'validateNameContact'));
            $telfContact = filter_input(INPUT_GET, 'telefono');

            //Si no hay ningún error
            if (!count($errorsArray)) {
                //Si falta el numero de teléfono, entonces borra dicho contacto.
                if (empty($telfContact)) {
                    //unset — elimina una o más variables especificadas. En el caso de que sea un array elimina el indice o la
                    // clave junto con el valor.
                    echo "<p>Has eliminado el contacto $nameContact</p>";
                    unset($agendaContacts[$nameContact]);
                } else {
                    //array_key_exists — Verifica si el índice o clave dada existe en el array.
                    if (array_key_exists($nameContact, $agendaContacts)) {
                        echo "<p>Has actualizado el contacto $nameContact</p>";
                    } else {
                        echo "<p>Has añadido el contacto $nameContact</p>";
                    }
                    //Sino, me creo el contacto. En caso de que existiera me lo actualizo.
                    $agendaContacts[$nameContact] = $telfContact;
                }
                $_SESSION['agendaContacts'] = $agendaContacts;
            } else {
                echo "<p>Fallo</p>";
                createFormValidateContact($errorsArray);
            }
        } else {
            createFormValidateContact($errorsArray);
        }
        ?>

        <form>
            <label for="name">
                Escribe el nombre:
                <input id="name" type="text" name="nombre" placeholder="Escribe el nombre" value="">
            </label><br>
            <label for="telfNumber">
                Escribe el numero de teléfono:
                <input id="telfNumber" type="text" name="telefono" placeholder="Escribe el numero de teléfono"
                       value="">
            </label><br>
            <input type='submit' name='enviarDatos' value='enviarDatos'>
        </form>
    </section>

    <section>
        <h2>Agenda</h2>
        <?php
        if (count($agendaContacts) == 0) {
            echo "<p>No hay contactos en la agenda.</p>";
        } else {
            var_dump($agendaContacts);
            echo "<ul>";
            foreach ($agendaContacts as $name => $number) {
                echo "<li>nombre: '" . $name . "' teléfono: '" . $number . "'</li>";
            }
            echo "</ul>";
        }
        ?>
    </section>
</main>
<footer>

</footer>
</body>
</html>
