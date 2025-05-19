@extends('document.pdf_layout')

@section('content')

 <!-- Semester Title -->
 <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;border:none">
        <tr style="border:none">
            <td colspan="10" style="font-family: 'Times New Roman', serif; font-size: 14pt; text-align: center; font-weight: bold; line-height: 1.5;border:none">
                Semester – {{$sem_count}}
            </td>
        </tr>
    </table>
    <!-- Course Table -->
<table style="width: 100%; border: 1px solid black; border-collapse: collapse; text-align: center; font-family: 'Times New Roman', serif; font-size: 12pt;">
    <thead>
        <tr style="font-weight: bold;">
            <th style="border: 1px solid black; padding: 8px;">Course Code</th>
            <th style="border: 1px solid black; padding: 8px;">Course Name</th>
            <th style="border: 1px solid black; padding: 8px;">Category</th>
            <th style="border: 1px solid black; padding: 8px;">Hours / Week</th>
            <th style="border: 1px solid black; padding: 8px;">Credits</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; padding: 8px;text-transform:uppercase;">
               {{$course_code}}
            </td>
            <td style="border: 1px solid black; padding: 8px;text-transform:capitalize;">
                {{$course_name}}
            </td>
            <td style="border: 1px solid black; padding: 8px;">
                {{$category}}
            </td>
            <td style="border: 1px solid black; padding: 8px;">
                {{$hrs}}
            </td>
            <td style="border: 1px solid black; padding: 8px;">
                {{$credits}}
            </td>
        </tr>
    </tbody>
</table>
<br>

<!-- Course Objectives -->
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; font-weight: bold; color: #0072BC; margin-top: 20px; margin-bottom: 5px;">
    Course Objectives
</p>
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; margin: 0; line-height: 1;">
    The course intends to cover:
</p>
<ul style="font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 5px; line-height: 1;">
    @foreach(explode("\n", $course_objectives) as $objective)
            @if(trim($objective) != '')
                <li>{{ trim($objective) }}</li>
            @endif
    @endforeach
</ul>

<!-- Course Learning Outcomes -->
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; font-weight: bold; color: #0072BC; margin-top: 20px; margin-bottom: 5px;">
    Course Learning Outcomes
</p>
<p style="font-family: 'Times New Roman', serif; font-size: 12pt; margin: 0; line-height: 1;">
    On the successful completion of the course, students will be able to:
</p>

<!-- CLO Table -->
<table style="width: 100%; border: 1px solid black; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 10px;">
    <thead>
        <tr style="font-weight: bold; text-align: center;">
            <th style="border: 1px solid black; padding: 8px;">CLO</th>
            <th style="border: 1px solid black; padding: 8px;">CLO Statements</th>
            <th style="border: 1px solid black; padding: 8px;">Knowledge Level</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO1</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
               {{$clo1}}       
        </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k1}}  
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO2</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo2}}  
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k2}}    
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO3</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo3}}           
        </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k3}}   
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO4</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo4}}   
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k4}}  
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">CLO5</td>
            <td style="border: 1px solid black; text-align: justify; padding: 8px;">
            {{$clo5}}    
            </td>
            <td style="border: 1px solid black; text-align: center; padding: 8px;">
            {{$k5}}  
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center; padding: 8px;" colspan="3">
            <span style="font-weight: bold;">K1</span> - Remember; 
            <span style="font-weight: bold;">K2</span> - Understand; 
            <span style="font-weight: bold;">K3</span> - Apply;
            <span style="font-weight: bold;">K4</span> - Analyze;
            <span style="font-weight: bold;">K5</span> - Evalute;
            <span style="font-weight: bold;">K6</span> - Create
            </td>
        </tr>
        </tbody>
    </table>

   <br>
   
<table style="width: 100%; border-collapse: collapse; font-family: 'Times New Roman', serif; font-size: 12pt; text-align: center;">
  <thead>
    <tr>
      <th style="border: 1px solid black; font-weight: bold;">CLOs/PLOs</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO1</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO2</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO3</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO4</th>
      <th style="border: 1px solid black; font-weight: bold;">PLO5</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid black;">CLO1</td>
      <td style="border: 1px solid black;">
       {{$clo01}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo02}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo03}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo04}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo05}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO2</td>
      <td style="border: 1px solid black;">
       {{$clo11}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo12}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo13}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo14}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo15}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO3</td>
      <td style="border: 1px solid black;">
       {{$clo21}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo22}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo23}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo24}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo25}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO4</td>
      <td style="border: 1px solid black;">
       {{$clo31}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo32}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo33}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo34}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo35}}
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black;">CLO5</td>
      <td style="border: 1px solid black;">
       {{$clo41}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo42}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo43}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo44}}
      </td>
      <td style="border: 1px solid black;">
      {{$clo45}}
      </td>
    </tr>
    <tr>
        <td style="font-family: 'Times New Roman', serif; font-size: 12pt; margin-top: 5px;border: 1px solid black;" colspan="6">
        <b>3</b> - Substantial (high) &nbsp;&nbsp; <b>2</b> - Moderate (medium) &nbsp;&nbsp; <b>1</b> - Slight (low)

        </td>
    </tr>
  </tbody>
</table>
<br>
<br>
<br>
<br>
<br>

<div>

    <h2 style="text-align: center; color: #0066cc;text-transform:capitalize;">
       {{$core_title}}
    </h2>

    {!! $tableHtml !!}
</div>
<br>
<div>
    {!! $tableDataRef !!}

</div>





   
@endsection