@extends('document.pdf_layout')

@section('content')


    <div class="logo-row">
        <img src="{{ public_path('images/kglogo.jpeg') }}" class="logo">

    </div>
    <div class="title">Regulations {{$batch}} for {{$graduate}}graduate Programme</div>
    <br>
    <div class="sub-section">
        Learning Outcomes Based Curriculum Framework (LOCF) model with<br>
        Choice Based Credit System (CBCS)
    </div>
    <br>
    <div class="section">
        Programme: {{$department}}<br>
        Programme Code: {{$programme_code}}
    </div>
    <br>
    <div class="sub-section" style="color: red;">
        (Applicable for the Students admitted during the academic year {{$batch}} onwards)
    </div>

    <dl>
        <dt class="section-title">Eligibility</dt>
        <dd class="justified-content"> {{$eligibility}}</dd>
    </dl>
   
    <p class="section-title">Program Learning Outcomes (PLOs)</p>
    <p class="table-caption">
        The successful completion of {{$prgm_department}} Programme shall enable the students to:
    </p>
    <table>
    <tr>
        <td class="tdhead">PLO1</td>
        <td class="justified">{{$plo1}}</td>
    </tr>
    <tr>
        <td class="tdhead">PLO2</td>
        <td class="justified">{{$plo2}}</td>
    </tr>
    <tr>
        <td class="tdhead">PLO3</td>
        <td class="justified">{{$plo3}}</td>
    </tr>
    <tr>
        <td class="tdhead">PLO4</td>
        <td class="justified">{{$plo4}}</td>
    </tr>
    <tr>
        <td class="tdhead">PLO5</td>
        <td class="justified">{{$plo5}}</td>
    </tr>
</table>

<br>
<br>
<p style="font-family: 'Times New Roman'; font-size: 14pt; font-weight: bold; text-align: center; line-height: 1.5; color: blue;">
    {{$prgm_department}}
</p>
<p style="font-family: 'Times New Roman'; font-size: 14pt; font-weight: bold; text-align: center; line-height: 1.5; color: blue;">
    Distribution of Credits and Hours for all the Semesters
</p>


@if($merged_table_html)
    {!! $merged_table_html !!}
@endif


<h2 style="text-align: center; font-size: 14pt; font-weight: bold; line-height: 1.5; color: blue;">
    Consolidated Semester wise and<br>Component wise Hours and Credits Distribution
</h2>

@if($consolidate_table_html)
    {!! $consolidate_table_html !!}
@endif

@endsection