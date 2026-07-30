<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Laravel\Head\Facades\Head;

class HomeController
{
    public function __invoke(): View
    {
        Head::title('Moderná akadémia programovania')
            ->description('Coda Academy je programovacia akadémia v Trnave pre mladých ľudí. Učíme webový vývoj, tvorivé myslenie a prácu s AI na reálnych projektoch.');

        return view('pages.static.home', [
            'courses' => Course::query()
                ->published()
                ->orderBy('start_date')
                ->get(),
        ]);
    }
}
