<?php

// Texte à analyser
$texte = "Votre texte à analyser.";

// Fonction pour extraire les mots clés
function extraireMotsCles($texte, $nombreMots = 5) {
    // Supprimer la ponctuation et convertir en minuscules
    $texte = strtolower(preg_replace('/[[:punct:]]/', '', $texte));
    
    // Diviser le texte en mots
    $mots = explode(' ', $texte);
    
    // Compter la fréquence de chaque mot
    $motsFreq = array_count_values($mots);
    
    // Trier les mots par fréquence (du plus fréquent au moins fréquent)
    arsort($motsFreq);

    // Vous pouvez également définir une liste de mots à exclure, par exemple des mots vides
    $exclusions = array('le', 'la', 'les', 'de', 'du', 'des', 'et', 'en');

    // Extraire les mots clés les plus fréquents
    $motsCles = array_slice(array_keys($motsFreq), 0, $nombreMots);
    
    return $motsCles;
}

// Appel de la fonction pour extraire les mots clés
$motsCles = extraireMotsCles($texte, 5);

// Afficher les mots clés
echo "Mots clés : " . implode(', ', $motsCles) . "\n";
?>
