<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Verify;
use App\Mail\MergedPdfMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Clegginabox\PDFMerger\PDFMerger;
use Illuminate\Support\Facades\Storage;
use TCPDF;
use Barryvdh\DomPDF\Facade\Pdf;

use setasign\Fpdi\Fpdi;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.form');
    }
    public function home()
    {
        return view('welcome');
    }
    
    public function curriculumIndex()
    {
        $courses = Course::all();
        return view('curriculum.index')->with(compact('courses'));
    }
    public function theoryIndex()
    {
        return view('theory.index');
    }
    public function labIndex()
        {
            return view('lab.index');
        }
    public function internalIndex()
    {
        return view('internal.index');
    }

    

    public function preview(Request $request)
    {
        // dd($request->all());
       
        $graduate = $request->graduate;
        $batch = $request->batch;
        $department = $request->department;
        $programme_code = $request->programme_code;
        $eligibility = $request->eligibility;
        $prgm_department = $request->prgm_department;
        $plo1 = $request->plo1;
        $plo2 = $request->plo2;
        $plo3 = $request->plo3;
        $plo4 = $request->plo4;
        $plo5 = $request->plo5;
        $part = $request->part;
        $course_category = $request->course_category;
        $no_of_course = $request->no_of_course;
        $hours = $request->hours;
        $credits = $request->credits;
        $total_credits = $request->total_credits;
        $sem = $request->sem;
        $footer_department = $request->footer_department;
        $merged_table_html  = $request->input('merged_table_html');
        $consolidate_table_html  = $request->input('consolidate_table_html');
        return view('document.preview', compact('batch','programme_code','department','eligibility',
        'prgm_department','plo1','plo2','plo3','plo4','plo5','footer_department','graduate','merged_table_html',
        'part','no_of_course','course_category','hours','credits','total_credits','sem','consolidate_table_html'
    ));
    }

    public function downloadPDF(Request $request)
    {
        // dd($request->all());
       
        $graduate = $request->graduate;
        $batch = $request->batch;
        $department = $request->department;
        $programme_code = $request->programme_code;
        $eligibility = $request->eligibility;
        $prgm_department = $request->prgm_department;
        $plo1 = $request->plo1;
        $plo2 = $request->plo2;
        $plo3 = $request->plo3;
        $plo4 = $request->plo4;
        $plo5 = $request->plo5;
        $footer_department = $request->footer_department;
        $merged_table_html  = $request->merged_table_html;
        $consolidate_table_html  = $request->consolidate_table_html;
        $pdf = Pdf::loadView('document.pdf', compact('batch','programme_code','department','eligibility',
        'prgm_department','plo1','plo2','plo3','plo4','plo5','footer_department','graduate','merged_table_html',
    'consolidate_table_html'));
        return $pdf->download('document.pdf');
    }


    public function curriculumPreview(Request $request)
    {
        // dd($request->all());
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $department = $request->department;
        $semester = $request->semester;
        $department = $request->department;
        $sem_count = $request->sem_count;
        $sem_table_html = $request->sem_table_html;
        $footer_department = $request->footer_department;


        return view('curriculum.preview')->with(compact('batch','footer_department','department',
        'semester','sem_count','sem_table_html','footer_department'
    ));

    }  
    public function curriculumDownloadPDF(Request $request)
    {
        // dd($request->all());
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $department = $request->department;
        $semester = $request->semester;
        $department = $request->department;
        $sem_count = $request->sem_count;
        $footer_department = $request->footer_department;
        $sem_table_html = $request->sem_table_html;
        

        $pdf = Pdf::loadView('curriculum.pdf', compact('batch','footer_department','department',
        'semester','sem_count','sem_table_html','footer_department'
    ));
        return $pdf->download('curriculum.pdf');

  

    } 
    public function theoryPreview(Request $request)
    {

        // dd($request->all());
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $course_code = $request->course_code;
        $course_name = $request->course_name;
        $category = $request->category;
        $hrs = $request->hrs;
        $credits = $request->credits;
        $sem_count = $request->sem_count;
        $clo1 = $request->clo1;
        $clo2 = $request->clo2;
        $clo3 = $request->clo3;
        $clo4 = $request->clo4;
        $clo5 = $request->clo5;
        $k1 = $request->k1;
        $k2 = $request->k2;
        $k3 = $request->k3;
        $k4 = $request->k4;
        $k5 = $request->k5;
        $course_objectives = $request->course_objectives;
        $clo01 = $request->clo01;
        $clo02 = $request->clo02;
        $clo03 = $request->clo03;
        $clo04 = $request->clo04;
        $clo05 = $request->clo05; 
        $clo11 = $request->clo11;
        $clo12 = $request->clo12;
        $clo13 = $request->clo13;
        $clo14 = $request->clo14;
        $clo15 = $request->clo15;
        $clo21 = $request->clo21;
        $clo22 = $request->clo22;
        $clo23 = $request->clo23;
        $clo24 = $request->clo24;
        $clo25 = $request->clo25;
        $clo31 = $request->clo31;
        $clo32 = $request->clo32;
        $clo33 = $request->clo33;
        $clo34 = $request->clo34;
        $clo35 = $request->clo35;
        $clo41 = $request->clo41;
        $clo42 = $request->clo42;
        $clo43 = $request->clo43;
        $clo44 = $request->clo44;
        $clo45 = $request->clo45;
        $tableHtml = $request->tableData;
        $core_title = $request->core_title;
        $tableDataRef = $request->tableDataRef;
        


        return view('theory.preview')->with(compact('batch','footer_department','sem_count',
        'course_code','course_name','category','hrs','credits','clo1','clo2','clo3','clo4','clo5',
        'k1','k2','k3','k4','k5','course_objectives','clo01','clo02','clo03','clo04','clo05',
        'clo11','clo12','clo13','clo14','clo15','clo21','clo22','clo23','clo24','clo25',
        'clo31','clo32','clo33','clo34','clo35','clo41','clo42','clo43','clo44','clo45','tableHtml','core_title',
        'tableDataRef'
    ));

    }

    public function theoryDownloadPDF(Request $request)
    {
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $course_code = $request->course_code;
        $course_name = $request->course_name;
        $category = $request->category;
        $hrs = $request->hrs;
        $credits = $request->credits;
        $sem_count = $request->sem_count;
        $clo1 = $request->clo1;
        $clo2 = $request->clo2;
        $clo3 = $request->clo3;
        $clo4 = $request->clo4;
        $clo5 = $request->clo5;
        $k1 = $request->k1;
        $k2 = $request->k2;
        $k3 = $request->k3;
        $k4 = $request->k4;
        $k5 = $request->k5;
        $clo01 = $request->clo01;
        $clo02 = $request->clo02;
        $clo03 = $request->clo03;
        $clo04 = $request->clo04;
        $clo05 = $request->clo05; 
        $clo11 = $request->clo11;
        $clo12 = $request->clo12;
        $clo13 = $request->clo13;
        $clo14 = $request->clo14;
        $clo15 = $request->clo15;
        $clo21 = $request->clo21;
        $clo22 = $request->clo22;
        $clo23 = $request->clo23;
        $clo24 = $request->clo24;
        $clo25 = $request->clo25;
        $clo31 = $request->clo31;
        $clo32 = $request->clo32;
        $clo33 = $request->clo33;
        $clo34 = $request->clo34;
        $clo35 = $request->clo35;
        $clo41 = $request->clo41;
        $clo42 = $request->clo42;
        $clo43 = $request->clo43;
        $clo44 = $request->clo44;
        $clo45 = $request->clo45;
        $course_objectives = $request->course_objectives;
        $tableHtml = $request->tableData;
        $core_title = $request->core_title;
        $tableDataRef = $request->tableDataRef;
       
        $pdf = Pdf::loadView('theory.pdf', compact('batch','footer_department','sem_count',
        'course_code','course_name','category','hrs','credits','clo1','clo2','clo3','clo4','clo5',
        'k1','k2','k3','k4','k5','clo01','clo02','clo03','clo04','clo05',
        'clo11','clo12','clo13','clo14','clo15','clo21','clo22','clo23','clo24','clo25',
        'clo31','clo32','clo33','clo34','clo35','clo41','clo42','clo43','clo44','clo45','course_objectives',
        'tableHtml','core_title','tableDataRef'
    ));
        return $pdf->download('theory.pdf');
    }

    public function labPreview(Request $request){
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $course_code = $request->course_code;
        $course_name = $request->course_name;
        $category = $request->category;
        $hrs = $request->hrs;
        $credits = $request->credits;
        $tableHtml = $request->tableData;
        $tableDataRef = $request->tableDataRef;

        return view('lab.preview')->with(compact('batch','footer_department', 'course_code','course_name','category','hrs','credits',
        'tableHtml','tableDataRef'
    ));
}

