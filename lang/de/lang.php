<?php return [
    'plugin' => [
        'name' => 'Shortener',
        'description' => 'Einfacher URL-Shortener für OctoberCMS.',
        'menu_item' => 'Shortener',
    ],
    'model' => [
        'created_at' => 'Erstellt am',
        'updated_at' => 'Zuletzt aktualisiert am',
        'deleted_at' => 'Gelöscht am',
        'slug' => 'Slug (Kurzform)',
        'target' => 'Ziel',
        'details' => 'Details',
        'short_url' => 'Kurzlink',
        'results' => 'Übersicht',
        'counter' => 'Aufrufe',
    ],
    'hints' => [
        'slug' => 'Der Name des Kurzlinks. Beispielsweise wird ihre-domain.com/slug auf Ihr hinterlegtes Ziel verweisen.',
        'target' => 'Ihre Ziel-URL.',
    ],
];
