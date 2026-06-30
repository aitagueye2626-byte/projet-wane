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

$categories[] = [
    "code" => $code,
    "nom" => $nom,
    "produits" => []
];

echo "Succès : Catégorie '$nom' ajoutée !\n";


$categorieExiste = false;
$code = readline("saisir le code : ");

for ($i = 0; $i < count($categories); $i++) {
    if ($categories[$i]["code"] === $code) {
        $categorieExiste = true;
        $index = $i; 
        break;
    }
}

if ($categorieExiste) {
    $produit = [
        "nom" => readline("saisir le nom : "),
        "reference" => readline("saisir la reference : "),
        "prix" => (int)readline("saisir le prix : "),
        "quantite" => (int)readline("saisir la quantité : ")
    ];
    
    $categories[$index]["produits"][] = $produit;
    echo "Produit ajouté avec succès !\n";
    
} else {
    echo " désolé , la categorie n'existe pas...\n";
}

// ==========================================
// 5. Ajouter une catégorie avec plusieurs produits
// ==========================================

echo "\n--- Ajout d'une catégorie et de ses produits ---\n";

// Saisie et validation du CODE avec boucle FOR
do {
    $codeExiste = false;
    $code = readline("saisir le code (4 chiffres) : ");

    if (empty($code) || !ctype_digit($code) || strlen($code) !== 4) {
        echo "Erreur : Le code doit contenir 4 chiffres.\n";
        $codeExiste = true;
    } else {
        for ($i = 0; $i < count($categories); $i++) {
            if ($categories[$i]["code"] === $code) {
                echo "le code existe deja ...\n";
                $codeExiste = true;
                break;
            }
        }
    }
} while ($codeExiste);

// Saisie et validation du NOM avec boucle FOR
do {
    $nomExiste = false;
    $nom = readline("saisir le nom : ");

    if (empty($nom)) {
        echo "le nom est obligatoire\n";
        $nomExiste = true;
    } else {
        for ($i = 0; $i < count($categories); $i++) {
            if (strtolower($categories[$i]["nom"]) === strtolower($nom)) {
                echo "le nom existe deja ...\n";
                $nomExiste = true;
                break;
            }
        }
    }
} while ($nomExiste);

$produits = [];
do {
    $produit = [
        "nom" => readline("saisir le nom du produit : "),
        "reference" => readline("saisir la reference : "),
        "prix" => (int)readline("saisir le prix : "),
        "quantite" => (int)readline("saisir la quantité : ")
    ];
    $produits[] = $produit;

    $choix = strtolower(readline("voulez vous continuer oui/non : "));
    
} while ($choix === "oui");

$categories[] = [
    "code" => $code,
    "nom" => $nom,
    "produits" => $produits
];

echo "Succès : La catégorie complète a bien été ajoutée !\n";

?>