public function labDownloadPDF(Request $request)
    {
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $course_code = $request->course_code;
        $course_name = $request->course_name;
        $category = $request->category;
        $hrs = $request->hrs;
        $credits = $request->credits;
        $tableHtml = $request->tableData;
        $tableDataRef = $request->tableDataRef;
       
       
        $pdf = Pdf::loadView('lab.pdf', compact('batch','footer_department',
        'course_code','course_name','category','hrs','credits','tableHtml','tableDataRef'
    ));
        return $pdf->download('lab.pdf');
    }

    public function internalPreview(Request $request)
    {
        // dd($request->all());
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $theoryTable = $request->theoryTable;
        $QuestionTable = $request->QuestionTable;
        $internal_table = $request->internal_table;
        $exam_table = $request->exam_table;
        $foundation_table = $request->foundation_table;
        $que_table = $request->que_table;
        $aecc_table = $request->aecc_table;

         return view('internal.preview')->with(compact('batch','footer_department','theoryTable','QuestionTable',
         'internal_table','exam_table','foundation_table','que_table','aecc_table'
    ));

    }

    public function internalDownloadPDF(Request $request)
    {
        $batch = $request->batch;
        $footer_department = $request->footer_department;
        $theoryTable = $request->theoryTable;
        $QuestionTable = $request->QuestionTable;
        $internal_table = $request->internal_table;
        $exam_table = $request->exam_table;
        $foundation_table = $request->foundation_table;
        $que_table = $request->que_table;
        $aecc_table = $request->aecc_table;

        $pdf = Pdf::loadView('internal.pdf', compact('batch','footer_department','theoryTable','QuestionTable',
        'internal_table','exam_table','foundation_table','que_table','aecc_table'
        
    ));
        return $pdf->download('internal.pdf');

    }
    public function merge(){
        return view('merge.index');
    }

   

  
