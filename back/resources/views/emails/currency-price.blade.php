<div>
  <h3>Latest Currency Price</h3>
    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Date</th>
        </tr>
        @foreach ($currencyPrices as $title => $item)
            <tr>
                <td>{{ $title }}</td>
                <td>{{ $item['value'] }}</td>
                <td>{{ $item['date'] }}</td>
            </tr>
        @endforeach

    </table>
</div>
