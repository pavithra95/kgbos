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
        <!-- <div class="header-center">2<sup>nd</sup> Board of Studies</div> -->
        <div class="header-right">{{$batch}}</div>
    </div>

    <hr>


    <div class="logo-row">
        <img src="{{ asset('images/kglogo.jpeg') }}" class="logo">
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

    <br>
    <dl>
        <dt class="section-title">Eligibility</dt>
        <dd class="justified-content"> {{$eligibility}}</dd>
    </dl>
    <br>
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

<p style="font-family: 'Times New Roman'; font-size: 14pt; font-weight: bold; text-align: center; line-height: 1.5; color: blue;">
    {{$prgm_department}}
</p>
<p style="font-family: 'Times New Roman'; font-size: 14pt; font-weight: bold; text-align: center; line-height: 1.5; color: blue;">
    Distribution of Credits and Hours for all the Semesters
</p>


@if($merged_table_html)
    {!! $merged_table_html !!}
@endif

<br>

<h2 style="text-align: center; font-size: 14pt; font-weight: bold; line-height: 1.5; color: blue;">
    Consolidated Semester wise and<br>Component wise Hours and Credits Distribution
</h2>

@if($consolidate_table_html)
    {!! $consolidate_table_html !!}
@endif


    <form action="{{ route('download.pdf') }}" method="POST">
        @csrf
       
        <input type="hidden" name="graduate" value="{{ $graduate }}">
        <input type="hidden" name="batch" value="{{ $batch }}">
        <input type="hidden" name="department" value="{{ $department }}">
        <input type="hidden" name="programme_code" value="{{ $programme_code }}">
        <input type="hidden" name="eligibility" value="{{ $eligibility }}">
        <input type="hidden" name="prgm_department" value="{{ $prgm_department }}">
        <input type="hidden" name="plo1" value="{{ $plo1 }}">
        <input type="hidden" name="plo2" value="{{ $plo2 }}">
        <input type="hidden" name="plo3" value="{{ $plo3 }}">
        <input type="hidden" name="plo4" value="{{ $plo4 }}">
        <input type="hidden" name="plo5" value="{{ $plo5 }}">
        <input type="hidden" name="footer_department" value="{{ $footer_department }}">
        <input type="hidden" name="merged_table_html" value="{{ $merged_table_html }}">
        <input type="hidden" name="consolidate_table_html" value="{{ $consolidate_table_html }}">
        <button type="submit">Download PDF</button>
    </form>



</body>

</html>