<div>
     <h2>Edit Restaurant</h2>
 </div>
 <div>
     <a href="{{ route('restaurants.index') }}"> Back</a>
 </div>
 
 <form action="{{ route('restaurants.update',$restaurant->id) }}" method="POST">
     @csrf
     @method('PUT')
 
     <div>
         <strong>Name:</strong>
         <input type="text" name="name" value="{{ $restaurant->name }}" placeholder="Name">
     </div>
     <div>
         <strong>Description:</strong>
         <textarea style="height:150px" name="description" placeholder="description">{{ $restaurant->description }}</textarea>
     </div>
     <div>
         <strong>Price:</strong>
         <input type="number" name="price"  value="{{ $restaurant->price }}">
     </div>
     <div>
         <button type="button" class="btn btn-danger">Danger</button>
     </div>
 
 </form>