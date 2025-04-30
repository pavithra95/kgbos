@extends('document.pdf_layout')

@section('content')

 
<h4 style="text-align: center;margin-top:-10px;">
    Components for Internal Assessment and Distribution of Marks for CIA and ESE (Theory)
</h4>


   {!! $theoryTable !!}


<h4 style="text-align: center; ">
Question Paper Pattern
</h4>

{!! $QuestionTable !!}


<h4 style="text-align: center; ">
 Components for Internal Assessment and Distribution of Marks for CIA and ESE (Lab)
</h4>

{!! $internal_table !!}


<h4 style="text-align: center;">
Examination Pattern
</h4>

{!! $exam_table !!}
@endsection