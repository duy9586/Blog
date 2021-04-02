@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id="data" style="padding: 50px">
                @foreach ($chats as $item)
                    <p><strong>{{ $item->author }}:</strong> {{ $item->content }}</p>
                @endforeach
            </div>
            <form method="POST" action="{{ route('chats.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('Content') }}</label><span class="text-danger">(*)</span>
                                <input id="content" type="text" name="content" class="form-control" required />
                                <label for="receiver">{{ __('Receiver') }}</label><span class="text-danger">(*)</span>
                                <input id="receiver" type="text" name="receiver" class="form-control" value="{{ Auth::user() -> username == "QuocDuy" ? "QuocDuy2" : "QuocDuy" }}"/>
                                @error('content')
                                    <span style="color: red; font-size: auto">
                                        <strong>*{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.3/socket.io.js" integrity="sha512-2RDFHqfLZW8IhPRvQYmK9bTLfj/hddxGXQAred2wNZGkrKQkLGj8RCkXfRJPHlDerdHHIzTFaahq4s/P4V6Qig==" crossorigin="anonymous"></script>
    <script>

        var socket = io('http://localhost:3000', { transports: ['websocket'] });

        socket.on('laravel_database_chat:messages', function(data) {
            if ($("#" + data.id).length == 0) {
                $('#data').append(`<p><strong>${data.author}:</strong>${data.content}</p>`);
            } else {
                console.log("Message is exists !!!");
            }
        })
    </script>
@endsection
