<h1>Hi, {{ $name }}</h1> X
<br>
{{-- <p>{{$abstrak}}</p> --}}

<br>
<br>
 {{-- <p>Untuk mengunduh publikasi tersebut silakan klik tautan berikut:</p>
<a href="{{$link}}">disini</a> --}}
<a href="{{route('konfirmasi', ['id'=>$id])}}">disini</a>