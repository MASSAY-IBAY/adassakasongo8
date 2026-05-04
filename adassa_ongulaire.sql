-- ========================================
-- Base de données: adassa_ongulaire
-- Adassa - Prothésiste Ongulaire
-- ========================================

-- Créer la base de données
CREATE DATABASE IF NOT EXISTS adassa_ongulaire;
USE adassa_ongulaire;

-- ========================================
-- Table: modeles
-- Description: Stocke les modèles d'ongles
-- ========================================
CREATE TABLE IF NOT EXISTS modeles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    forme VARCHAR(50),
    couleur VARCHAR(100),
    style VARCHAR(50),
    image VARCHAR(255) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Table: contacts
-- Description: Stocke les messages de contact
-- ========================================
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    sujet VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    lu BOOLEAN DEFAULT FALSE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Données d'exemple: modeles (10 modèles avec photos réelles)
-- ========================================
INSERT INTO modeles (nom, description, forme, couleur, style, image) VALUES
('French Classique', 'Manucure française classique avec pointe blanche impeccable. Intemporelle et élégante.', 'Carré', 'Blanc et rose', 'Classique', 'french-classique.jpeg'),
('French Noir', 'French manucure avec pointe noire sophistiquée. Élégant et moderne.', 'Amande', 'Blanc et noir', 'Classique', 'french-noir.jpeg'),
('French Almond', 'French manucure sur ongles amande. Intemporelle et féminine.', 'Amande', 'Blanc et rose', 'Classique', 'french-almond.jpeg'),
('Rose Féminin', 'Ongles rose poudré avec touches de paillettes. Doux et féminin.', 'Ovale', 'Rose poudré', 'Glamour', 'rose-feminin.jpeg'),
('Rose Nude', 'Manucure rose nude avec finition brillante. Parfait pour le quotidien.', 'Carré', 'Rose nude', 'Minimaliste', 'rose-nude.jpeg'),
('Bleu Électrique', 'Design bleu électrique avec détails géométriques. Audacieux et moderne.', 'Stiletto', 'Bleu électrique', 'Moderne', 'bleu-electrique.jpeg'),
('Art Coloré', 'Ongles avec motifs colorés et paillettes. Artistique et vibrant.', 'Amande', 'Multicolore', 'Artistique', 'art-colore.jpeg'),
('Nude Naturel', 'Manucure nude naturelle avec finition brillante. Professionnelle et élégante.', 'Carré', 'Beige nude', 'Minimaliste', 'nude-naturel.jpeg'),
('Paillettes Dorées', 'Ongles avec paillettes dorées sur base nude. Glamour et étincelant.', 'Amande', 'Or et nude', 'Glamour', 'paillettes-dorees.jpeg'),
('Art Floral', 'Ongles avec motifs floraux délicats. Artistique et poétique.', 'Amande', 'Rose et blanc', 'Artistique', 'art-floral.jpeg');

-- ========================================
-- Données d'exemple: contacts
-- ========================================
INSERT INTO contacts (nom, email, sujet, message) VALUES
('Marie Dupont', 'marie@example.com', 'Demande de rendez-vous', 'Bonjour, je souhaiterais prendre rendez-vous pour une manucure.');

-- ========================================
-- Index pour optimiser les requêtes
-- ========================================
CREATE INDEX idx_modeles_date ON modeles(date_creation);
CREATE INDEX idx_contacts_date ON contacts(date_creation);
CREATE INDEX idx_contacts_email ON contacts(email);

-- ========================================
-- Fin du script SQL
-- ========================================
