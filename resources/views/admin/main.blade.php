@extends('admin.layouts.master')
@section('title', 'anasayfa')
@section('content')
    <h1 class="page-header">Dashboard</h1>


    <section class="row text-center placeholders">
        @include('admin.layouts.partials.sidebar')
        <div class="col-sm-3 col-md-3 col-lg-2 sidebar collapse" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Dashboard</a>
                <a href="#" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Products
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
                <a href="#" class="list-group-item collapsed" data-target="#submenu1" data-toggle="collapse" data-parent="#sidebar"><span class="fa fa-fw fa-dashboard"></span> Categories<span class="caret arrow"></span></a>
              <div class="list-group collapse" id="submenu1">
                <a href="#" class="list-group-item">Category</a>
                <a href="#" class="list-group-item">Category</a>
              </div>
                <a href="#" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Users
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
                <a href="#" class="list-group-item">
                    <span class="fa fa-fw fa-dashboard"></span> Orders
                    <span class="badge badge-dark badge-pill pull-right">14</span>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Header</div>
                <div class="panel-body">
                    <h4>123</h4>
                    <p>Data</p>
                </div>
            </div>
        </div>
    </section>
@endsection
