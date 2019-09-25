<?php require 'JSON.php'; require 'XML.php' ?>

<style>
    <?php  include 'views/css/style.css' ?>
</style>

<body>
    <h1>List of students</h1>

    <?php
        //Load JSON file
        $getdata = file_get_contents("studentsCSM.json");
        $data = json_decode($getdata);
        $avgGrade = file_get_contents("avgGrades.json");
        $avg = json_decode($avgGrade);

        //Load XML file
        $xmls = new DOMDocument();
        $xmls = simplexml_load_file('studentsCSMB.xml');
    ?>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Type Board</th>
            </tr>

            <?php foreach ($data as $date) : ?>
                <tr>
                    <td> <a href="students?id=<?= $date->id; ?> "><?= $date->id; ?></a></td>
                    <td> <?= $date->firstName; ?></td>
                    <td> <?= $date->lastName; ?></td>
                    <td> <?= $date->board; ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($xmls->children() as $xml) {
                echo "<tr>";
                echo "<td><a href=\"students?id=<?= $xml->id; ?> \">{$xml->id}</td>";
                echo "<td>{$xml->firstName}</td>";
                echo "<td>{$xml->lastName}</td>";
                echo "<td>{$xml->board}</td>";
            } ?>
        </table>
    </div>
</body>