<?php

namespace App\Livewire;


use App\Models\Category;
use App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::all();
        $threads = Thread::latest()->withCount('replies')->get();

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
