 <?php
    // Kontrollo nese formulari eshtë dërguar me metodën POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Merr vlerat nga formulari
        $emri = $_POST["emri"];
        $mbiemri = $_POST["mbiemri"];
        $numri_telefonit = $_POST["numri_telefonit"];
        $email = $_POST["email"];
        $mosha = $_POST["mosha"];
        $gjinia = $_POST["gjinia"];
        $trajnimi = $_POST["trajnimi"];
        $grupi = $_POST["grupi"];
        $oraret = implode(", ", $_POST["orari"]);

        // Shfaq të dhënat
        echo "<p>Emri: $emri</p>";
        echo "<p>Mbiemri: $mbiemri</p>";
        echo "<p>Numri i telefonit: $numri_telefonit</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Mosha: $mosha</p>";
        echo "<p>Gjinia: $gjinia</p>";
        echo "<p>Trajnimi: $trajnimi</p>";
        echo "<p>Grupi: $grupi</p>";
        echo "<p>Orari: ";
        foreach (explode(", ", $oraret) as $vlera) {
            echo "$vlera, ";
        }
        echo "</p>";
    }
    

     // Lidhja me bazën e të dhënave
     $servername = "localhost";
     $username = "root";
     $password = ""; // Fjalëkalimi është i zbrazët në XAMPP
     $dbname = "test";

     $conn = mysqli_connect($servername, $username, $password, $dbname);

     // Kontrollo nëse ka ndodhur gabim gjatë lidhjes
     if (!$conn) {
         die("Gabim në lidhjen me bazën e të dhënave: " . mysqli_connect_error());
     }

     // Krijo kërkesën SQL për të futur të dhënat në tabelën e bazës së të dhënave
     $sql = "INSERT INTO application (id, emri, mbiemri, numri_telefonit, email, mosha, gjinia, trajnimii, grupi, oraret)
             VALUES (NULL, '$emri', '$mbiemri', '$numri_telefonit', '$email', '$mosha', '$gjinia', '$trajnimii', '$grupi', '$oraret')";

     // Ekzekuto kërkesën SQL
     if (mysqli_query($conn, $sql)) {
         echo "Të dhënat janë ruajtur me sukses në bazën e të dhënave.";
     } else {
         echo "Gabim gjatë ruajtjes së të dhënave: " . mysqli_error($conn);
     }

    // Mbylle lidhjen me bazën e të dhënave
         $conn->close();
?>



