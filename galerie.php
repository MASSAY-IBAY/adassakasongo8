<?php
include 'header.php';
include 'config.php';

// Récupérer tous les modèles via la fonction hybride
$modeles = getModeles();
?>

    <section class="section">
        <div class="section-title">
            <h1>Galerie Complète</h1>
            <p style="font-size: 1.1rem; color: var(--color-text-light);">Découvrez tous nos modèles d'ongles</p>
        </div>
    </section>

    <div class="gallery">
        <?php
        if (!empty($modeles)) {
            foreach ($modeles as $row) {
                echo '<div class="card">';
                echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["nom"]) . '" class="card-image">';
                echo '<div class="card-content">';
                echo '<h3 class="card-title">' . htmlspecialchars($row["nom"]) . '</h3>';
                echo '<p class="card-description">' . htmlspecialchars($row["description"]) . '</p>';
                echo '<a href="detail.php?id=' . $row["id"] . '" class="btn">Voir détails</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p style="text-align: center; grid-column: 1/-1;">Aucun modèle disponible pour le moment.</p>';
        }
        ?>
    </div>

<?php
include 'footer.php';
if ($conn) {
    $conn->close();
}
?>
