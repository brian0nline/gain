<div wire:poll>
    <div class="chat-container" >
        <div class="chat-button" style="{{ $showChat ? "left:-34px" : "left:-40px" }}">
            <button type="button" wire:click="toggleChat()" class="togglebtn">
                <!--<i class="fa-solid fa-arrow-left-long"></i>-->
               @if($showChat)
                <i class="fa-solid fa-arrow-right-long"></i>
                @else
               <i class="fa-solid fa-message"></i>
                @endif
            </button>
        </div>
        @if ($showChat)
            <div class="chat-messages">
                <div class="load-more text-center">
                    <div wire:click="loadMore()" class="btn btn-sm btn-dark align-self-center p-0 px-2" style="font-size:14px;">older..</div>
                </div>
                @foreach ($chats as $message)
                    <div class="chats-wrapper">
                        <!--{{$message->users->profile->image}}-->
                        <div class="wrapper-top">
                           <div style="display:flex;" >
                                <div class="chat-header">
                                        @if(empty($message->users->profile->image))
                                            <img src="{{ asset('asset/images/users/default.png') }}" alt="" />
                                        @else
                                            @if(strpos($message->users->profile->image, 'http') !== FALSE)
                                            
                                                <img src="{{$message->users->profile->image}}"
                                                    alt="" />
                                            @else
                                             <img src="{{ getImage(imagePath()['users']['path'] . '/' . $message->users->profile->image) }}"
                                                alt="" />
                                           
                                            @endif
                                            
                                        @endif
                                    <h5 class="user">{{ $message->users->username }}</h5>
                                     <!--<div class="time">-->
                                        <!--{{ diffForHumans($message->created_at) }}-->
                                    <!--</div>-->
                                </div>
                                 @if($message->users->profile->user_id == 1)
                                    <div class="admin-chat" style="margin-left:20px;background-color: #e84b3c;color: #fff; border-radius:14px;display:inline-block;font-size:11px;padding: 4px 6px;margin-bottom:5px;letter-spacing: 2px;">
                                        owner
                                    </div>
                                @endif
                               
                            </div>
                        </div>
                        <div class="wrapper-bottom">
                            <p>{{ $message->message }}</p>
                           
                        </div>
                    </div>
                @endforeach
                <div class="chart-form position-sticky bottom-0">
                    @auth()
                        <form wire:submit.prevent="sendMessage" id="chat_form">
                            <input wire:model.defer="messageText" type="text" class="form-control" placeholder="Say Something" />
                        </form>
                    @else
                        
                        <form action="{{ route('user.login') }}" id="chat_form">
                            <input wire:model.defer="messageText" type="text" class="form-control" placeholder="Please Login" />
                        </form>
                        
                    @endauth
                </div>
            </div>
        @endif
    </div>
</div>

