@extends('admin.sectionstarter.starter')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت مقالات</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">ادیمن</a></li>
              <li class="breadcrumb-item active">مدیریت مقالات</li>
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

    <button type="button" class="btn btn-primary text-white" style="margin-bottom: 20px;">
        <a class="text-white mt-20" href="{{ route('articles.create') }}">ایجاد مقاله جدید </a>
    </button>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>نام</th>
                <th>تایتل مقاله</th>
                <th>عکس مقاله</th>
                <th>اسلاگ مقاله</th>
                <th>توضیحات مختصر</th>
                <th>متن مقاله</th>
                <th>تگ مقاله</th>
                <th>تعداد کامنت ها</th>
                <th>تعداد بازدید ها</th>
                <th>ویرایش و حذف مقالات</th>

            </tr>
        </thead>
        <tbody>
             @foreach ($articles as $article)

          <tr>
                <td>1</td>
                <td><a href="{{ $article->path() }}"> {{ $article->title }} </a></td>
                <td>{{ $article->images }}</td>
                <td>{{ $article->tags }}</td>
                <td>{!!  Str::limit($article->description, 20) !!}</td>
                <td>{{ str::limit($article->body,40) }}</td>
                <td>{{ $article->tags }}</td>
                <td>{{ $article->CommentCount }}</td>
                <td>{{ $article->viewCount }}</td>

                <td>
                    <form action="{{ route('articles.destroy', $article->id )}}"  method="POST">
                        @method('DELETE')
                        @csrf
               <div class="btn-group btn-group-xs">

                    <button type="submit" class="btn btn-primary ">
                        <a class="text-white" href="{{ route('articles.edit', $article->id) }}">ویرایش مقاله</a>
                    </button>

                    <button type="button" class="btn btn-danger text-white">
                        <a class="text-white" href="{{ route('articles.destroy' , $article->id ) }}">حذف مقاله</a>
                    </button>
                </td>
            </div>
            </form>


          </tr>
            @endforeach
        </tbody>
    </table>










    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
