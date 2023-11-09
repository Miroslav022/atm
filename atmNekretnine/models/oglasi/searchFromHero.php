<?php
    if(isset($_POST['submit_btn'])){
        $drzava = $_POST['drzava'];
        $mesto = $_POST['mesto'];
        $lokacija = $_POST['lokacija'];
        $tip = $_POST['tip'];
    
    header("Location: ../../nekretnine.php?drzava=$drzava&grad=$mesto&naselja=$lokacija&tip_nekretnine=$tip");
    }
    ?>
