@extends('layouts.app')
@section('title','انشاء مقال جديد')
@section('heading','انشاء مقال جديد')

@section('content')

<form  action='{{ route('post.store') }}' class="max-w-sm mx-auto" method="post">
  @csrf
  <div class="mb-5">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('title') is-invalid @enderror">عنوان المقاله</label>
    <input type="text" id="text title" name='title' value="{{ old('title') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 
    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" 
    placeholder="عنوان المقاله" />
    @error('title')
    <div class="p-1 mb-4 text-sm text-red-800 rounded-lg bg-red-0 dark:bg-gray-800 dark:text-red-400" role="alert">
      {{ $message }}
    </div>
@enderror
 </div>
 
  <div class="mb-5">
    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">محتوي المقاله</label>
    <textarea id="message body" rows="4" name='body'  class="@error('body') is-invalid @enderror block p-2.5 w-full 
    text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 
    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
    placeholder="Write your thoughts here...">{{ old('body') }}</textarea>
  @error('body')
    <div class="p-2 mb-1 text-sm text-red-800 rounded-lg bg-red-0 dark:bg-gray-800 dark:text-red-400" role="alert">
      {{ $message }}
    </div>
@enderror
  </div>
  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">نشر المقاله</button>
</form>
@endsection

