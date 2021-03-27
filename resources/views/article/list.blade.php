@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @foreach ($articles as $article)
                            <div class="alert alert-success">
                                {{ $article }}
                                <form style="float: right; padding: 5px" action="{{ route('post.show', [$article->id]) }}" method="POST">
                                    @csrf
                                    {{ method_field('GET') }}
                                    <button type="submit">Edit</button>
                                </form>

                                <form style="float: right; padding: 5px" action="{{ route('post.destroy', [$article->id]) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit">Destroy</button>
                                </form>
                            </div>
                        @endforeach
                        <div class="row justify-content-center">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
