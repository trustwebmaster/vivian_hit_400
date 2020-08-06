@extends('layout\layout')

@section('navigationbar')
    @include('layout\navigation')
@endsection

@section('contents')
<div class="error-container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
</div>
<div class="error-container">
    @if ($message = Session::get('danger'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
</div>
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All e-filling Shelves</h3>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newfolder"><i class="fas fa-file"></i>&nbspNew Shelve</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Shelve</th>
                <th>Description</th>
                <th>Accessibility</th>
                <th>Attributes</th>
                <th>Contents</th>
                <th>Capacity</th>
                <th>Allocated Capacity</th>
                <th>Free Space</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($shelves as $shelve)
                      <tr>
                          <td>{{ $shelve->shelve }}</td>
                          <td>{{ $shelve->description }}</td>
                          <td>{{ $shelve->accessibility }}</td>
                          <td>{{ $shelve->attributes }}</td>
                          <td>{{ $shelve->contents }}</td>
                          <td>{{ $shelve->capacity }}</td>
                          <td>{{ $shelve->allocated_capacity }}</td>
                          <td>0%</td>
                          <td><a href="{{ $shelve->id }}" class="btn btn-danger"><i class= "fas fa-trash"></i></a></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection

@section('modals')
<div class="modal fade" id="newfolder">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Shelve</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="/e-filling/settings/addshelve">
                {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Shelve</label>
                      <input type="text" name="shelve" class="form-control" required>
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