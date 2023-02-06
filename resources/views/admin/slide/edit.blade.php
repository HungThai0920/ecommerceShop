@extends('admin.index')
@section('title', 'Chỉnh sửa slide')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Chỉnh Sửa Slide</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <form role="form" action="{{url('admin/slides/postEdit',$dataSlide->id)}}" method="post" id="form-add" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Tên slide<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('name')) has-error @endif">
                            <input type="text" name="name" class="form-control"  placeholder="" maxlength="255" value="{!! old('name',isset($dataSlide)?$dataSlide->name:NULL) !!}">
                            <span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
                        </div>   
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Link</label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('link')) has-error @endif">
                            <input type="text" name="link" class="form-control"  placeholder="" maxlength="255" value="{!! old('link',isset($dataSlide)?$dataSlide->link:NULL) !!}">
                            
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                             <label for="exampleInputEmail1">Thứ tự hiển thị<span class="obligatory">*</span></label>
                        </div>
                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('sort')) has-error @endif">
                            <input type="number" min="0" max="100" name="sort" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{!! old('sort',isset($dataSlide)?$dataSlide->sort:NULL) !!}">
                            
                            <span class="text-danger"><p>{{ $errors->first('sort') }}</p></span>
                        </div>   
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Trạng Thái</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('status')) has-error @endif">
                            <select name="status" id="status"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option @if($dataSlide->status == 1 ) selected ="selected" @endif value="1" >Hiển thị</option>
                                <option @if($dataSlide->status == 2 ) selected ="selected" @endif value="2" >Ẩn</option>
                            </select>
                          
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                         <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <label for="exampleInputEmail1">Image Slide</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('Image')) has-error @endif">
                            <div class="form-group has-feedback">

                                <input type="file" id="uploadfile" name="Image"  value="" placeholder = "" onChange="readURL(this);" >
                                    <div class="preview showimg" id="thumbbox" style="margin-top: 10px;">
                                      <img id="thumbimage"  src="{{ asset('uploads/admin/slides')}}/{{$dataSlide->image}}"  width="30%" alt="Image preview...">
                                      <a class="removeimg" href="javascript:" ></a>
                                    </div>

                                <span class="text-danger"><p>{{ $errors->first('Image') }}</p></span>
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