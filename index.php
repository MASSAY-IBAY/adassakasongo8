<?php
include 'header.php';
include 'config.php';

// Récupérer les 3 derniers modèles via la fonction hybride
$modeles = getModeles(3);
?>

    <section class="section">
        <div class="section-title">
            <h1>Transformez vos ongles</h1>
            <p style="font-size: 1.1rem; color: var(--color-text-light);">Inspiration, conseils et tendances 2026</p>
        </div>
    </section>

    <section class="section">
        <h2 style="text-align: center; margin-bottom: 2rem;">Derniers modèles</h2>
        <div class="gallery">
            <?php
            if (!empty($modeles)) {
                foreach ($modeles as $row) {
                    echo '<div class="card">';
                    echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["nom"]) . '" class="card-image">';
                    echo '<div class="card-content">';
                    echo '<h3 class="card-title">' . htmlspecialchars($row["nom"]) . '</h3>';
                    echo '<p class="card-description">' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<a href="detail.php?id=' . $row["id"] . '" class="btn">Voir plus</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p style="text-align: center; grid-column: 1/-1;">Aucun modèle disponible pour le moment.</p>';
            }
            ?>
        </div>
    </section>

    <section class="section" style="background: linear-gradient(135deg, var(--color-primary-light) 0%, rgba(232, 180, 200, 0.1) 100%); padding: 3rem; border-radius: 12px; text-align: center;">
        <h2>Découvrez nos services</h2>
        <p style="font-size: 1.1rem; margin-bottom: 2rem; color: var(--color-text-light);">Explorez notre galerie complète et nos outils professionnels</p>
        <a href="galerie.php" class="btn" style="margin-right: 1rem;">Voir la galerie</a>
        <a href="outils.php" class="btn btn-secondary">Nos outils</a>
    </section>

<?php
include 'footer.php';
if ($conn) {
    $conn->close();
}
?>
