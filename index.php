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
    // empty() vérifie si le tableau "produits" est vide
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




?>