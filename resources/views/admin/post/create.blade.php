@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
            <li class="breadcrumb-item active">Добавление поста</li>
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
          
          <div class="col-12">
          <form method="POST" enctype="multipart/form-data" action="{{route('admin.post.store')}}">
            <div class="form-group ">
            @csrf
                 <div class="form-group ">
                    <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{old('title')}}">
                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                 
                <div class="form-group">
                  <form method="post">
                  <textarea id="summernote" name="content">{{old('content')}}</textarea>
                  @error('content')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </form>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Добавить</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label">Выберите изображение</label>
                      </div>

                      @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                      <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                      </div>

                    </div>
                  </div>

                  <div class="form-group w-50">
                        <label>Категория</label>
                        <select name="category_id" class="form-control">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                          @endforeach
                        </select>
                  </div>

                  <div class="form-group">
                  <label>Теги</label>
                  <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                  @foreach($tags as $tag)
                    <option {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                  </select>
                </div>
                  
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить">
                  </div>
          </form>
          </div>
         
        </div>

        
        <!-- /.row -->
 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection