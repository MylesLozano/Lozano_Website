@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg navbar-dark d-flex align-items-center bg-dark text-light justify-content-between">
                <h1 class="ms-3">Welcome, {{ Auth::guard('admin')->user()->name }}!</h1>
                <h5 class="me-3"><a href="{{ route('index') }}"><--Return to Homepage</a></h5>
            </nav>

            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" id="admins-tab" data-bs-toggle="tab" href="#admins" role="tab"
                                aria-controls="admins" aria-selected="true">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab"
                                aria-controls="users" aria-selected="true">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="products-tab" data-bs-toggle="tab" href="#products" role="tab"
                                aria-controls="products" aria-selected="true">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab"
                                aria-controls="images" aria-selected="true">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sellers-tab" data-bs-toggle="tab" href="#sellers" role="tab"
                                aria-controls="sellers" aria-selected="true">Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab"
                                aria-controls="orders" aria-selected="true">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="order-items-tab" data-bs-toggle="tab" href="#order-items" role="tab"
                                aria-controls="order-items" aria-selected="true">Order Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="carts-tab" data-bs-toggle="tab" href="#carts" role="tab"
                                aria-controls="carts" aria-selected="true">Carts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cart-items-tab" data-bs-toggle="tab" href="#cart-items" role="tab"
                                aria-controls="cart-items" aria-selected="true">Cart Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="categories-tab" data-bs-toggle="tab" href="#categories" role="tab"
                                aria-controls="categories" aria-selected="true">Categories</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="tab-content">
                    <!-- Admins -->
                    <div class="tab-pane fade show active" id="admins" role="tabpanel" aria-labelledby="admins-tab">
                        <h2>Admins</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit', $admin->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Users -->
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <h2>Users</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->firstName }} {{ $user->middleName }} {{ $user->lastName }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobileNumber }}</td>
                                            <td>{{ $user->address }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                        <h2>Products</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                        <h2>Images</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>URL</th>
                                        <th>ProductID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>{{ $image->id }}</td>
                                            <td>{{ $image->url }}</td>
                                            <td>{{ $image->product_id }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Sellers -->
                    <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                        <h2>Sellers</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sellers as $seller)
                                        <tr>
                                            <td>{{ $seller->id }}</td>
                                            <td>{{ $seller->name }}</td>
                                            <td>{{ $seller->email }}</td>
                                            <td>{{ $seller->mobileNumber }}</td>
                                            <td>{{ $seller->address }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Orders -->
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h2>Orders</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user_id }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->status }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- OrderItems -->
                    <div class="tab-pane fade" id="order-items" role="tabpanel" aria-labelledby="order-items-tab">
                        <h2>OrderItems</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Order ID</th>
                                        <th>Product ID</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $orderItem)
                                        <tr>
                                            <td>{{ $orderItem->id }}</td>
                                            <td>{{ $orderItem->order_id }}</td>
                                            <td>{{ $orderItem->product_id }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td>{{ $orderItem->price }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Carts -->
                    <div class="tab-pane fade" id="carts" role="tabpanel" aria-labelledby="carts-tab">
                        <h2>Carts</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->id }}</td>
                                            <td>{{ $cart->user_id }}</td>
                                            <td>{{ $cart->status }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Cart Items -->
                    <div class="tab-pane fade" id="cart-items" role="tabpanel" aria-labelledby="cart-items-tab">
                        <h2>Cart Items</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cart ID</th>
                                        <th>Product ID</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $cartItem)
                                        <tr>
                                            <td>{{ $cartItem->id }}</td>
                                            <td>{{ $cartItem->cart_id }}</td>
                                            <td>{{ $cartItem->product_id }}</td>
                                            <td>{{ $cartItem->quantity }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                        <h2>Categories</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
