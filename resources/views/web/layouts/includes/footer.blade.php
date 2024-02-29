</main>
<section class="waiter">
    <div class="container">
        <h3 class="title text-center">طلب جرسون</h3>
        <div class="btn btn-dark mb-2">الطاولة</div>
        <form action="#" method="#">
            @csrf
            <select required class="form-select mb-3">
                <option value="">اختر الطاولة</option>
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->areas->name }} - {{ $table->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="text-center">
        <a href="#" class="btn btn-primary mb-2">اتصل الان</a>
    </div>
</section>

<section class="client_opinion">
    <div class="container">
        <h3 class="title text-center">رأيك يهمنا</h3>
        <form action="{{ route('opinion.store') }}" method="post">
            @csrf
            <textarea class="form-control mb-3" rows="1" placeholder="رأيك ..." name="opinion" id="opinion"></textarea>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn bg-success-2 mr-3">
                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                </button>
                <button class="btn bg-secondary" type="reset">
                    <i class="fas fa-undo"></i>
                </button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</section>



<footer class="d-flex justify-content-around">
    <div class="copyright">جميع الحقوق محفوظة &copy;
        <a href="https://api.whatsapp.com/send?phone=@isset($generalSetting->tel1) {{ $generalSetting->tel1 }} @endisset"
            class="text-success fw-bold text-decoration-none" target="blank">
            Resturant
        </a>
    </div>
    <div class="developed_by">Developed By
        <a href="https://api.whatsapp.com/send?phone=201030526114" class="text-danger fw-bold text-decoration-none"
            target="blank">
            Eng-Ahmed Abdelwahab
        </a>
    </div>
</footer>

{{-- <script>
    let addNewImg = document.querySelectorAll('.product_content'),
    newImg = document.querySelectorAll('.new_img'),
    ownImg = document.querySelectorAll('.own_img');

    for (let i = 0; i < addNewImg.length; i++) {
        addNewImg[i].addEventListener('click',()=>{
            for (let index = 0; index < newImg.length; index++) {
                newImg[index].innerHTML=`<img src="{{asset('public/web/img/logo.png')}}" alt="">`
            }
        })
    }
</script> --}}
