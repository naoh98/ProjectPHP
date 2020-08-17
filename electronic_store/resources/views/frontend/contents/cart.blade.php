@extends('frontend.layouts.main')
@section('title','Giỏ hàng')
@section('content')
    <div class="cart_wrapper">
        <div class="cart mt-4 delete_cart_url" data-url="{{route('deleteCart')}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table mt-3 table-striped update_cart_url" data-url="{{route('updateCart')}}">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @if( !session()->get('cart'))
                                <div style="text-align: center">
                                    <h2>Your cart is empty !</h2>
                                </div>
                            @else
                                @foreach($carts as $key => $cartItem)
                                <tr>

                                    @php
                                        $total += $cartItem['price'] * $cartItem['quantity'];
                                    @endphp
                                    <th scope="row">
                                        {{$key}}
                                    </th>
                                    <td>
                                        <img style="width: 150px;" src="{{asset('/storage/files/' . basename($cartItem['image']))}}" alt="image">
                                    </td>
                                    <td>{{ $cartItem['name'] }}</td>
                                    <td>{{ $cartItem['price'] }}</td>
                                    <td>
                                        <input type="number" value="{{ $cartItem['quantity'] }}" min="1" class="quantity" />
                                    </td>
                                    <td>{{ $cartItem['price'] * $cartItem['quantity'] }} VNĐ</td>
                                    <td>
                                        <a href="" data-id="{{$key}}" class="btn btn-primary update-cart">Update</a>
                                        <a href="" data-id="{{$key}}" class="btn btn-warning delete-cart">Delete</a>
                                    </td>
                                </tr>
                                 @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2 style="text-align: left">Total: {{number_format($total)}} VNĐ</h2>
                    </div>
                    <div class="col-md-6">
                        <h2 style="text-align: right"><a href="{{route('checkout.index')}}" class="btn btn-success">Proceed to checkout</a></h2>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


<script type="text/javascript">

    function updateCart(e) {
        e.preventDefault();
       let urlUpdate = $('.update_cart_url').data('url');
       let id = $(this).data('id');
       let quantity = $(this).parents('tr').find('input.quantity').val();


       $.ajax({
           type: "GET",
           url: urlUpdate,
           data: {id: id, quantity: quantity},
           success: function (data) {
               console.log(data);
               if (data.code === 200) {
                    $('body').html(data.cart_view);
                   alert('Cập nhật thành công !');
               }

           },
           error: function () {

           }

       });
    }

    function deleteCart(e) {
        e.preventDefault();

        let urlDelete = $('.delete_cart_url').data('url');
        let id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: urlDelete,
            data: {id: id},
            success: function (data) {
                console.log(data);
                if (data.code === 200) {
                    $('body').html(data.cart_view);
                    alert('Cập nhật thành công !');
                }

            },
            error: function () {

            }

        });

    }
   $(function () {
       $(document).on('click', '.update-cart', updateCart);
       $(document).on('click', '.delete-cart', deleteCart);
   })

</script>
@endsection
