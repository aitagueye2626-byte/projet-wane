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