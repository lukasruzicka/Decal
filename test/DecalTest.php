<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DecalTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function print($array, $expected): void
    {
        $this->expectOutputString($expected);
        Decal::print($array);
    }

    public function dataProvider(): array
    {
        $data = [
            'generic' => [
                ['a' => ['b' => 1, 'c' => ['d']], 'b' => [0, '0', null]],
"\$decal = [
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
"           ]
        ];

        return $data;
    }
}