@extends('admin.sectionstarter.starter')





@section('content')

  <!--   این قسمت میتونه در همه پنل ها باشه خانه و ادرس اون صفحه رو نشون میدهContent Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- start Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /. end content-header -->

    <!-- Main content قسمت داشبورد -->
      <div class="container-fluid">
            <div class="page-header">
                <h2>ویرایش مقاله</h2>
            </div>

            {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            <script>tinymce.init({ selector:'textarea' });</script> --}}

<form class="from-horizontal" action="{{ route('articles.update' , $article->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('admin.sectionstarter.errors')

        <div class="form-group">
        <div class="col-sm-12">
            <lable for="title" class="control-lable">عنوان مقاله</lable>
            <input type="text" class="form-control" name="title" id="title" placeholder="عنوام مقاله را وارد کنید"  value="{{ $article->title }}">
        </div>
        </div>


    <div class="form-group">
        <div class="col-sm-12">
            <lable for="description" class="control-lable">توضیحات کوتاه</lable>
        <textarea rows="5" class="form-control" name="description" id="description" placeholder="توضیحات کوتاه را وارد کنید" >{{ $article->description }}</textarea>
        </div>
    </div>


        <div class="form-group">
        <div class="col-sm-12">
        <lable for="body" class="control-lable">متن</lable>
        <textarea  rows="5"  class="form-control" name="body" id="body" placeholder="متن مقاله را وارد کنید" >{{  $article->body }}</textarea>
        </div>
        </div>


    {{-- ساخت فرم== نمایش عکس ها++انتخاب عکس جدید
 دو فرم احتیاج داریم یکی برای اینکه عکس جدیدی رو ارسال کنیم
 فرم دوم:برایه  نمایش عکس های قدیمی بر اساس لیبل سایز به کاربر هستش و همچنین عکس شاخص تیک خورده باشه --}}
    <div class="form-group">
     <div class="row">
          <div class="col-sm-12">
              <lable for="images" class="control-lable">تصویر مقاله</lable>
              <input  type="file" class="form-control" name="images" id="images" placeholder="تصویر  مقاله را وارد کنید"  value="{{ old('imageurl')}}">
          </div>
        <div class="col-sm-12">
            <div class="row">
              {{-- یه حلقه فور ایچ زدیم برایه نمایش عکس ها ===ما با متغیر ایمچ سایز در کنترلر ادمین کنترلر مشخص کردیک کلید هر عکسی سایز اون عکس باشه
              خوب در اینجا هم با حلقه فور ایچ میگیم لیبل هر عکسی که نمایش میدی همین کلید یا سایز اون عکس باشد
              در این لیبل ها میخواهیم اون عکسی که سایز ش برابر 300 هستش یعنی  همون ایمچ تامپ ذخیره کلیدش چک شده باشه
               برایه همین یک اینپوپ  با تایپ رادیو درست میکنیم --}}
              @foreach ($article->images['images'] as $key=>$image)
                <div class="col-sm-2">
                    <lable class="control-lable">
                                {{-- بر اساس کلید عکس رو نمایش میده یعنی اول سایز عکس رو نمایش بده --}}
                        {{$key }}
                                {{-- تصویر شاخص=میخواهیم تصویر شاخص بر اساس سایزش تیک خورده باشه بصورت پیش فرض --}}
                        <input type="radio" name="imagesThumb" value="{{ $image }}"   {{ $article->images['thumb'] == $image ? 'checked' : '' }}>
                        {{-- نمایش عکس ها بتریت سایز و لیبل  --}}
                        <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                    </lable>
                </div>
              @endforeach
        </div>
          </div>
      </div>
     </div>

        <div class="form-group">

            <div class="col-sm-12">
                    <lable for="tags" class="control-lable">تگ ها</lable>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ های مقاله را وارد کنید"  value="{{ $article->tags }}">
            </div>
            </div>
        </div>

        <div class="from-group">

            <div class="col -sm-12">
                <button class="btn btn-primary">ارسال مقاله جدید</button>
            </div>


        </div>
</form>

      </div><!-- /.container-fluid -->
    <!-- /.content پایان داشبورد -->
  </div>
  <!-- /.content-wrapper -->

@endsection
