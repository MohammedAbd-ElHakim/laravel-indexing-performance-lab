@extends('layouts.app')
@section('title','تحديث مقال ')
@section('heading','تحديث مقال ')

@section('content')
<form  action="{{ route('post.update',$post->id) }}" method="post" class="max-w-sm mx-auto">
  {{-- @method('PATCH') --}}
  @method('PUT')
  @csrf
  <div class="mb-5">
    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان المقاله</label>
    <input type="text" name="title" value="{{ $post->title }}" id="text" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="عنوان المقاله" required />
  </div>
  <div class="mb-5">
    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">محتوي المقاله</label>
    <textarea name='body' id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $post->title }}</textarea>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تحديث المقاله</button>
</form>
@endsection

