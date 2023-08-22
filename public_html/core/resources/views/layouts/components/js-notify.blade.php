
@foreach (session('notify') ?? [] as $msg)
    <script>
        (function($){
        "use strict";
    console.log('a')
        toastr.{{ $msg[0] }}('{{ __($msg[1]) }}');
    })(jQuery);
    </script>
@endforeach

    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp

    <script>
         (function($){
        "use strict";
        @foreach ($errors ?? [] as $error)
            toastr.error('{{ __($error) }}');
        @endforeach
    })(jQuery);
    </script>

<script>
    "use strict";
    function notify(status, message) {
        toastr[status](message);
    }
</script>
