@extends('layouts.client')
@section('title')
{{$title}}
@endsection

{{-- @section('sidebar')
@parent
<h3>Products Sidebar</h3>
@endsection --}}

@section('content')
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>SẢN PHẨM</h1>
    @push('scripts')
        <script>
            console.log('Push lần 2');
        </script>

    @endpush
@endsection

@section('css')
   
@endsection

@section('js')

@endsection

@prepend('scripts')
<script>
    console.log('Push lần 1');
</script>

@endprepend


