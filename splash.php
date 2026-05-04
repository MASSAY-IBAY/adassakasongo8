<?php
/**
 * Page d'affiche (Splash Page)
 * Page vierge prête à accueillir le contenu de l'affiche
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche - Adassa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        .splash-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-primary-light) 0%, var(--color-background) 100%);
            padding: 2rem;
        }

        .splash-content {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(232, 180, 200, 0.25);
            padding: 3rem;
            text-align: center;
            min-height: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .splash-content h1 {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 1rem;
        }

        .splash-content p {
            font-size: 1.1rem;
            color: var(--color-text-light);
            margin-bottom: 2rem;
        }

        .splash-image-area {
            width: 100%;
            height: 700px;
            background: linear-gradient(135deg, var(--color-primary-light) 0%, rgba(232, 180, 200, 0.1) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2rem 0;
            border: 2px dashed var(--color-border);
        }

        .splash-image-area img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
        }

        .splash-placeholder {
            color: var(--color-text-light);
            font-size: 1rem;
        }

        .splash-nav {
            margin-top: 2rem;
        }

        .splash-nav a {
            display: inline-block;
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--color-primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .splash-nav a:hover {
            background: var(--color-primary-dark);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1><a href="index.php">Adassa</a></h1>
                </div>
                <nav class="nav">
                    <a href="splash.php" class="nav-btn"><span>Affiche</span></a>
                    <a href="index.php" class="nav-btn"><span>Accueil</span></a>
                    <a href="galerie.php" class="nav-btn"><span>Galerie</span></a>
                    <a href="outils.php" class="nav-btn"><span>Outils</span></a>
                    
                    <a href="contact.php" class="nav-btn"><span>Contact</span></a>
                </nav>
            </div>
        </div>
    </header>

    <div class="splash-container">
        <div class="splash-content">
            <h1>Affiche Adassa</h1>
            <p>Page d'affiche - Votre création personnalisée</p>
            
            <div class="splash-image-area" id="splashArea">
                <img src="affiche_adassa.jpg" alt="Affiche Adassa - Formation Ongulerie Professionnelle" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>

            <div class="splash-nav">
                <a href="index.php">Aller à l'accueil</a>
                <a href="galerie.php">Voir la galerie</a>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Adassa</h3>
                    <p>Prothésiste Ongulaire Professionnelle</p>
                </div>
                <div class="footer-section">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="galerie.php">Galerie</a></li>
                        <li><a href="outils.php">Outils</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Email: contact@adassa.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Adassa - Tous droits réservés</p>
            </div>
        </div>
    </footer>

    <script>
        // Script pour afficher l'affiche quand elle sera prête
        // Remplacer le contenu de #splashArea par votre affiche
    </script>
</body>
</html>
