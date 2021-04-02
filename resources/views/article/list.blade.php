@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($articles as $article)
                    <div class="alert alert-success">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><img src="https://cdn.sstatic.net/Img/teams/teams-illo-free-sidebar-promo.svg?v=47faa659a05e" height="80" width="150"></h6>
                                <p class="card-text">{{ $article->content }}</p>
                                <form style="float: right; padding: 5px" action="{{ route('post.show', [$article->id]) }}"
                                    method="POST">
                                    @csrf
                                    {{ method_field('GET') }}
                                    <button type="submit">Edit</button>
                                </form>

                                <form style="float: right; padding: 5px" action="{{ route('post.destroy', [$article->id]) }}"
                                    method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit">Destroy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row justify-content-center">
                    {{ $articles->links() }}
                </div>

            </div>
        </div>
    @endsection
