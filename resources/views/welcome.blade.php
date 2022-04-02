<!DOCTYPE html>
<html>
<head>
    <title>Datatables</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="">

    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                    <div class="mt-0">
                        <h4 class="pb-3">Category</h4>
                        <select id="filter-category" class="form-control" name="filter-category" title="Pick Category">
                            <option value="">Select a category</option>
                            @foreach(\App\Models\Category::all()->pluck('name', 'id') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <h4 class="pb-3">Supplier</h4>
                        <select id="filter-supplier" class="form-control" name="filter-supplier" title="Pick Supplier">
                            <option value="">Select a supplier</option>
                            @foreach(\App\Models\Supplier::all()->pluck('name', 'id') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <h4 class="pb-3">Product</h4>
                        <select id="filter-product" class="form-control" name="filter-product" title="Pick Product">
                            <option value="">Select a product</option>
                            @foreach(\App\Models\Product::all()->pluck('name', 'id') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <h4 class="pb-3">Customer</h4>
                        <select id="filter-customer" class="form-control" name="filter-customer" title="Pick Customer">
                            <option value="">Select a customer</option>
                            @foreach(\App\Models\Customer::all()->pluck('name', 'id') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-8">
                    @livewire('general')
                </div>
            </div>

        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

@livewireScripts

<script>
    $('#filter-category').on('change', function () {
        window.livewire.emit('changeFilter', 'category', $(this).val());
    });
    $('#filter-supplier').on('change', function () {
        window.livewire.emit('changeFilter', 'supplier', $(this).val());
    });
    $('#filter-product').on('change', function () {
        window.livewire.emit('changeFilter', 'product', $(this).val());
    });
    $('#filter-customer').on('change', function () {
        window.livewire.emit('changeFilter', 'customer', $(this).val());
    });
</script>
</body>
</html>
