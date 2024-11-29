<?php

namespace Controllers;

class RouletteController {

    public static function index() {
        require ROOT . "/views/roulette.php";
        require_once ROOT . "/templates/global.php";
    }

    public static function spin() {
        header('Content-Type: application/json');

        $symbols_with_weights = [
            '🍋' => 40,
            '🍒' => 30,
            '⭐'  => 15,
            '🔔'  => 10,
            '💎'  => 5,
        ];

        // Table des gains
        $paytable = [
            '🍋🍋🍋' => 40,
            '🍒🍒🍒' => 50,
            '⭐⭐⭐'   => 100,
            '🔔🔔🔔' => 150,
            '💎💎💎' => 200,
        ];

        $reel1 = self::getRandomSymbol($symbols_with_weights);
        $reel2 = self::getRandomSymbol($symbols_with_weights);
        $reel3 = self::getRandomSymbol($symbols_with_weights);


        $combination = $reel1 . $reel2 . $reel3;

        $gain = isset($paytable[$combination]) ? $paytable[$combination] : 0;

        echo json_encode([
            'success' => true,
            'reels'   => [$reel1, $reel2, $reel3],
            'gain'    => $gain,
        ]);
        exit;
    }

    private static function getRandomSymbol($symbols_with_weights) {
        $totalWeight = array_sum($symbols_with_weights);
        $random = rand(1, $totalWeight);

        foreach ($symbols_with_weights as $symbol => $weight) {
            if ($random <= $weight) {
                return $symbol;
            }
            $random -= $weight;
        }
    }
}
