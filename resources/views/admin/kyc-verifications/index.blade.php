@include('admin.header')

<div class="main-panel">
    <div class="content-wrapper">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="content bg-dark">
            <div class="page-inner">
                <div class="mt-2 mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="title1 text-light">Manage KYC Verifications</h1>
                </div>

                <div class="mb-5 row">
                    <div class="col-12 card shadow p-4 bg-dark">
                        <div class="table-responsive">
                            <table id="KycTable" class="table table-hover text-light">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Document Type</th>
                                        <th>Full Name</th>
                                        <th>DOB</th>
                                        <th>Status</th>
                                        <th>Submitted Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($verifications as $verification)
                                    <tr>
                                        <td>{{ $verification->user->first_name }} {{ $verification->user->last_name }}
                                        </td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $verification->document_type)) }}</td>
                                        <td>{{ $verification->full_name }}</td>
                                        <td>{{ $verification->dob ? $verification->dob->format('M d, Y') : 'N/A' }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($verification->status == 'approved') badge-success
                                                @elseif($verification->status == 'rejected') badge-danger
                                                @else badge-warning
                                                @endif">
                                                {{ ucfirst($verification->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $verification->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info view-btn"
                                                data-id="{{ $verification->id }}"
                                                data-user_id="{{ $verification->user_id }}"
                                                data-document_type="{{ $verification->document_type }}"
                                                data-front_document="{{ $verification->front_document_path }}"
                                                data-back_document="{{ $verification->back_document_path }}"
                                                data-selfie="{{ $verification->selfie_path }}"
                                                data-full_name="{{ $verification->full_name }}"
                                                data-dob="{{ $verification->dob }}"
                                                data-document_number="{{ $verification->document_number }}"
                                                data-status="{{ $verification->status }}"
                                                data-rejection_reason="{{ $verification->rejection_reason }}">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            @if($verification->status == 'pending')
                                            <button class="btn btn-sm btn-success approve-btn"
                                                data-id="{{ $verification->id }}">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                            <button class="btn btn-sm btn-danger reject-btn"
                                                data-id="{{ $verification->id }}">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewKycModal" tabindex="-1" role="dialog" aria-labelledby="viewKycModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="viewKycModalLabel">KYC Verification Details</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-light">User</label>
                            <p class="text-light" id="viewUserName"></p>
                        </div>

                        <div class="form-group">
                            <label class="text-light">Document Type</label>
                            <p class="text-light" id="viewDocumentType"></p>
                        </div>

                        <div class="form-group">
                            <label class="text-light">Full Name</label>
                            <p class="text-light" id="viewFullName"></p>
                        </div>

                        <div class="form-group">
                            <label class="text-light">Date of Birth</label>
                            <p class="text-light" id="viewDob"></p>
                        </div>

                        <div class="form-group">
                            <label class="text-light">Document Number</label>
                            <p class="text-light" id="viewDocumentNumber"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-light">Status</label>
                            <p class="text-light"><span id="viewStatus" class="badge"></span></p>
                        </div>

                        <div class="form-group" id="rejectionReasonContainer">
                            <label class="text-light">Rejection Reason</label>
                            <p class="text-light" id="viewRejectionReason"></p>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4 text-center">
                        <label class="text-light">Front Document</label>
                        <div class="document-container">
                            <img id="viewFrontDocument" src="" class="img-fluid img-thumbnail"
                                style="max-height: 200px;">
                        </div>
                        <a href="#" id="frontDocumentLink" class="btn btn-sm btn-primary mt-2" target="_blank">View
                            Full</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <label class="text-light">Back Document</label>
                        <div class="document-container">
                            <img id="viewBackDocument" src="" class="img-fluid img-thumbnail"
                                style="max-height: 200px;">
                        </div>
                        <a href="#" id="backDocumentLink" class="btn btn-sm btn-primary mt-2" target="_blank">View
                            Full</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <label class="text-light">Selfie</label>
                        <div class="document-container">
                            <img id="viewSelfie" src="" class="img-fluid img-thumbnail" style="max-height: 200px;">
                        </div>
                        <a href="#" id="selfieLink" class="btn btn-sm btn-primary mt-2" target="_blank">View Full</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveKycModal" tabindex="-1" role="dialog" aria-labelledby="approveKycModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="approveKycModalLabel">Approve KYC Verification</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="approveKycForm">
                <input type="hidden" name="verification_id" id="approveVerificationId">
                <div class="modal-body">
                    <p class="text-light">Are you sure you want to approve this KYC verification?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <span class="submit-text">Approve</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectKycModal" tabindex="-1" role="dialog" aria-labelledby="rejectKycModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="rejectKycModalLabel">Reject KYC Verification</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="rejectKycForm">
                <input type="hidden" name="verification_id" id="rejectVerificationId">
                <div class="modal-body">
                    <div id="rejectErrors" class="alert alert-danger d-none"></div>

                    <div class="form-group">
                        <label class="text-light">Rejection Reason</label>
                        <textarea name="rejection_reason" class="form-control bg-dark text-light" rows="3"
                            required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <span class="submit-text">Reject</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')

<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000"
    };

    $(document).ready(function() {
        $('#KycTable').DataTable({
            order: [[5, 'desc']],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'print', 'excel', 'pdf']
        });

        // Handle view button click
        $('.view-btn').click(function() {
            const verificationId = $(this).data('id');
            const userId = $(this).data('user_id');
            const documentType = $(this).data('document_type');
            const frontDocument = $(this).data('front_document');
            const backDocument = $(this).data('back_document');
            const selfie = $(this).data('selfie');
            const fullName = $(this).data('full_name');
            const dob = $(this).data('dob');
            const documentNumber = $(this).data('document_number');
            const status = $(this).data('status');
            const rejectionReason = $(this).data('rejection_reason');
            
            // Get user name from table row
            const userName = $(this).closest('tr').find('td:first').text();
            
            $('#viewUserName').text(userName);
            $('#viewDocumentType').text(documentType ? documentType.replace(/_/g, ' ') : 'N/A');
            $('#viewFullName').text(fullName || 'N/A');
            $('#viewDob').text(dob ? new Date(dob).toLocaleDateString() : 'N/A');
            $('#viewDocumentNumber').text(documentNumber || 'N/A');
            
            // Set status badge
            const statusBadge = $('#viewStatus');
            statusBadge.text(status);
            statusBadge.removeClass('badge-success badge-danger badge-warning');
            
            if(status == 'approved') {
                statusBadge.addClass('badge-success');
                $('#rejectionReasonContainer').hide();
            } else if(status == 'rejected') {
                statusBadge.addClass('badge-danger');
                $('#viewRejectionReason').text(rejectionReason || 'No reason provided');
                $('#rejectionReasonContainer').show();
            } else {
                statusBadge.addClass('badge-warning');
                $('#rejectionReasonContainer').hide();
            }
            
            // Set document images
            const baseUrl = '{{ asset('') }}';
            
            if(frontDocument) {
                $('#viewFrontDocument').attr('src', baseUrl + frontDocument);
                $('#frontDocumentLink').attr('href', baseUrl + frontDocument);
                $('#viewFrontDocument').parent().show();
                $('#frontDocumentLink').show();
            } else {
                $('#viewFrontDocument').parent().hide();
                $('#frontDocumentLink').hide();
            }
            
            if(backDocument) {
                $('#viewBackDocument').attr('src', baseUrl + backDocument);
                $('#backDocumentLink').attr('href', baseUrl + backDocument);
                $('#viewBackDocument').parent().show();
                $('#backDocumentLink').show();
            } else {
                $('#viewBackDocument').parent().hide();
                $('#backDocumentLink').hide();
            }
            
            if(selfie) {
                $('#viewSelfie').attr('src', baseUrl + selfie);
                $('#selfieLink').attr('href', baseUrl + selfie);
                $('#viewSelfie').parent().show();
                $('#selfieLink').show();
            } else {
                $('#viewSelfie').parent().hide();
                $('#selfieLink').hide();
            }
            
            $('#viewKycModal').modal('show');
        });

        // Handle approve button click
        $('.approve-btn').click(function() {
            const verificationId = $(this).data('id');
            $('#approveVerificationId').val(verificationId);
            $('#approveKycModal').modal('show');
        });

        // Handle approve form
        $('#approveKycForm').submit(function(e) {
            e.preventDefault();
            const form = $(this);
            const submitBtn = form.find('[type="submit"]');
            const submitText = form.find('.submit-text');
            const spinner = form.find('.spinner-border');
            const verificationId = $('#approveVerificationId').val();
            
            // Show loading state
            submitText.addClass('d-none');
            spinner.removeClass('d-none');
            
            $.ajax({
                url: "/admin/kyc-verifications/" + verificationId + "/approve",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT'
                },
                success: function(response) {
                    if(response.status === 'success') {
                        toastr.success(response.message);
                        $('#approveKycModal').modal('hide');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function(xhr) {
                    submitText.removeClass('d-none');
                    spinner.addClass('d-none');
                    
                    const response = xhr.responseJSON;
                    toastr.error(response.message || 'An error occurred');
                }
            });
        });

        // Handle reject button click
        $('.reject-btn').click(function() {
            const verificationId = $(this).data('id');
            $('#rejectVerificationId').val(verificationId);
            $('#rejectKycModal').modal('show');
        });

        // Handle reject form
        $('#rejectKycForm').submit(function(e) {
            e.preventDefault();
            const form = $(this);
            const submitBtn = form.find('[type="submit"]');
            const submitText = form.find('.submit-text');
            const spinner = form.find('.spinner-border');
            const verificationId = $('#rejectVerificationId').val();
            
            // Show loading state
            submitText.addClass('d-none');
            spinner.removeClass('d-none');
            
            $.ajax({
                url: "/admin/kyc-verifications/" + verificationId + "/reject",
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if(response.status === 'success') {
                        toastr.success(response.message);
                        $('#rejectKycModal').modal('hide');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function(xhr) {
                    submitText.removeClass('d-none');
                    spinner.addClass('d-none');
                    
                    if(xhr.status === 422) {
                        // Validation errors
                        const errors = xhr.responseJSON.errors;
                        let errorHtml = '<ul class="mb-0">';
                        
                        $.each(errors, function(key, value) {
                            errorHtml += '<li>' + value[0] + '</li>';
                        });
                        
                        errorHtml += '</ul>';
                        $('#rejectErrors').html(errorHtml).removeClass('d-none');
                    } else {
                        // Other errors
                        const response = xhr.responseJSON;
                        toastr.error(response.message || 'An error occurred');
                    }
                }
            });
        });
    });
</script>