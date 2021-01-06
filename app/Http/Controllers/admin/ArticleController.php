<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends AdminController //ادیمن کنترلر بجای کنترلر اصلی و خود ادیمن کنترلر از کنترلر اصلی اکستند میشه
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //فقط صفحه کریت رو باز میکنه
        //در صفحه کریت
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //      return $request->all();
    // }
       public function store(ArticleRequest  $request)
    {
        //برایه ذخیره مقاله باید یوزر ثبت نام و ورود کرده باشه تا بتونیم
        //یوزر_ایدیش رو برایه جدول ارتیکل ذخیره کنیم که بصورت زیر میتونیم یک یوزر درست کنیم
        // return user::create([
        //         'level' =>'admin',
        //         'name' =>'ali',
        //         'email' =>'ali@yahoo.com',
        //         'password' => bcrypt('123456'),
        // ]);
        //  return $request->all();
         auth()->loginUsingId(1);
         $imagesUrl = $this->UploadImages($request->file('images'));           //آدرس عکس هایه آپلود شده رو میگیریم
         //چون چند عکس داریم باید بصورت آرایه آدرس عکس ها رو دریافت کنیم

         auth()->user()->article()->create(array_merge($request->all() , ['images' => $imagesUrl] ));
        //  return redirect(route('articles.index'));
        // return redirect()->route('articles.index')
        //         ->with('success', 'Successfully added a user account');
        // return redirect()->route('articles.index')->with('message', 'مقاله بدرستی آپلود شد');
        return redirect()->route('articles.index')->with('success', 'مقاله بدرستی آپلود شد');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Article $article)
    public function update(ArticleRequest $request,Article $article)

    {
    //  return $request->all();
    // شرط میزاریم میگیم اگه فایلی به اسم ایمچ وجود داشت عملیات ایمچی که در کنترلر ایمچ ساختیم برایه کریت رو دوباره انجام بده
    $file = $request->file('images');
    //برایه راحتی میگیم همه اطلاعات رو بگیر
    $inputs = $request->all();
    if($file){
 //میگیم از اینپوتز که شامل همه دادهای از نوشتاری تا عکس هستش بیا ایمچش رو بگیر
        $inputs['images'] = $this->uploadimages($request->file('images'));
    }else{      //اگه ایمچ وجود نداشت
        $inputs['images'] = $article->images;  //میگیم اینپون ایمچی که خاله رو برابر با اطلاعات ایمچ دیتابیس قرار  بده
//تصوییر شاخص باید از ابتدا مشخص بشه چون ما یا عکس جدید داریم یا از عکسهای قدیمی برایه باز نویسی دوباره رویه دیتابیس استفاده کردیم
//ایمچ تامپ همون اطلاهات فرم ایمچ در صفغحه ادیت هستش که میگیم مساوی با تصویر شاخص قرار بده
       $inputs['images']['thumb'] = $inputs['imagesThumb'];
        }
         unset($inputs['imagesThumb']);    //برایه پاک کردن داده  ایمچ از دیتابیس
         foreach ($article->images['images'] as $key=>$image){ #برایه پاک کردن عکس از پوشه

            //     echo "<img src='{$image}' height='100' width='200' />";
            //     unlink(public_path() . $image );
             if (file_exists(public_path() . $image)) {
                 unlink(public_path() . $image);
   }
          }
               //تمام اینپوتهایه بالا رو به ارتیکل میدیم برایه آپدیت
            $article->update($inputs);
             return redirect()->back();
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        if ($article->images){
        foreach ($article->images['images'] as $key=>$image){

          //     echo "<img src='{$image}' height='100' width='200' />";
          //     unlink(public_path() . $image );
           if (file_exists(public_path() . $image)) {
               unlink(public_path() . $image);
                            }
                                                            }
    }
    // return Redirect::back()->withErrors(['success', 'The Message']);
    return Redirect::back()->withErrors(['مقاله بدرستی پاک شد']);
}
}
