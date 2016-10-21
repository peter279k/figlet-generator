<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Cowsayphp\Farm;
use Povils\Figlet\Figlet;

class GenerateFigletController extends Controller
{
    public function genFiglet() {
        $messageTxt = filter_input(INPUT_POST, 'message-txt');
        $action = filter_input(INPUT_POST, 'figlet-type');

        switch ($action) {
            case '':

                break;
            case '':

                break;
        }

        $cow = Farm::create(\Cowsayphp\Farm\Cow::class);
        $whale = Farm::create(\Cowsayphp\Farm\Whale::class);

        $figlet = new Figlet();

        //$texts = $cow->say('HappyBirthday');

        return $figlet->setFont('small')->render('Happy Birthday');
    }
}
