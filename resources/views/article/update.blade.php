@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.update', [$data->id]) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div>
                <label for="title">Title: </label>
                <input type="text" name="title" required value="{{ $data->title }}" />
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
                <textarea cols="100" rows="10" name="content" required>{{ $data->content }}</textarea>
                <br/>
                @error('content')
                    <span style="color: red; font-size: auto">
                        <strong>*{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <button type="submit">Update Data</button>
            </div>
        </form>
    </div>
@endsection
