<?php
// Kontrollo nese formulari eshte derguar me metoden POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merr vlera nga formulari
    $emri = $_POST["emri"];
    $mbiemri = $_POST["mbiemri"];
    $gjinia = isset($_POST["gjinia"]) ? $_POST["gjinia"] : "";
    $lajme = isset($_POST["lajme"]) ? "Po" : "Jo";
    $oferta = isset($_POST["oferta"]) ? "Po" : "Jo";

    // Shfaqim dhe validojme te dhenat
    if (!empty($emri) && !empty($mbiemri) && !empty($gjinia)) {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        // Lidhja me bazen e te dhenave
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kontrollo nese ka ndodhur gabim gjate lidhjes
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Krijo kerkesen SQL per te futur te dhenat ne tabelen e bazes se te dhenave
        $sql = "INSERT INTO user (emri, mbiemri, gjinia, deshiron_lajme, deshiron_oferta)
                VALUES ('$emri', '$mbiemri', '$gjinia', '$lajme', '$oferta')";

        // Ekzekuto kerkesen SQL

        if ($conn->query($sql) === TRUE) {
            echo "Te dhenat jane ruajtur me sukses ne bazen e te dhenave.";
        } else {
            echo "Gabim gjate ruajtjes se te dhenave: " . $conn->error;
        }

        // Mbylle lidhjen me bazen e te dhenave
        $conn->close();
    } else {
        // Trajtoni rastin kur fushat e kerkuara nuk plotesohen
        echo "Ju lutem plotësoni të gjitha fushat e detyrueshme.";
    }
} else {
    // Ridrejtohemi perseri ne faqen e formularit nese aksesohet direkt pa dorezim
    header("Location: kontakti.php");
    exit();
}
?>
