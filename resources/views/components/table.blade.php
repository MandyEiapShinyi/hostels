@props(['tables'])

@if (count($tables)!=0)
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Room Quantity</th>
        <th>Details</th>
        <th>Actions</th>
    </tr>
    
    @foreach($tables as $table)
    <tr>
        <td>{{ $table->id }}</td>
        <td>{{ $table->room_name }}</td>
        <td>{{ $table->room_quantity }}</td>
        <td>{{ $table->details }}</td>
        <td>
            <a href="{{ route('rooms.edit', $table->id) }}">Edit</a>
            <form action="{{ route('rooms.destroy', $table->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endif
