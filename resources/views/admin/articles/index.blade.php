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

    @include('admin.sectionstarter.errors')

<style>

@media screen and (max-width: 1400px) {
    table > tbody .asli{
        width: 400px;
        /* max-height: 100cm; */
        color:black;
        display: inline-block;
        font-weight: 400;
        /* white-space: nowrap;
        overflow:hidden;
        text-overflow: ellipsis; */
    }
}

</style>
<div class="table-responsive" >
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead class="thead-dark">
            <tr>
                <th>نام</th>
                <th>تایتل مقاله</th>
                <th>عکس مقاله</th>
                <th>توضیحات </th>
                <th>متن مقاله</th>
                <th>تگ </th>
                <th>اسلاگ </th>
                <th>نظرات</th>
                <th>نمایش</th>
                <th>ویرایش </th>
                <th> حذف مقالات</th>

            </tr>
        </thead>
        <tbody style="font-size: 15px;text-align: justify; text-justify: inter-word;">
                @foreach ($articles as $article)
       <tr>
            <td>{{ $article->id }}</td>
            <td><a href="{{ $article->path() }}"> {{ $article->title }} </a></td>
            <td><a href="#"><img src="{{ $article->images['thumb'] }}" width="100px"></a></td>
            <td>{!!  Str::limit($article->description, 20) !!}</td>
            {{-- <td style="background-color:blueviolet;  white-space: nowrap !important;  overflow: hidden !important;  "> --}}
             <td class="asli">
                {{ str::limit($article->body,200) }}
            </td>
            <td>{{ $article->tags }}</td>
            <td>{{ $article->slug }}</td>
            <td>{{ $article->CommentCount }}</td>
            <td>{{ $article->viewCount }}</td>
            <td>
                <button type="submit" class="btn btn-primary ">
                    <a class="text-white" href="{{ route('articles.edit', $article->id) }}">ویرایش مقاله</a>
                </button>
            </td>
            <td>
                <form action="{{ route('articles.destroy' , $article->id ) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="btn-group btn-group-xs">
                                <button type="submit" class="btn btn-danger text-white">حذف مقاله
                                    {{-- <a class="text-white" href="{{ route('articles.destroy' , $article->id ) }}">حذف مقاله</a> --}}
                                </button>
                        </div>
                </form>


            </td>
                {{--<td class="text-center">
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary mr-3">Show</a>
                    <a href="{{ route('articles.edit', $articles->id) }}" class="btn btn-info text-white ml-3">Edit</a>
                    <form method="POST" action="{{ route('articles.delete', $articles->id) }}">
                        @csrf // or hidden field
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash"> </i></button>
                    </form>
                </td> --}}
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
