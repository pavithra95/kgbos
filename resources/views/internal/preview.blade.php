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

    <h3 style="text-align: center; margin-bottom: 20px;">
    Components for Internal Assessment and Distribution of Marks for CIA and ESE (Theory)
</h3>

   {!! $theoryTable !!}

<br>
<h3 style="text-align: center; margin-bottom: 20px;">
Question Paper Pattern
</h3>

{!! $QuestionTable !!}
<br>
 <h3 style="text-align: center; margin-bottom: 20px;">
 Components for Internal Assessment and Distribution of Marks for CIA and ESE (Lab)
</h3>

{!! $internal_table !!}
<br>
<h3 style="text-align: center; margin-bottom: 20px;">
Examination Pattern
</h3>

{!! $exam_table !!}
 

<br>
<h3 style="text-align: center; margin-bottom: 20px;">
 Components for Internal Assessment and Distribution of Marks for CIA (Foundation Course -Theory)
</h3>

{!! $foundation_table !!}
 

<br>
<h3 style="text-align: center; margin-bottom: 20px;">
 Question Paper Pattern
</h3>

{!! $que_table !!}
 

<br>
<h3 style="text-align: center; margin-bottom: 20px;">
 Components for and Distribution of Marks for ESE (Theory) Ability Enhancement Compulsory Courses (AECC)
& Question Paper Pattern
</h3>

{!! $aecc_table !!}
 

<br>

    <form action="{{ route('internaldownload.pdf') }}" method="POST">
        @csrf
        <input type="hidden" name="batch" value="{{ $batch }}">
        <input type="hidden" name="footer_department" value="{{ $footer_department }}">
        <input type="hidden" name="theoryTable" value="{{ $theoryTable }}">
        <input type="hidden" name="QuestionTable" value="{{ $QuestionTable }}">
        <input type="hidden" name="internal_table" value="{{ $internal_table }}">
        <input type="hidden" name="exam_table" value="{{ $exam_table }}">
        <input type="hidden" name="foundation_table" value="{{ $foundation_table }}">
        <input type="hidden" name="que_table" value="{{ $que_table }}">
        <input type="hidden" name="aecc_table" value="{{ $aecc_table }}">
       
    
   
        
        <button type="submit">Download PDF</button>
    </form>



</body>

</html>