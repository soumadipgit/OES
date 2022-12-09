@extends('layout/adminLayout')
@section('workspace')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <h2 class="mb-4"> Subject</h2>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SubjectModal">
            Open modal
        </button>
    </div>
    {{-- bg-secondary navbar-dark --}}
    <!-- The Modal -->
    <div class="modal " id="SubjectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="subjectform" class="bg-secondary">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header bg-secondary">
                        <h4 class="modal-title ">Modal Heading</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body bg-secondary">
                        <input class="bg-secondary" type="text" name="subName" id="subName"
                            placeholder="Enter subject name">
                        {{-- </form> --}}
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer bg-secondary">
                        <button type="submit" class="btn btn-danger" name="submit" id="submit"
                            value="submit">submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        @endsection
        @push('script')
            {{-- <script>
                $(document).ready(function() {

                    $('#subjectform').submit(function() {
                        var formdata = FormData(this);
                        console.log(formdata)
                        $.ajax({
                            url: "{{ route('addSubject') }}",
                            type: "post",
                            data: formdata,
                            success: function(data) {
                                console.log(data);
                            }
                        })
                    })

                })
            </script> --}}
        @endpush
