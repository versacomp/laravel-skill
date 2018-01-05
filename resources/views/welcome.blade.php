@extends ('layouts.master')


@section ('content')

    <div id="app" class="col-sm-8">


        <h1>Products</h1>

        <form method="POST" action="/">
            {{ csrf_field() }}

            <div class="form-group">

                <label for="name">Product Name:</label>

                <input type="text" class="form-control" id="name" name="name">

            </div>

            <div class="form-group">

                <label for="quantity">Qty in Stock:</label>

                <input type="text" class="form-control" id="quantity" name="quantity">

            </div>

            <div class="form-group">

                <label for="price">Price ea:</label>

                <input type="text" class="form-control" id="price" name="price">

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-primary">Add Product</button>

            </div>


        </form>

        <my-products></my-products>

        <template id="my-products-template">
            <table class="table">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity in Stock</th>
                    <th>Price per item</th>
                    <th>Datetime submitted</th>
                    <th>Total Value</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product in items">
                    <td>@{{ product.name }}</td>
                    <td>@{{ product.quantity }}</td>
                    <td>@{{ product.price }}</td>
                    <td>@{{ product.created_at }}</td>
                    <td>@{{ product.item_total }}</td>
                </tr>
                </tbody>
            </table>
        </template>


    </div>


@endsection