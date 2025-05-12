@extends('document.pdf_layout')

@section('content')

<p style="text-align: center; line-height: 1.5; font-family: 'Times New Roman', Times, serif;">
  <span style="font-size: 14pt; font-weight: bold; color: blue;">
   {{$department}}
  </span><br>
  <span style="font-size: 14pt; font-weight: bold; color: blue;">Curriculum</span><br>
</p>

<div>

  @if($sem_table_html)
      {!! $sem_table_html !!}
  @endif
</div>


<style>
   .button{
        display: none !important;
    }
</style>

@endsection