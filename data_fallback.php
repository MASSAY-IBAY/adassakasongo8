<?php
/**
 * Données de secours (Fallback)
 * Utilisé lorsque la base de données n'est pas disponible
 */

$fallback_modeles = [
    [
        'id' => 1,
        'nom' => 'French Classique',
        'description' => 'Manucure française classique avec pointe blanche impeccable. Intemporelle et élégante.',
        'forme' => 'Carré',
        'couleur' => 'Blanc et rose',
        'style' => 'Classique',
        'image' => 'french-classique.jpeg'
    ],
    [
        'id' => 2,
        'nom' => 'French Noir',
        'description' => 'French manucure avec pointe noire sophistiquée. Élégant et moderne.',
        'forme' => 'Amande',
        'couleur' => 'Blanc et noir',
        'style' => 'Classique',
        'image' => 'french-noir.jpeg'
    ],
    [
        'id' => 3,
        'nom' => 'French Almond',
        'description' => 'French manucure sur ongles amande. Intemporelle et féminine.',
        'forme' => 'Amande',
        'couleur' => 'Blanc et rose',
        'style' => 'Classique',
        'image' => 'french-almond.jpeg'
    ],
    [
        'id' => 4,
        'nom' => 'Rose Féminin',
        'description' => 'Ongles rose poudré avec touches de paillettes. Doux et féminin.',
        'forme' => 'Ovale',
        'couleur' => 'Rose poudré',
        'style' => 'Glamour',
        'image' => 'rose-feminin.jpeg'
    ],
    [
        'id' => 5,
        'nom' => 'Rose Nude',
        'description' => 'Manucure rose nude avec finition brillante. Parfait pour le quotidien.',
        'forme' => 'Carré',
        'couleur' => 'Rose nude',
        'style' => 'Minimaliste',
        'image' => 'rose-nude.jpeg'
    ],
    [
        'id' => 6,
        'nom' => 'Bleu Électrique',
        'description' => 'Design bleu électrique avec détails géométriques. Audacieux et moderne.',
        'forme' => 'Stiletto',
        'couleur' => 'Bleu électrique',
        'style' => 'Moderne',
        'image' => 'bleu-electrique.jpeg'
    ],
    [
        'id' => 7,
        'nom' => 'Art Coloré',
        'description' => 'Ongles avec motifs colorés et paillettes. Artistique et vibrant.',
        'forme' => 'Amande',
        'couleur' => 'Multicolore',
        'style' => 'Artistique',
        'image' => 'art-colore.jpeg'
    ],
    [
        'id' => 8,
        'nom' => 'Nude Naturel',
        'description' => 'Manucure nude naturelle avec finition brillante. Professionnelle et élégante.',
        'forme' => 'Carré',
        'couleur' => 'Beige nude',
        'style' => 'Minimaliste',
        'image' => 'nude-naturel.jpeg'
    ],
    [
        'id' => 9,
        'nom' => 'Paillettes Dorées',
        'description' => 'Ongles avec paillettes dorées sur base nude. Glamour et étincelant.',
        'forme' => 'Amande',
        'couleur' => 'Or et nude',
        'style' => 'Glamour',
        'image' => 'paillettes-dorees.jpeg'
    ],
    [
        'id' => 10,
        'nom' => 'Art Floral',
        'description' => 'Ongles avec motifs floraux délicats. Artistique et poétique.',
        'forme' => 'Amande',
        'couleur' => 'Rose et blanc',
        'style' => 'Artistique',
        'image' => 'art-floral.jpeg'
    ]
];

/**
 * Fonction pour récupérer les modèles (depuis la DB ou le fallback)
 */
function getModeles($limit = null) {
    global $conn, $fallback_modeles;
    
    $modeles = [];
    
    if ($conn) {
        $sql = "SELECT * FROM modeles ORDER BY id DESC";
        if ($limit) $sql .= " LIMIT " . intval($limit);
        
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $modeles[] = $row;
            }
            return $modeles;
        }
    }
    
    // Si pas de DB ou pas de résultats, utiliser le fallback
    $modeles = $fallback_modeles;
    if ($limit) {
        $modeles = array_slice($modeles, 0, $limit);
    }
    return $modeles;
}

/**
 * Fonction pour récupérer un modèle par son ID
 */
function getModeleById($id) {
    global $conn, $fallback_modeles;
    
    if ($conn) {
        $id = intval($id);
        $sql = "SELECT * FROM modeles WHERE id = $id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }
    
    // Chercher dans le fallback
    foreach ($fallback_modeles as $modele) {
        if ($modele['id'] == $id) {
            return $modele;
        }
    }
    
    return null;
}
?>
