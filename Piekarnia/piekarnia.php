<?php 

$conn = new mysqli("localhost", "root", "", "piekarnia");

$quary2result = mysqli_query($conn, "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC");
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
        <a href="">KWERENDA1</a>
        <a href="">KWERENDA2</a>
        <a href="">KWERENDA3</a>
        <a href="">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="" method="POST">
            <select name="rodzaj" id="rodzaj">
                <?php
                    while ($row = mysqli_fetch_array($quary2result)) {
                        echo '<option value="'.$row["Rodzaj"].'">';
                        echo $row["Rodzaj"];
                        echo "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Wybierz">
        </form>
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php
                if (isset($_POST["rodzaj"])) {
                    $quary1result = mysqli_query($conn, 'SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = "'.$_POST["rodzaj"].'"');

                    while ($row = mysqli_fetch_array($quary1result)) {
                        echo "<tr>";
                        echo "<td>".$row["Rodzaj"]."</td>";
                        echo "<td>".$row["Nazwa"]."</td>";
                        echo "<td>".$row["Gramatura"]."</td>";
                        echo "<td>".$row["Cena"]."</td>";
                        echo "</tr>";
                    }
                }

                mysqli_close($conn);
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR: 0000000000000</p>
        <p>Data: 25.08.2025</p>
    </footer>
</body>
</html> 