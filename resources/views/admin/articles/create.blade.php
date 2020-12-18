@extends('admin.sectionstarter.starter')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">صفحه سریع</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">صفحه سریع</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
{{-- این صفحه اصلی رو میشه در تمام صفحه ها بکار برد برایه اینکه متن در وسط باشه  کافیه مطالب بین این تگ ها قرا بگیره --}}




<h2> ارسال مقاله جدید</h2>
  {{-- فقط در اکشن باید مشخص کنیم اطلاعات به کدام متد ارسال میشه و کدمون رو در اون متد کنترلر مینویسیم
  نکته مهم بعدی متد همیشه پست میزنیم وبعد از تگ فرم یک تگ متذ فیلد میزنیم و بسته به توع عملیات پست و پوت و پچ یا دیلیت مینویسیم
  نکته مهم بعدی برای توکن هم از سی اس ار توکن باید استفاده کنیم --}}
  <form  class="form-horizontal"  action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
@csrf
{{-- @include('admin.section.errors') --}}


    <div class="form-group">
        <lable for="title" class="control-lablae">عنوان مقاله</lable>
        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{ old('title') }}">
    </div>

    <div class="form-group">
         <lable for="description" class="control-lable">توضیحات کوتاه</lable>
         <textarea  rows="3"  class="form-control" name="description" id="description" placeholder="توضیحات را وارد کنید" >{{ old('description') }}</textarea>
    </div>

      <div class="form-group">
         <lable for="body" class="control-lable">متن مقاله </lable>
         <textarea rows="5" class="form-control" name="body" id="body"  placeholder="متن مقاله وارد کنید"  value="{{ old('body')}}"></textarea>
    </div>


 <div class="row form-group">
       <div class="col-sm-6">
             <lable for="images" class="control-lable">تصویر مقاله</lable>
            <input  type="file" class="form-control" name="images" id="images" placeholder="تصویر  مقاله را وارد کنید"  value="{{ old('images')}}">
       </div>

       <div class="col-sm-6">
             <lable for="tags" class="control-lable">تگ ها</lable>
            <input  type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها مقاله را وارد کنید"  value="{{ old('tags') }}">
       </div>
    </div>
  </div>


    <div class="from-group">
        <div class="col-sm-12">
              <button class="btn btn-primary">ارسال مقاله جدید</button>
        </div>
    </div>

</form>








    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
