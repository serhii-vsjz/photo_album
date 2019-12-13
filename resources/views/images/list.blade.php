@extends('layouts.app')
@section('content')

    <ul>
        @foreach($images as $image)

            <img style="height: 450px" src="{{ Storage::disk('local')->url($image->file_name) }}" >
           {{-- <img style="height: 500px" src="{{ asset('storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $image->category_id . DIRECTORY_SEPARATOR . $image->file_name) }}" />--}}
        @endforeach
    </ul>
@endsection