@extends("layouts.app")
@section("content")
@php $locale = session()->get('locale'); @endphp
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="pt-5 display-one">
                {{ __("lang.forum_title")}}
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>{{ __("lang.forum_list") }}</h4>
                    <a href="{{ route('article.create')}}" class="btn btn-primary">{{__("lang.forum_add_button")}}</a>
                </div>
                <div class="card-body" >
                    <ul>
                    @forelse ($articles as $article)
                        <li>
                            <a href="{{ route('article.show', $article->id)}}">
                                @if ($locale=="en")
                                    {{ $article->titre_en }}
                                @else
                                    {{ $article->titre }}
                                @endif
                            </a>
                        </li>
                    @empty
                        <li class="text-danger">Aucun article disponible</li>    
                    @endforelse
                    </ul>
                </div>

            </div>
                            
        </div>
    </div>
</div>
@endsection