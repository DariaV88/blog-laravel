@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Теги</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.tag.index')}}">Теги</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-2 mb-2">
            <a href="{{route('admin.tag.create')}}" class="btn btn-block btn-primary mb-4">Добавить</a>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Название</th>
                      <th colspan="2">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tags as $tag)
                    <tr>
                      <td>{{$tag->id}}</td>
                      <td>{{$tag->title}}</td>
                      <td><a href="{{route('admin.tag.show', $tag->id)}}">Просмотр</a></td>
                      <td><a href="{{route('admin.tag.edit', $tag->id)}}">Изменить</a></td>
                      <td>
                        <form action="{{route('admin.tag.delete', $tag->id)}}" method="POST">
                        @csrf  
                        @method("DELETE")
                        <button type="submit" class="border-0 bg-transparent">Удалить</button> 
                       </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection