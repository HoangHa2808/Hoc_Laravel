@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật chapter truyện</div>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('chapter.update',[$chapter->id])}}" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" name="tieude" value="{{$chapter->tieude}}" class="form-control" onkeyup="ChangeToSlug();"  id="slug" aria-describedby="emailHelp" placeholder="Tên chapter...">                                                    
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" name="slug_chapter" value="{{$chapter->slug_chapter}}" class="form-control"  id="convert_slug" aria-describedby="emailHelp" placeholder="Slug chapter...">                                                    
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt chapter</label>
                            <textarea name ="tomtat" class="form-control" value="{{$chapter->tomtat}}" rows="1" style="resize:none">{{$chapter->tomtat}}</textarea>
                        </div>  

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea name ="noidung" class="form-control" value="{{old('slug_chapter')}}" rows="5" style="resize:none">{{$chapter->noidung}}</textarea>
                        </div> 
                        
                        <div class="form-group">                          
                            <label for="exampleInputEmail1">Thuộc truyện</label>                                                    
                            <select name="truyen_id" class="custom-select ">
                                @foreach($truyen as $key => $value)
                                    <option {{$chapter->truyen_id==$value->id? 'selected':''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="form-group">                          
                            <label for="exampleInputEmail1">Kích hoạt</label>                                                    
                            <select name="kichhoat" class="custom-select custom-select-lg mb-3">
                                @if ($chapter->kichhoat ==0)   
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>  
                        
                        <button type="submit" name="themchapter" class="btn btn-primary">Cập nhật</button>                                      
                          
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 