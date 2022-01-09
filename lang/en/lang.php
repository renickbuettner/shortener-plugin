<?php return [
    'plugin' => [
        'name' => 'Shortener',
        'description' => 'Deep simple url shortener for OctoberCMS.',
        'menu_item' => 'Shortener',
    ],
    'model' => [
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'deleted_at' => 'Deleted at',
        'slug' => 'Slug',
        'target' => 'Target',
        'details' => 'Details',
        'short_url' => 'Short url',
        'results' => 'Results',
        'counter' => 'Amount of clicks',
    ],
    'hints' => [
      'slug' => 'The short part of the url. For example your-domain.com/SLUG will redirect to your target url.',
      'target' => 'The target url for your short url.',
    ],
];
