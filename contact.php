<?php
include 'header.php';
include 'config.php';

$message = '';
$message_type = '';

// Traiter le formulaire de contact
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $sujet = $_POST['sujet'] ?? '';
    $message_contact = $_POST['message'] ?? '';
    
    if ($nom && $email && $sujet && $message_contact) {
        if ($conn) {
            // Insérer dans la base de données
            $sql = "INSERT INTO contacts (nom, email, sujet, message) VALUES (?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssss", $nom, $email, $sujet, $message_contact);
                
                if ($stmt->execute()) {
                    $message = "Votre message a été envoyé avec succès! Nous vous répondrons bientôt.";
                    $message_type = "success";
                    $_POST = [];
                } else {
                    $message = "Erreur lors de l'envoi du message: " . $stmt->error;
                    $message_type = "error";
                }
                $stmt->close();
            } else {
                $message = "Erreur technique lors de la préparation de l'envoi.";
                $message_type = "error";
            }
        } else {
            // Optionnel : Envoyer par email si la base est absente, ou juste informer l'utilisateur
            $message = "Le service de messagerie est temporairement indisponible (base de données non connectée).";
            $message_type = "error";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
        $message_type = "error";
    }
}
?>

    <section class="section">
        <div class="section-title">
            <h1>Nous contacter</h1>
            <p style="font-size: 1.1rem; color: var(--color-text-light);">Envoyez-nous vos questions et demandes</p>
        </div>
    </section>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 2rem 0;">
        
        <!-- Formulaire -->
        <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(232, 180, 200, 0.15);">
            <h2 style="margin-bottom: 1.5rem;">Formulaire de contact</h2>
            
            <?php if ($message): ?>
                <div style="background: <?php echo $message_type == 'success' ? '#d4edda' : '#f8d7da'; ?>; 
                            color: <?php echo $message_type == 'success' ? '#155724' : '#721c24'; ?>; 
                            padding: 1rem; 
                            border-radius: 8px; 
                            margin-bottom: 1.5rem; 
                            border: 1px solid <?php echo $message_type == 'success' ? '#c3e6cb' : '#f5c6cb'; ?>;">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="nom">Nom *</label>
                    <input type="text" id="nom" name="nom" required value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="sujet">Sujet *</label>
                    <input type="text" id="sujet" name="sujet" required value="<?php echo htmlspecialchars($_POST['sujet'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                </div>

                <button type="submit" class="btn" style="width: 100%; border: none; cursor: pointer;">
                    Envoyer le message
                </button>
            </form>
        </div>

        <!-- Informations de contact -->
        <div>
            <div style="background: linear-gradient(135deg, var(--color-primary-light) 0%, rgba(232, 180, 200, 0.1) 100%); padding: 2rem; border-radius: 12px; margin-bottom: 2rem;">
                <h3 style="margin-bottom: 1.5rem;">Informations</h3>
                
                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">📍 Adresse</h4>
                    <p>123 Rue de la Beauté<br>75000 Paris, France</p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">📞 Téléphone</h4>
                    <p><a href="tel:+33123456789" style="color: var(--color-text); text-decoration: none;">+33 (0)1 23 45 67 89</a></p>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">✉️ Email</h4>
                    <p><a href="mailto:contact@adassa.com" style="color: var(--color-text); text-decoration: none;">contact@adassa.com</a></p>
                </div>

                <div>
                    <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">🕐 Horaires</h4>
                    <p>Lundi - Vendredi: 9h - 18h<br>Samedi: 10h - 17h<br>Dimanche: Fermé</p>
                </div>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(232, 180, 200, 0.15);">
                <h3 style="margin-bottom: 1rem;">Réseaux sociaux</h3>
                <p style="color: var(--color-text-light); margin-bottom: 1rem;">Suivez-nous sur nos réseaux pour les dernières tendances</p>
                <div style="display: flex; gap: 1rem;">
                    <a href="#" class="btn" style="flex: 1; text-align: center; text-decoration: none;">Facebook</a>
                    <a href="#" class="btn btn-secondary" style="flex: 1; text-align: center; text-decoration: none;">Instagram</a>
                </div>
            </div>
        </div>

    </div>

<?php
include 'footer.php';
if ($conn) {
    $conn->close();
}
?>
