@extends('web.layouts.includes.cart')
@section('content')
    <section class="cart">
        <div class="container">
            <h3>قائمة السلة</h3>
            <div class="cart_list">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">صورة الطلب</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">السعر</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <th class="cart_item_img">
                                    <img src="{{ asset('/public/' . Storage::url($item->attributes->img)) }}"
                                        class="w-20 rounded" alt="Thumbnail">
                                </th>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                            style="width: 30%" />
                                        <button type="submit" class="update_quanty">تحديث</button>
                                    </form>
                                </td>
                                <td>{{ $item->price }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="remove_item px-4 py-2 text-white bg-red-600">x</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                الاجمالى:  {{ Cart::getTotal() }} جـ
            </div>
            <div>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="remove_all">Remove All Cart</button>
                </form>
            </div>
        </div>
    </section>
@endsection
