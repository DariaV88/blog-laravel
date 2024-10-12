@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Комментарии</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
              <li class="breadcrumb-item"><a href="#">Комментарии</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
          <form method="POST" action="{{route('personal.comment.update', $comment->id)}}" class="w-25"><div class="form-group">
            @csrf
            @method('PATCH')
                    <textarea name="message" cols="40" rows="10">{{$comment->message}}</textarea>
                    @error('message')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <input type="submit" class="btn btn-primary" value="Обновить"></form>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection