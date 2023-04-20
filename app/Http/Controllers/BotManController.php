<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}',function($botman,$message){

            if ($message == 'hi') {
                $this->askName($botman);
            }elseif(str_contains($message, 'please')) {
                $this->askQuery($botman);
            }else{
                $botman->reply("write 'hi' for testing...");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Hello! What is Your Name?",function(Answer $answer){
            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
    public function askQuery($botman)
    {
        $botman->ask("How may I help you",function(Answer $answer){
         $name = $answer->getText();

            $this->say('We will connect you '.$name);
        });
    }
}