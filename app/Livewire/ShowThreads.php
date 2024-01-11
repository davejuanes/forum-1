<?php

namespace App\Livewire;


use App\Models\Category;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::all();

        return view('livewire.show-threads', [
            'categories' => $categories
        ]);
    }
}
