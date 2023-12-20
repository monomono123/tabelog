@extends('layouts.app')

@section('content') 
    @foreach ($restaurants as $restaurant)
        <div style="width: 100%;">
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
                        <a class="btn btn-primary" href="{{ route('restaurants.show',$restaurant->id) }}" role="button">詳細をみる</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div style="width:100%"><div style="width: fit-content;margin:0 auto;">
        {{ $restaurants->links() }}
    </div></div>
@endsection