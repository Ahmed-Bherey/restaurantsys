@extends('admin.layouts.includes.master')
@section('content')
    <div class="content-wrapper position-relative">
        <!-- Content Header (Page header) -->
        <div class="overflew position-absolute"></div>
        <div class="items_header">
            <div class="container">
                <span class="create_category position-absolute"><i class="fa-solid fa-plus"></i> اضافة قسم جديد</span>
            </div>
        </div>
        <div class="item_box">
            <div class="item_head">
                <h4>ادارة قائمة المنتجات</h4>
            </div>
            @foreach ($categories as $key => $category)
                <div class="d-flex justify-content-between align-items-center box_header">
                    <h4>{{ $category->name }}</h4>
                    <div class="controll_icon">
                        <div class="plus_icon">
                            <a href="{{ route('items.create') }}" class="text-white"><i class="fa-solid fa-plus"></i></a>
                        </div>
                        <div class="plus_icon">
                            <a href="{{ route('category.edit', $category->id) }}" class="text-white"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                        </div>
                        <div class="plus_icon">
                            <a href="{{ route('category.destroy', $category->id) }}" class="text-white" type="submit"
                                onclick="return confirm('سيتم حذف جميع عناصر هذا التصنيف ايضا')"><i
                                    class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach (\App\Models\Item::where('category_id', $category->id)->latest()->paginate(8) as $item)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 boxes">
                            <div class="box_content">
                                <div class="item_box_img position-relative">
                                    <img src="{{ asset('/public/' . Storage::url($item->img)) }}" alt="">
                                    <div class="item_controll position-absolute">
                                        <div class="item_controll_icon">
                                            <div>
                                                <a href="{{ route('items.edit', $item->id) }}" class="text-white">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ route('items.destroy', $item->id) }}" class="text-white"
                                                    onclick="return confirm('هل حقا تريد حذف هذا العنصر ؟')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_box_content">
                                    <div class="title mb-2">{{ $item->name }}</div>
                                    <div class="desc mb-2">{{ $item->desc }}</div>
                                    <div class="price mb-2">{{ number_format($item->price, 2) }} جـ</div>
                                    @if ($item->active == 1)
                                        <p class="text-success fw-bold mb-2">متوفر</p>
                                    @else
                                        <p class="text-danger fw-bold mb-2">غير متوفر</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ \App\Models\Item::where('category_id', $category->id)->latest()->paginate(8)->links() }}
                </div>
            @endforeach
        </div>

        <section class="create_category_form position-fixed">
            <div class="card-header header-bg header_title">
                <h3 class="card-title header-title"><i class="fa-solid fa-briefcase"></i> اضافة قسم جديد</h3>
            </div>
            @include('admin.layouts.alerts.success')
            @include('admin.layouts.alerts.error')
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="اسم القسم"
                                    name="name">
                                <label for="name" class="col-sm-4 col-form-label">اسم القسم
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </section>

    </div>

    <script>
        let createCategory = document.querySelector('.create_category'),
            overflew = document.querySelector('.overflew'),
            createCategoryForm = document.querySelector('.create_category_form');

        createCategory.addEventListener('click', () => {
            createCategoryForm.classList.add('show')
            overflew.classList.add('displayBlock')
            setTimeout(function() {
                overflew.classList.add('opacity')
            }, 100)
        });

        overflew.addEventListener('click', () => {
            createCategoryForm.classList.remove('show')
            overflew.classList.remove('opacity')
            setTimeout(function() {
                overflew.classList.remove('displayBlock')
            }, 700)
        });
    </script>
@endsection