public function approve($id)
{
    // 1. Get document from DB
    $document = Verify::findOrFail($id);
    $user = Auth::user();
    if ($user->role == 'hod') {
        $document->status = 'verified_by_hod';
        $status = 'Verified by HOD';
        $mailMessage = 'Your document has been verified by the Head of Department (HOD).';
    } else {
        if ($user->role == 'dean'){
            $document->status = 'verified_by_dean';
            $status = 'Verified by Dean';
            $mailMessage = 'Your document has been verified by the Dean.';
        }
        else{
            $document->status = 'verified_by_dean';
            $status = 'Verified by CDC';
            $mailMessage = 'Your document has been fully approved.';
        }
    }
    $document->save();

    $mergedPdfPath = public_path('storage/' . $document->file_name); // adjust the path as needed
    if (file_exists($mergedPdfPath)) {
        if ($user->role == 'hod'){
        Mail::to($document->emp_email)->send(new MergedPdfMail($document, $status, $mailMessage,$mergedPdfPath,$user));
        }else {
            if ($user->role == 'dean'){
                Mail::to($document->emp_email)
                ->cc($document->hod->email)
                ->send(new MergedPdfMail($document, $status, $mailMessage,$mergedPdfPath,$user));
       
            }
            else{
                Mail::to($document->emp_email)
                ->cc([$document->hod->email, $document->dean->email])
                ->send(new MergedPdfMail($document, $status, $mailMessage,$mergedPdfPath,$user));
            }
    }
}

    return redirect()->back();
   
}

 
public function reject($id,Request $request)
{
    // 1. Get document from DB
    $document = Verify::findOrFail($id);
    $reason = $request->reason;
    $user = Auth::user();
    if ($user->role == 'hod') {
        $document->status = 'rejected_by_hod';
        $status = 'Rejected by HOD';
        $mailMessage = "Your document has been Rejected by the Head of Department (HOD). The Reason is: $reason";

    } else {
        if ($user->role == 'dean'){
            $document->status = 'rejected_by_dean';
            $status = 'Rejected by Dean';
            $mailMessage = "Your document has been Rejected by the Dean.The Reason is: $reason";
        }
        else{
            $document->status = 'rejected_by_cdc';
            $status = 'Rejected by CDC';
            $mailMessage = "Your document has been Rejected.The Reason is: $reason";
        }
    }
    $document->save();

    $mergedPdfPath = public_path('storage/' . $document->file_name); // adjust the path as needed
    if (file_exists($mergedPdfPath)) {
        if ($user->role == 'hod'){
        Mail::to($document->emp_email)->send(new MergedPdfMail($document, $status, $mailMessage,$mergedPdfPath,$user));
        }else {
            if ($user->role == 'dean'){
                Mail::to($document->emp_email)
                ->cc($document->hod->email)
                ->send(new MergedPdfMail($document, $status, $mailMessage,$mergedPdfPath,$user));
       
            }
            else{
                Mail::to($document->emp_email)
                ->cc([$document->hod->email, $document->dean->email])
                ->send(new MergedPdfMail($document, $status, $mailMessage,$mergedPdfPath,$user));
            }
    }
}

    return redirect()->back();
   
}
}
