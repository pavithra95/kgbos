@extends('document.pdf_layout')

@section('content')

 
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
    <br>

<div>
   
    {!! $tableHtml !!}
</div>
<br>
<div>
    {!! $tableDataRef !!}

</div>



   
@endsection