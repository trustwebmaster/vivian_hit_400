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
bbge
@section('contents')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Public Sections</h3>
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800"></h1>
                      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newfolder"><i class="fas fa-list">  Add Section</i></a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Section</th>
                        <th>Description</th>
                        <th>Accessibility</th>
                        <th>Date modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{ $section->section }}</td>
                                <td>{{ $section->description }}</td>
                                <td>{{ $section->accessibility }}</td>
                                <td>{{ $section->updated_at }}</td>
                                <td><a class="btn btn-primary" href = "/e-filling/public-sections/files/{{ $section->id}}">
                                    <i class="fa fa-arrow-circle-right"></i></a></td>
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
          <h4 class="modal-title">New Section</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="/e-filling/add-section">
                {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Section</label>
                      <input type="text" name="section" class="form-control" required>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Accessibility</label>
                    <select name="accessibility" class="form-control">
                        <option>Public</option>
                        <option value="{{ Auth::user()->id }}">Private</option>
                    </select>
                </div>
            </div>
          </div>

          <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Attributes</label>
                      <select class="form-control" name="attributes" required>
                          <option>Read & Write</option>
                      </select>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Capacity (GB)</label>
                      <input type="number" class="form-control" name="capacity" required>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
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
@endsection