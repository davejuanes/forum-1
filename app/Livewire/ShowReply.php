<?php

namespace App\Livewire;

use App\Models\Reply;
use Livewire\Component;

class ShowReply extends Component
{
    public Reply $reply;
    public $body = false;
    public $is_creating = '';
    protected $listeners = ['refresh' => '$refresh'];
    
    public function render()
    {
        return view('livewire.show-reply');
    }
    public function postChild() {
        if (! is_null($this->reply->reply_id)) return;

        // validate
        $this->validate([
            'body' => 'required'
        ]);
        
        // crear
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body
        ]);

        // refresh
        $this->is_creating = false;
        $this->body = '';
        $this->dispatch('refresh')->self();
    }
}
