<table class="table table-striped table-bordered">
    <thead>
        <tr>
            @if(count($rows) > 0)
                @foreach(array_keys((array) $rows[0]) as $header)
                    <th>{{ ucwords(str_replace('_', ' ', $header)) }}</th>
                @endforeach
            @else
                <th>No Data</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($rows as $row)
            <tr>
                @foreach((array) $row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @empty
            <tr><td colspan="100%">No records found.</td></tr>
        @endforelse
    </tbody>
</table>
