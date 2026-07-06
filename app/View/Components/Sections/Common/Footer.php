<?php

namespace App\View\Components\Sections\Common;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public function render(): View
    {
        return view('components.sections.common.footer', [
            'courses' => Course::query()
                ->published()
                ->orderBy('start_date')
                ->limit(5)
                ->get(),
        ]);
    }
}
