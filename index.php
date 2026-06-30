<?php

$categories = [
    [
        "code" => "1001",
        "nom" => "Céréales",
        "produits" => [
            [
                "nom" => "Riz",
                "reference" => "RIZ01",
                "prix" => 15000,
                "quantite" => 10
            ],
            [
                "nom" => "Maïs",
                "reference" => "MAIS02",
                "prix" => 12000,
                "quantite" => 5
            ]
        ]
    ],
    [
        "code" => "1002",
        "nom" => "Légumes",
        "produits" => [] 
    ]
];


echo "\n--- Catégories sans produits ---\n";

foreach ($categories as $categorie) {
    if (empty($categorie["produits"])) {
        echo "Nom : " . $categorie["nom"] . " (Code : " . $categorie["code"] . ")\n";
    }
}



echo "\n--- Catégories sans produits ---\n";

foreach ($categories as $categorie) {
    if (empty($categorie["produits"])) {
        echo "Nom : " . $categorie["nom"] . " (Code : " . $categorie["code"] . ")\n";
    }
}


echo "\n--- Ajout d'une nouvelle catégorie ---\n";

do {
    $codeExiste = false; 
    $code = readline("Saisir le code (4 chiffres) : ");

    if (empty($code) || !ctype_digit($code) || strlen($code) !== 4) {
        echo "Erreur : Format incorrect (4 chiffres obligatoires).\n";
        $codeExiste = true; 
    } else {
        for ($i = 0; $i < count($categories); $i++) {
            if ($categories[$i]["code"] === $code) {
                echo "Erreur : Ce code existe déjà.\n";
                $codeExiste = true;
                break;
            }
        }
    }
} while ($codeExiste); 


do {
    $nomExiste = false; 
    $nom = readline("Saisir le nom : ");

    if (empty($nom)) {
        echo "Erreur : Le nom est obligatoire.\n";
        $nomExiste = true; 
    } else {
        for ($i = 0; $i < count($categories); $i++) {
            if (strtolower($categories[$i]["nom"]) === strtolower($nom)) {
                echo "Erreur : Ce nom existe déjà.\n";
                $nomExiste = true;
                break;
            }
        }
    }
} while ($nomExiste); 

// Ajout direct au tableau
$categories[] = [
    "code" => $code,
    "nom" => $nom,
    "produits" => []
];

echo "Succès : Catégorie '$nom' ajoutée !\n";


?>