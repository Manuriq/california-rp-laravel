<?php

namespace App\Http\Livewire;

use App\Models\Forum;
use Livewire\Component;

class ForumForm extends Component
{
    public Forum $forum;

    protected $rules = [
        'forum.title' => ['string', 'max:25'],
        'forum.desc' => ['string', 'max:150'],
        'forum.order' => ['integer', 'required', 'min:1']
    ];

    public function save()
    {
        $this->validate();
        $this->forum->save();
        $this->emit('userUpdated');
    }

    public function render()
    {
        return view('livewire.forum-form');
    }
}
