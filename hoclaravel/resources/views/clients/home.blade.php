@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('sidebar')
@parent
<h3>Home Sidebar</h3>
@endsection


@section('content')
   @if (session('msg'))
   <div class="alert alert-{{session('type')}}">
      {{session('msg')}}
   </div>
   @endif
   <h1>Trang chủ</h1>
  
   @include('clients.contents.slide');
   @include('clients.contents.about');
   
   @env('production')
   <p>Môi trường production</p>
   @elseenv('test')
   <p>Môi trường test</p>
   @else
   <p>Môi trường dev</p>

   @endenv

  

   <x-alert type="info" :content="$message" data-icon="youtube" />

   {{-- <x-inputs.button />

   <x-forms.button /> --}}
   <p><img src="https://d1hjkbq40fs2x4.cloudfront.net/2017-08-21/files/landscape-photography_1645.jpg" alt=""></p>

   <p><a href="{{route ( 'download-image','?image='. public_path ('storange/Hinh-nen-Totoro-de-thuong.jpg')}}" class="btn btn-primary"> Download ảnh</a></p>

   <p><a href="{{route('download-doc').'?file='.public_path('storage/demo-pdf.pdf')}}" class="btn btn-primary">Dowload tài liệu</a></p>


@endsection

@section('css')
<style>
img{
   max-width: 100%;
   height:auto;
}
</style>
   
@endsection

@section('js')

@endsection


