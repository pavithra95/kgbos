<!DOCTYPE html>
<html>

<head>
    <title>Document Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 1cm;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1cm;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 12pt;
        }

        .header-left {
            text-align: left;
            width: 33.33%;
        }

        .header-center {
            text-align: center;
            width: 33.33%;
        }

        .header-right {
            text-align: right;
            width: 33.33%;
        }


        .college-info {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
        }

        .title {
            font-size: 16pt;
            text-align: center;
            font-weight: bold;
            color: blue;
        }

        .section {
            font-size: 14pt;
            text-align: center;
            font-weight: bold;
            line-height: 1.0;
        }

        .sub-section {
            font-size: 12pt;
            text-align: center;
            font-weight: bold;
            line-height: 1.0;
        }

        p {
            text-align: justify;
            font-size: 12pt;
        }

        hr {
            border: 1px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .logo-row {
            width: 100%;
            text-align: center;
            margin: 20px 0;
        }

        .logo {
            width: 100%;
            max-height: 120px;
            /* adjust height as needed */
            object-fit: contain;
            /* ensures the image scales proportionally */
        }

        .center-text {
            flex-grow: 1;
            text-align: center;
        }

        .section-title {
            font-weight: bold;
        }

        .justified-content {
            text-align: justify;
            margin-left: 2em;
            margin-top: 0.5em;
            /* text-indent: 2em; */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            vertical-align: middle;
            /* font-weight: bold; */
            /* Vertically center the text */
        }
        .tdhead{
            /* font-weight: bold; */
            text-align: center;
        }

        .justified {
            text-align: justify;
            line-height: 1.0;
            /* Single line spacing */
        }

        .section-title {
            font-weight: bold;
        }

        .table-caption {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            margin-bottom: 10px;
        }
        footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            height: 30px;
            text-align: left;
            font-size: 10pt;
            border-top: 1px solid #000;
            font-weight: bold;
        }
        /* .delete-row {
            visibility: hidden !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: none !important;
        } */

        /* Ensures the cell remains visible */
        /* button:has(.delete-row) {
            border: 1px solid black !important;
        } */
         .delete{
            border:none;
         }
    </style>
</head>

<body>

    <div class="header-row">
        <div class="header-left">KG College of Arts and Science (Autonomous)</div>
        <div class="header-right">{{$batch}}</div>
    </div>

    <hr>

    
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


<div>
   
    {!! $tableHtml !!}
</div>
<br>
<div>
    {!! $tableDataRef !!}

</div>


    



   

 

<br>

    <form action="{{ route('labdownload.pdf') }}" method="POST">
        @csrf
        <input type="hidden" name="batch" value="{{ $batch }}">
        <input type="hidden" name="footer_department" value="{{ $footer_department }}">
        <input type="hidden" name="course_code" value="{{ $course_code }}">
        <input type="hidden" name="course_name" value="{{ $course_name }}">
        <input type="hidden" name="category" value="{{ $category }}">
        <input type="hidden" name="hrs" value="{{ $hrs }}">
        <input type="hidden" name="credits" value="{{ $credits }}">
        <input type="hidden" name="tableData" value="{{ $tableHtml }}">
        <input type="hidden" name="tableDataRef" value="{{ $tableDataRef }}">
       

    
   
        
        <button type="submit">Download PDF</button>
    </form>



</body>

</html>