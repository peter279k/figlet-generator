<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Cowsayphp\Farm;
use Povils\Figlet\Figlet;

class WelcomeController extends Controller
{
    public function showWelcome() {
        $cow = Farm::create(\Cowsayphp\Farm\Cow::class);
        $whale = Farm::create(\Cowsayphp\Farm\Whale::class);

        $figlet = new Figlet();

        $texts = [
            '<pre>'.$cow->say('On I am a demonstration.').'</pre>',
            '<pre>'.$whale->say('I am a "docker".').'</pre>',
            '<pre>'.$figlet->setFont('small')->render('Figlet').'</pre>',
        ];

        return View('welcome')->with('cowTexts', $texts);
    }

    public function showAbout() {
        $aboutTxt = [
            'description' => '<h5 class="blue-text text-darken-2">這是一個產生 FIGLET 的文字產生器</h5>',
            'reference-url' => [
                '<h5 class="blue-text text-darken-2">使用到的專案：</h5>',
                '<div class="collection">',
                '<a href="https://github.com/alrik11es/cowsayphp" target="_blank" class="teal-text text-lighten-2 collection-item">cowsayphp</a>',
                '<a href="https://github.com/povils/figlet" target="_blank" class="teal-text text-lighten-2 collection-item">figlet</a>',
                '</div>',
            ],
        ];
        $aboutTxt = json_encode($aboutTxt);

        return $aboutTxt;
    }
}
