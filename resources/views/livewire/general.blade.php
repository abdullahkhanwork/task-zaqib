<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Total Bill</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Total Items Sold</th>
        <th scope="col">Date</th>
    </tr>
    </thead>
    @foreach($sales as $sale)
        <tr>
            <th scope="row">{{ $sale->id }}</th>
            <td>PKR {{ $sale->total_bill }}</td>
            <td>{{ $sale->customer->name }}</td>
            <td>{{ $sale->total_items_sold }}</td>
            <td>{{ $sale->created_at }}</td>
        </tr>
    @endforeach
</table>



