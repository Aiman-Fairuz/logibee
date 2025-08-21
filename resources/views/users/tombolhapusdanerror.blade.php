<td>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
    
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus user ini?')">Hapus</button>
    </form>
</td>
    