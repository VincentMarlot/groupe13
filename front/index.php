<?php


$stmt = $conn->prepare("SELECT * FROM `articles-table`");
$stmt->execute();
?>

<?php include 'templates/header.php'?>

<body>
<section class="admin">
    <h1 class="admin_title">Administrateur</h1>
    <div class="admin_addarticle">
        <div class="admin_addarticle_item">
            <h2 class="admin_section_title_item"><a class="link" href="#">Articles</a></h2>
            <h2 class="admin_section_title_item"><a class="link" href="./?type=front/indexEvents">Evenements</a></h2>
        </div>
        <a href="./?type=articles/addForm"><p class="admin_addarticle_item add">Ajouter</p></a>
    </div>


    <div class="admin_section">
        <div class="admin_section_table">
            <form method="POST">
                <table class="table">
                    <thead>
                    <tr class="table_ligne">
                        <td class="table_img">image</td>
                        <td class="table_column">titre</td>
                        <td class="table_column"> auteur</td>
                        <td class="table_column">date</td>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- METTRE SA DATABASE ICI -->
                    <?php
                    while($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $image = $row["images"];
                        $author = $row["author"];
                        $date = $row["date"];
                        if (strlen($row["title"]) >= 14){
                            $title = mb_strimwidth($row["title"], 0, 14);
                        } else {
                            $title = $row["title"];
                        }

                        echo "
            <tr class='rowContent'>
                <td class='table_img'><img class='imgRow' src='$image'></td>
                <td class='table_column'>$title</td>
                <td class='table_column'>$author</td>
                <td class='table_column'>$date</td>
                <td class='table_column update'><a href='./?type=articles/edit&id=$id'>modifier</a></td>
                <td class='table_column delete'><a href='./?type=articles/delete&id=$id'>supprimer</a></td>
            </tr>
            <tr class='spacer'></tr>
            ";
                    }
                    ?>
                    </tbody>
                </table>

            </form>
        </div>
    </div>

</section>
</body>
</html>