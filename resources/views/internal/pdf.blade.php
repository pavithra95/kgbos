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

<h4 style="text-align: center;">
 Components for Internal Assessment and Distribution of Marks for CIA (Foundation Course -Theory)
</h4>

{!! $foundation_table !!}
 

<h4 style="text-align: center;">
 Question Paper Pattern
</h4>

{!! $que_table !!}

<h3 style="text-align: center;">
 Components for and Distribution of Marks for ESE (Theory) Ability Enhancement Compulsory Courses (AECC)
& Question Paper Pattern
</h3>

{!! $aecc_table !!}
 

 

@endsection