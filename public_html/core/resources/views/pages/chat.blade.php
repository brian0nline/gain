
@section('title', __('Chat | Freeloot'))
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="chat-messages" class="chat-messages"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form id="chat-form" class="chat-form">
        <input type="text" class="form-control" placeholder="Enter your message...">
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
</div>


@endsection