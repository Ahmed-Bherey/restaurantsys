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
        <div class="items_page mb-3 position-absolute">
            <div class="sys_header">
                <h4>ادارة قائمة المنتجات</h4>
            </div>
            @foreach ($categories as $key => $category)
                <section class="items_tab">
                    <div class="container">
                        <div class="d-flex item_header justify-content-between">
                            <h4>{{ $category->name }}</h4>
                            <div>
                                <div class="plus_icon"><i class="fa-solid fa-plus"></i></div>
                                <div class="plus_icon edit_cat">
                                    <a href="{{route('category.edit',$category->id)}}" class="text-white"><i class="fa-regular fa-pen-to-square"></i></a>
                                </div>
                                <div class="plus_icon"><i class="fa-solid fa-trash"></i></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-lg-4 col-xl-3 item_box">
                                <div class="item_box_img">
                                    <img src="{{ asset('public/admin/assets/dist/img/1.jpg') }}" alt="">
                                </div>
                                <div class="item_box_content">
                                    <div class="title mb-2">سلطة خضروات</div>
                                    <div class="desc mb-2">طماطم مقشرة-سلطة موتزاريلا</div>
                                    <div class="price mb-2">9.00 ج</div>
                                    <p class="text-success fw-bold mb-2">متوفر</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-xl-3 item_box">
                                <div class="item_box_img">
                                    <img src="{{ asset('public/admin/assets/dist/img/2.jpg') }}" alt="">
                                </div>
                                <div class="item_box_content">
                                    <div class="title mb-2">سلطة خضروات</div>
                                    <div class="desc mb-2">طماطم مقشرة-سلطة موتزاريلا</div>
                                    <div class="price mb-2">9.00 ج</div>
                                    <p class="text-success fw-bold mb-2">متوفر</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-xl-3 item_box">
                                <div class="item_box_img">
                                    <img src="{{ asset('public/admin/assets/dist/img/3.jpg') }}" alt="">
                                </div>
                                <div class="item_box_content">
                                    <div class="title mb-2">سلطة خضروات</div>
                                    <div class="desc mb-2">طماطم مقشرة-سلطة موتزاريلا</div>
                                    <div class="price mb-2">9.00 ج</div>
                                    <p class="text-success fw-bold mb-2">متوفر</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-xl-3 item_box">
                                <div class="item_box_img">
                                    <img src="{{ asset('public/admin/assets/dist/img/4.jpg') }}" alt="">
                                </div>
                                <div class="item_box_content">
                                    <div class="title mb-2">سلطة خضروات</div>
                                    <div class="desc mb-2">طماطم مقشرة-سلطة موتزاريلا</div>
                                    <div class="price mb-2">9.00 ج</div>
                                    <p class="text-success fw-bold mb-2">متوفر</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>

        <section class="create_category_form position-fixed">
            <div class="card-header header-bg">
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

        <section class="edit_cat_form position-fixed">
            <div class="card-header header-bg">
                <h3 class="card-title header-title"><i class="fa-solid fa-briefcase"></i> تعديل القسم</h3>
            </div>
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{ $category->name }}" id="name"
                                    placeholder="اسم القسم" name="name">
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
