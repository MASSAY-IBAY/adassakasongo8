<?php
include 'header.php';
include 'config.php';

// Récupérer l'ID du modèle
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Récupérer le modèle via la fonction hybride
$modele = getModeleById($id);

if (!$modele) {
    echo '<div class="section" style="text-align: center;">';
    echo '<h2>Modèle non trouvé</h2>';
    echo '<p>Désolé, nous ne parvenons pas à charger les détails de ce modèle pour le moment.</p>';
    echo '<p><a href="galerie.php" class="btn">Retour à la galerie</a></p>';
    echo '</div>';
    include 'footer.php';
    if ($conn) {
        $conn->close();
    }
    exit;
}
?>

    <section class="section">
        <a href="galerie.php" class="btn" style="margin-bottom: 2rem;">← Retour à la galerie</a>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: start;">
            <div>
                <img src="<?php echo htmlspecialchars($modele['image']); ?>" 
                     alt="<?php echo htmlspecialchars($modele['nom']); ?>" 
                     style="width: 100%; border-radius: 12px; box-shadow: 0 8px 20px rgba(232, 180, 200, 0.25);">
            </div>
            <div>
                <h1 style="color: var(--color-primary); margin-bottom: 1rem;"><?php echo htmlspecialchars($modele['nom']); ?></h1>
                <p style="font-size: 1.1rem; color: var(--color-text-light); margin-bottom: 2rem;">
                    <?php echo htmlspecialchars($modele['description']); ?>
                </p>
                
                <div style="background: var(--color-primary-light); padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 1rem;">Détails</h3>
                    <p><strong>Forme :</strong> <?php echo htmlspecialchars($modele['forme'] ?? 'Non spécifiée'); ?></p>
                    <p><strong>Couleur :</strong> <?php echo htmlspecialchars($modele['couleur'] ?? 'Non spécifiée'); ?></p>
                    <p><strong>Style :</strong> <?php echo htmlspecialchars($modele['style'] ?? 'Non spécifié'); ?></p>
                </div>

                <a href="galerie.php" class="btn">Voir d'autres modèles</a>
            </div>
        </div>
    </section>

<?php
include 'footer.php';
if ($conn) {
    $conn->close();
}
?>
