

<div>
     <h2> Show Restaurant</h2>
 </div>
 <div>
     <a href="{{ route('restaurants.index') }}"> Back</a>
 </div>
 
 <div>
     <strong>Name:</strong>
     {{$restaurant->name}}
 </div>
 
 <div>
     <strong>Description:</strong>
     {{$restaurant->description}}
 </div>
 
 <div>
     <strong>Price:</strong>
     {{$restaurant->price}} 
 </div>

     <div class="col-5">
     @if($restaurant->isFavoritedBy(Auth::user()))
        <a href="{{ route('restaurants.favorite', $restaurant) }}" class="btn restaurant-favorite-button text-favorite w-100">
            <i class="fa fa-heart"></i>
                 お気に入り解除
        </a>
     @else
        <a href="{{ route('restaurants.favorite', $restaurant) }}" class="btn restaurant-favorite-button text-favorite w-100">
            <i class="fa fa-heart"></i>
             お気に入り
        </a>
     @endif
     </div>

       <div class="offset-1 col-10">
          <div class="row">
                 @foreach($reviews as $review)
                 <div class="offset-md-5 col-md-5">
                     <p class="h3">{{$review->content}}</p>
                     <label>{{$review->created_at}} {{$review->user->name}}</label>
                 </div>
                 @endforeach
             </div><br />
 
             @auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="{{ route('reviews.store') }}">
                         @csrf
                         <h4>レビュー内容</h4>
                         @error('content')
                             <strong>レビュー内容を入力してください</strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                         <input type="hidden" name="product_id" value="{{$product->id}}">
                         <button type="submit" class="btn samuraimart-submit-button ml-2">レビューを追加</button>
                     </form>
                 </div>
             </div>
          </div>
             @endauth