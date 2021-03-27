@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            {{ method_field('POST') }}
            <div>
                <label for="title">Title: </label>
                <input type="text" name="title" required />
                <br/>
                @error('title')
                    <span style="color: red; font-size: auto">
                        <strong>*{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="content">Content: </label>
                <br>
                <textarea cols="100" rows="10" name="content" required></textarea>
                <br/>
                @error('content')
                    <span style="color: red; font-size: auto">
                        <strong>*{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <button type="submit">Post</button>
            </div>
        </form>
    </div>
@endsection
