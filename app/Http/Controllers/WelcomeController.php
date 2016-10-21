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
}
