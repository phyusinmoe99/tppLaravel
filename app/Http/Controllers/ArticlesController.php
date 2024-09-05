<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        $articles = [
            [
                'title' => 'Title1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, eaque culpa facilis quibusdam sunt facere reprehenderit at adipisci placeat mollitia consectetur cumque delectus, quas atque, dolore quisquam aperiam ipsum fuga! ',
                'author' => 'Mg Mg'
            ],
            [
                'title' => 'Title2',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, eaque culpa facilis quibusdam sunt facere reprehenderit at adipisci placeat mollitia consectetur cumque delectus, quas atque, dolore quisquam aperiam ipsum fuga! ',
                'author' => 'Moe Moe'
            ],
            [
                'title' => 'Title3',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, eaque culpa facilis quibusdam sunt facere reprehenderit at adipisci placeat mollitia consectetur cumque delectus, quas atque, dolore quisquam aperiam ipsum fuga! ',
                'author' => 'Aye Aye'
            ],
        ];

        return view('articles.index',compact('articles'));
    }

}
