@extends('admin.index')
@section('title', 'Thêm mới tin tức')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Thêm Mới Tin Tức</h2>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <form role="form" action="{{url('admin/news/postAdd')}}" method="post" id="form-add" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Tiêu đề<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('title')) has-error @endif">
                            <input type="text" name="title" class="form-control"  placeholder="" maxlength="255" value="{{ old('title')}}">
                            <span class="text-danger"><p>{{ $errors->first('title') }}</p></span>
                        </div>   
                    </div>

                   <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Danh Mục</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('cate_new_id')) has-error @endif">
                            <select name="cate_new_id" id="cate_new_id"  class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value=""></option>
                                @foreach($dataCategoryNew as $val)
                                    <option @if(old('cate_new_id') == $val['id'] ) selected ="selected" @endif value="{{ $val['id']}}">{{ $val['name']}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"><p>{{ $errors->first('cate_new_id') }}</p></span>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Giới thiệu<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('info')) has-error @endif">
                            <input type="text" name="info" class="form-control" id="exampleInputWallets" placeholder=""  value="{{ old('info')}}">
                            
                            <span class="text-danger"><p>{{ $errors->first('info') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Trạng Thái</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('status')) has-error @endif">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option @if(old('status') == 1 ) selected ="selected" @endif value="1" >Hiển thị</option>
                                <option @if(old('status') == 2 ) selected ="selected" @endif value="2" >Ẩn</option>
                            </select>
                          
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Nội dung<span class="obligatory">*</span></label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('status')) has-error @endif">
                            <textarea id="content" name="content" rows="10" cols="80">
                            
                            </textarea>
                            <script>
                                ckeditor(content);
                            </script>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                         <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Image Slide</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('imgs')) has-error @endif">
                            <div class="form-group has-feedback">

                                <input type="file" id="uploadfile" name="imgs"  value="" placeholder = "" onChange="readURL(this);" >
                                    <div class="preview showimg" id="thumbbox" style="margin-top: 10px;">
                                      <img id="thumbimage"  src=""  width="30%" alt="Image preview...">
                                      <a class="removeimg" href="javascript:" ></a>
                                    </div>

                                <span class="text-danger"><p>{{ $errors->first('imgs') }}</p></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1"></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                             <button id="btn-submit" type="submit" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                    </div>
                </div>
              <!-- /.box-body -->
        	</form>
        </div>
    </div>
@endsection