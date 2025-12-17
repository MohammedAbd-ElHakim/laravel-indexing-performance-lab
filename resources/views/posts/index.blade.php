@extends('layouts.app')
@section('title','انشاء مقال جديد')
{{-- {{ dd($all_posts) }} --}}
@if (isset($success_add))
@section('heading')
   <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">تم اضافه المنشور الجديد بنجاح </span>
</div>
@endsection
@elseif (isset($success_updated))
@section('heading')
   <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">تم تحديث المنشور بنجاح </span>
</div>
@endsection
@elseif (isset($delete))
@section('heading')
   <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">تم حزف المنشور بنجاح </span>
</div>
@endsection
@elseif (isset($destroyAll))
@section('heading')
   <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">تم حزف كل المنشورات بنجاح </span>
</div>
@endsection
@else
@section('heading','الرئيسيه')
@endif
@section('content')
{{-- start table of posts --}}

<form action="{{route('trncat')}}" method="post">
  @method('POST')
  @csrf
  <input type="submit" value="حزف كل المقالات" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 
  focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700
   dark:focus:ring-red-900">
</form>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    العنوان
                </th>
                <th scope="col" class="px-6 py-3">
                    المحتوي
                </th>
                <th scope="col" class="px-6 py-3">
                    الاجراءات
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ( $all_posts as $post )
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $post['id'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $post['title'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $post['body'] }}
                </td>
                <td class="px-6 py-4">                  
<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="{{ route('post.edit',$post['id']) }}">تعديل</a></button>
<form style="display: inline;" action="{{ route('post.destroy',$post['id']) }}" method="post">
  @method('DELETE')
  @csrf
             <input type="submit" value="حزف" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"></button>
</form>
</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>

{{-- end table of posts --}}
@endsection

