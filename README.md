# Decal

A simple script that allows you to turn the existing PHP array to its PHP code interpretation, which might be useful when creating mock data and so on.



```php

# CODE
$array = ['a' => ['b' => 1, 'c' => ['d']], 'b' => [0, '0', null]];

Decal::print($array);

```

```
# OUTPUT
$decal = [
    'a' => [
        'b' => 1,
        'c' => [
            'd'
        ]
    ],
    'b' => [
        0,
        '0',
        null
    ]
];

```
