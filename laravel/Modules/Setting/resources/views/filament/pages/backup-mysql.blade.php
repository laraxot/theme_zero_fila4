<x-filament::page>
    <table>
    <thead>
        <tr>
            <th>name</th>
            <th>database</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($connections as $name=>$conn)
        <tr>
            <td>{{ $name }}</td>
            <td>{{ $conn['database'] }}</td>
            <td><button wire:click="download('{{ $name }}')">Download</button></td>
        </tr>
    @endforeach
    </tbody>
    </table>
</x-filament::page>
