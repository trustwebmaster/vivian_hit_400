@extends('layout\layout')

@section('navigationbar')
    @include('layout\navigation')
@endsection

@section('contents')
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $files }}</h3>

              <p>Public Files</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3>00</h3>

              <p>Personal Files</p>
            </div>
          </div>
        </div>
         

              
@endsection

@section('modals')
 
@endsection

@section('pagejs')
@endsection