@extends('layouts.app')
@section('content')
@php $locale = session()->get('locale'); @endphp
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('article.index')}}" class="btn btn-outline-primary btn-sm">{{ __("lang.back") }}</a>
                @if ($locale=="en")
                    <h4 class="display-one mt-5">{{ $article->titre_en }}</h4>
                    <hr>
                    <p>{!! $article->contenu_en !!}</p>
                    <hr>           
                    <p>{{ $article->articleHasUser->name }}</p>
                @else
                    <h4 class="display-one mt-5">{{ $article->titre }}</h4>
                    <hr>
                    <p>{!! $article->contenu !!}</p>
                    <hr>           
                    <p>{{ $article->articleHasUser->name }}</p>
                @endif
            </div>
        </div>
        @if (auth()->user()->id === $article->articleHasUser->id)
            <div class="row">
                <div class="col-6">
                    <a href="{{route('article.edit', $article->id)}}" class="btn btn-primary">{{ __("lang.edit") }}</a>
                </div>
                <div class="col-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{ __("lang.delete") }}
                    </button>
            
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('article.edit', $article->id )}}" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __("lang.delete_confirm")}} {{ $article->id }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ __("lang.delete_confirm_text") }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("lang.cancel") }}</button>
                                        <button type="submit" class="btn btn-danger">{{ __("lang.delete_confirmation") }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection