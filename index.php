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

function afficheCategorieSansProduit(array $categories): void {
    echo "\n--- Catégories sans produits ---\n";
    for ($i = 0; $i < count($categories); $i++) {
        if (empty($categories[$i]["produits"])) {
            echo $categories[$i]["nom"] . "\n";
        }
    }
}

afficheCategorieSansProduit($categories);

function champObligatoire(string $value, string $message): bool {
    if (empty($value)) {
        echo $message . "\n";
        return false;
    }
    return true;
}

function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
    for ($i = 0; $i < count($categories); $i++) {
        if (strtolower($categories[$i][$key]) === strtolower($value)) {
            return $i; 
        }
    } 
    return false; 
}

function saisieChampObligatoireEtUnique(array $categories, string $smsSaisie, string $smsError, string $key): string {
    do {   
        $value = readline($smsSaisie);
        $valueIsValid = champObligatoire($value, $smsError);
        
        if ($valueIsValid) {     
            if ($key === "code" && (!ctype_digit($value) || strlen($value) !== 4)) {
                echo "Erreur : Le code doit contenir exactement 4 chiffres.\n";
                $valueIsValid = false;
            } 
            elseif (rechercheCategorieParCle($categories, $key, $value) !== false) {
                echo "Erreur : Cette valeur existe déjà...\n";
                $valueIsValid = false;
            }
        }
    } while (!$valueIsValid);
    
    return $value;
}
function enregistrerCategorie(): void {
    global $categories;
    echo "\n--- Enregistrement d'une nouvelle catégorie ---\n";

    $code = saisieChampObligatoireEtUnique($categories, "Entrez le code (4 chiffres) : ", "Champs obligatoire !", "code");
    $nom = saisieChampObligatoireEtUnique($categories, "Entrez le nom : ", "Champs obligatoire !", "nom");

    $categories[] = [
        "code" => $code,
        "nom" => $nom,
        "produits" => []
    ];
    
    echo "Succès : La catégorie '$nom' a été enregistrée !\n";
}

enregistrerCategorie();


function ajouterProduitCategorie(): void {
    global $categories;
    echo "\n--- Ajout d'un produit dans une catégorie ---\n";
    
    $code = readline("Saisir le code de la catégorie : ");
    
    $index = rechercheCategorieParCle($categories, "code", $code);
    
    if ($index !== false) {
        echo "Catégorie trouvée : " . $categories[$index]["nom"] . "\n";
        
        $produit = [
            "nom" => readline("Saisir le nom du produit (ex: Riz) : "),
            "reference" => readline("Saisir la référence : "),
            "prix" => (int)readline("Saisir le prix : "),
            "quantite" => (int)readline("Saisir la quantité : ")
        ];
        
        $categories[$index]["produits"][] = $produit;
        echo "Succès : Produit ajouté avec succès !\n";
        
    } else {
        echo "Désolé, la catégorie avec le code '$code' n'existe pas...\n";
    }
}

ajouterProduitCategorie();