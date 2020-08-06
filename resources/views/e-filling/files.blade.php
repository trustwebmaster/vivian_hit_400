@extends('layout\layout')

@section('navigationbar')
    @include('layout\navigation')
@endsection

@section('customlinks')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/toastr/toastr.min.css') }}">
@endsection

@section('contents')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- About Me Box -->
          @foreach ($sections as $section)
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ $section->section}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-paragraph mr-1"></i>Description</strong>

              <p class="text-muted">
                {{ $section->description }}
              </p>

              <hr>

              <strong><i class="fas fa-tag mr-1"></i> Accessibility</strong>

              <p class="text-muted">
                  {{ $section->accessibility }}
              </p>

              <hr>

              <strong><i class="fas fa-server mr-1"></i> Capacity</strong>

              <p class="text-muted">
                  {{ $section->capacity }}
              </p>

              <hr>

              <strong><i class="fas fa-server"></i>Capacity Used</strong>

              <p class="text-muted">{{ $section->capacity_used }}</p>

              <hr>

              <strong><i class="fas fa-calendar"></i>Date Created</strong>

              <p class="text-muted">{{ $section->created_at }}</p>

              <hr>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          @endforeach


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Public Sections</h3>
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newfolder"><i class="fas fa-upload"></i></a>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>File</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Format</th>
                        <th>Uploaded By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->file }}</td>
                                <td>{{ $file->description }}</td>
                                <td>{{ $file->size }}</td>
                                <td>{{ $file->format }}</td>
                                <td>{{ $file->uploaded_by }}</td>
                                <td><a href="/e-filling/public-section/files/download/{{ $file->id }}"><i class="fas fa-download"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('modals')
<div class="modal fade" id="newfolder">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="/e-filling/public-section/files/upload" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{$id}}" name="section_id">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">File name</label>
                      <input type="text" name="filename" class="form-control" required>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control" name="fileToUpload">
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputFile">File description</label>
                    <textarea class="form-control" name="description"></textarea>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload File</button>
        </div>

    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('pagejs')
<!-- bs-custom-file-input -->
<script src="{{asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
<script>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: true,
      timer: 6000
    });

    @if ($message = Session::get('success'))
        $(window).on('load',function(){
          Toast.fire({
            type: 'success',
            title: '{{ $message }}'
          })
        });
    @endif

    @if ($message = Session::get('danger'))
    $(window).on('load',function(){
      Toast.fire({
        type: 'danger',
        title: '{{ $message }}'
      })
    });
@endif
});
</script>
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>  
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>  
@endsection