@extends('layout\layout')

@section('navigationbar')
    @include('layout\student')
@endsection

@section('customlinks')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

@section('contents')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Uploaded Files</h3>
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
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

@endsection

@section('pagejs')
<!-- bs-custom-file-input -->
<script src="{{ asset('../../plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
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