<h1>{{$restaurant->name}}</h1>
<form action="{{ route('reservations.store') }}" method="POST">

    @csrf
    @if (isset($errors))
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    @endif

    @error('reservationnumber')
        <strong>予約人数を入力してください</strong>
    @enderror
    @error('reservationday')
        <strong>予約日時を入力してください</strong>
    @enderror

     <div>
         <strong>予約名</strong>
         <p>{{$user_name}}</p>
     </div>
     <div>
         <strong>予約人数</strong>
         <input type="number" name="reservationnumber" placeholder="2" min="1" value="{{old('reservationnumber')}}">
     </div>
     <div>
         <strong>予約日時</strong>
         <input type="datetime-local" name="reservationday" value="{{old('reservationday')}}">
     </div>

     <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">

     <div>
         <button type="button" class="btn btn-success">予約確定</button>
     </div>
 
 </form>