@extends('layouts.app')

@section('content')
<div class="container">
<div class="d-flex justify-content-end">
    <form action="logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
    <h3 class="mb-4">Uploaded Employee Documents</h3>
   


    <div class="row">
        @forelse($items as  $index =>$document)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        {{-- PDF preview or icon --}}
                        <embed src="{{ asset('storage/' . $document->file_name) }}" type="application/pdf" width="100%" height="200px" />

                        <hr>
                        <p><strong>Employee ID:</strong> {{ $document->emp_id }}</p>
                        <p><strong>Name:</strong> {{ $document->emp_name }}</p>
                        <p><strong>Department:</strong> {{ $document->depart->name }}</p>

                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal{{ $index }}">
                            View Document
                        </button>

                        <a href="{{ asset('storage/' . $document->file_name) }}" class="btn btn-success ms-2"  download="{{ $document->depart->name }}.pdf" download>
                            Download
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="pdfModal{{ $index }}" tabindex="-1" aria-labelledby="pdfModalLabel{{ $index }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel{{ $index }}">Document for {{ $document->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>

            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/' . $document->file_name) }}" type="application/pdf" width="100%" height="600px" />
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('documents.reject', $document->id) }}" class="d-inline">
                    @csrf
                    <input type="text" name="reason" placeholder="Reason for rejection" required class="form-control d-inline-block w-50" />
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>

                <form method="POST" action="{{ route('documents.approve', $document->id) }}" enctype="multipart/form-data" class="d-inline">
                    @csrf
                    <!-- <input type="file" name="esign" accept="image/*" required class="form-control d-inline-block w-50" /> -->
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>

        @empty
            <div class="col-12">
                <p class="text-muted">No documents uploaded yet.</p>
            </div>

           
        @endforelse
    </div>
</div>
@endsection
