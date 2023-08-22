<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LiveChat as ModelsLiveChat;

class LiveChat extends Component
{
    public $messageText;

    public $perPage = 5;

    public $showChat = false;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    protected $rules = [
        'messageText' => 'required|string|min:1|max:191'
    ];


    public function toggleChat()
    {
        $this->showChat = !$this->showChat;
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function sendMessage()
    {
        $this->validate();

        ModelsLiveChat::create([
            'user_id' => auth()->user()->id,
            'message' => $this->messageText,
        ]);

        $this->messageText = '';
    }

    public function render()
    {
        $chats = ModelsLiveChat::with(['users:id,username', 'users.profile:user_id,image'])
            ->latest()
            ->paginate($this->perPage)->sortBy('id');
        return view('chat', compact('chats'));
    }
}
