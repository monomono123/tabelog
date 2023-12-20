<a href="{{ route('restaurants.create') }}"> Create New Restaurant</a>
 
 <table>
     <tr>
         <th>Name</th>
         <th>Description</th>
         <th>Price</th>
         <th>Category ID</th>
         <th >Action</th>
     </tr>
     @foreach ($restaurants as $restaurant)
     <tr>
         <td>{{ $restaurant->name }}</td>
         <td>{{ $restaurant->description }}</td>
         <td>{{ $restaurant->price }}</td>
         <td>{{ $restaurant->category_id }}</td>
         <td>{{ $restaurant->time }}</td>
         <td>{{ $restaurant->address }}</td>
         <td>
            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
             <a href="{{ route('restaurants.show',$restaurant->id) }}">Show</a>
             <a href="{{ route('restaurants.edit',$restaurant->id) }}">Edit</a>
             @csrf
             @method('dDELETE')
             <button type="submit">Delete</button>
            </form>
         </td>
     </tr>
     @endforeach
 </table>
