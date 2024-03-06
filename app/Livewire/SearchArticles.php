<?php

namespace App\Livewire;

use Livewire\Component;

class SearchArticles extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search-articles', ['articles' => \App\Models\Article::search($this->search)]);
    }
}
