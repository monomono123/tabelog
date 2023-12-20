<div>
     <h2>Add New Restaurant</h2>
 </div>
 <div>
     <a href="{{ route('restaurants.index') }}"> Back</a>
 </div>
 
 <form action="{{ route('restaurants.store') }}" method="POST">
     @csrf
 
     <div>
         <strong>Name:</strong>
         <input type="text" name="name" placeholder="Name">
     </div>
     <div>
         <strong>Description:</strong>
         <textarea style="height:150px" name="description" placeholder="Description"></textarea>
     </div>
     <div>
         <strong>Price:</strong>
         <input type="number" name="price" placeholder="Price">
     </div>
     <div>
         <button type="submit">Submit</button>
     </div>
 
 </form>