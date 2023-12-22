@extends('layouts.app')

@section('content') 
    <div style="width: 100%;" class="container">
    <form action="{{route('restaurants.index')}}" method="get">
        <select name="category_id">
        <option value="">選択してください</option>
        @foreach($categories as $category)
        @if($category->id == request('category_id'))
        <option value="{{$category->id}}" selected>{{$category->name}}</option>
        @else
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endif
        @endforeach
        </select>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
    <h3>
      {{$total_count}}件の店舗があります
    </h3>

    @foreach ($restaurants as $restaurant)

            <div class="card" style="width:40rem;margin:5rem auto;">
                <img src="{{ asset($restaurant->image) }}" alt="{{ $restaurant->name }}" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">{{ $restaurant->name }}</h3>
                        <div class="card-text">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">平均評価</th>
                                    <td>{{ $restaurant->reviews->avg('star') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">詳細</th>
                                    <td>{{ $restaurant->discription}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">価格帯</th>
                                    <td>{{ $restaurant->pricelower }}円～{{ $restaurant->priceupper }}円</td>
                                </tr>
                                <tr>
                                    <th scope="row">営業時間</th>
                                    <td>{{ $restaurant->time }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">定休日</th>
                                    <td>{{ $restaurant->holiday }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">住所</th>
                                    <td>{{ $restaurant->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($restaurant->image !== "")
                         <img src="{{ asset($restaurant->image) }}" class="img-thumbnail">
                         @else
                         <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                         @endif
                        <a class="btn btn-primary" href="{{ route('restaurants.show',$restaurant->id) }}" role="button">詳細をみる</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    <div style="width:100%"><div style="width: fit-content;margin:0 auto;">
        {{ $restaurants->links() }}
    </div></div>
@endsection