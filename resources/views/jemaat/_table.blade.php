
<table class="min-w-full table-auto">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Email</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($jemaat as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->status }}</td>
            <td>
                @if($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" width="60">
                @endif
            </td>
            <td class="space-x-2">
                <a href="{{ route('jemaat.show', $item) }}" class="btn">Show</a>
                <a href="{{ route('jemaat.edit', $item) }}" class="btn">Edit</a>
                <form action="{{ route('jemaat.destroy', $item) }}" method="POST"
                      class="inline" onsubmit="return confirm('Hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $jemaat->links() }}
</div>
