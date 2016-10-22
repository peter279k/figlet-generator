<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Cowsayphp\Farm;
use Povils\Figlet\Figlet;

class GenerateFigletController extends Controller
{
    public function genFiglet() {
        $messageTxt = filter_input(INPUT_POST, 'message-txt', FILTER_SANITIZE_STRING);
        $textArr = explode("\n", $messageTxt);
        $action = filter_input(INPUT_POST, 'figlet-type');

        $farm = null;
        $figlet = null;
        $result = null;

        switch ($action) {
            case 'whale':
                $farm = Farm::create(\Cowsayphp\Farm\Whale::class);
                break;
            case 'cows':
                $farm = Farm::create(\Cowsayphp\Farm\Cow::class);
                break;
            case 'dragon':
                $farm = Farm::create(\Cowsayphp\Farm\Dragon::class);
                break;
            case 'tux':
                $farm = Farm::create(\Cowsayphp\Farm\Tux::class);
                break;
            case 'figlet':
            default:
                $figlet = new Figlet();
        }

        if ($farm !== null) {
            $result = $farm->say($messageTxt);
        } else {
            foreach ($textArr as $value) {
                if ($value !== '') {
                    $result .= $figlet->setFont('small')->render($value).PHP_EOL;
                }
            }
        }

        return $result;
    }
}
