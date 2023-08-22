<?php

namespace App\Http\Livewire;

use App\Models\Admin\FaqSection;
use App\Models\Gateway;
use App\Models\HomePage;
use Livewire\Component;

class Welcome extends Component
{


    public function home()
    {
        if(request()->join){
            session(['reference' => request()->join]);
        }

        $homePage = HomePage::all()->toArray();
        $faqSections = FaqSection::all();
        $tasks = null;
        return view(
            'layouts.welcome',
            compact(
                'homePage',
                'faqSections'
            )
        );
    }

    public function blog()
    {
        $homePage = HomePage::all()->toArray();
        $faqSections = FaqSection::all();
        return view(
            'blog.posts',
            compact(
                'homePage',
                'faqSections'
            )
        );
    }

    public function singlePost()
    {
        $homePage = HomePage::all()->toArray();
        $faqSections = FaqSection::all();
        return view(
            'blog.single-blog',
            compact(
                'page',
                'homePage',
                'faqSections',
                'blog'
            )
        );
    }

}
