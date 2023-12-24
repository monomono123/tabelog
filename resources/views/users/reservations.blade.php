@extends('layouts.app')

@section('content') 
@if (session('message'))
{{ session('message') }}
@endif
    @foreach ($reservations as $reservation)
        <div style="width: 100%;">
            <div class="card" style="width:40rem;margin:5rem auto;">
                <img src="{{ asset($reservation->restaurant->image) }}" alt="{{ $reservation->restaurant->name }}" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">{{ $reservation->restaurant->name }}</h3>
                        <div class="card-text">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">予約日時</th>
                                    <td>{{ $reservation->reservationday }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">予約人数</th>
                                    <td>{{ $reservation->reservationnumber }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger">キャンセル</button>
                        </form>
                        <br>
                        <a class="btn btn-primary" href="{{ route('restaurants.show',$reservation->restaurant->id) }}" role="button">詳細をみる</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div style="width:100%"><div style="width: fit-content;margin:0 auto;">
        {{ $reservations->links() }}
    </div></div>
@endsection