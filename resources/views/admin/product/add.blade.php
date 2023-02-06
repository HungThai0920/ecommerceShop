@extends('admin.index')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Thêm Mới Sản Phẩm</h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @include('admin.template.messages')
            <form role="form" action="{{url('admin/products/postAdd')}}" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Thông tin chung</a></li>
                                <li><a href="#settings" data-toggle="tab">Bài viết </a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Thông tin chung -->
                                <div class="active tab-pane" id="activity">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 mg-top-20">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                             <label for="exampleInputEmail1">Tên sản phẩm<span class="obligatory">*</span></label>
                                        </div>
                                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('name')) has-error @endif">
                                            <input type="text" name="name" class="form-control"  placeholder="" maxlength="255" value="{{ old('name')}}">
                                            <span class="text-danger"><p>{{ $errors->first('name') }}</p></span>
                                        </div>   
                                    </div>  
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                             <label for="exampleInputEmail1">Thuộc danh mục <span class="obligatory">*</span></label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('category_id')) has-error @endif">
                                            <select name="category_id" id="category_id"  class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="">---- Chọn Danh Mục ----</option>
                                                <?php cateParent($dataCate); ?>
                                            </select>
                                            <span class="text-danger"><p>{{ $errors->first('category_id') }}</p></span>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                             <label for="exampleInputEmail1">Thuộc nhà cung cấp </label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('supplier_id')) has-error @endif">
                                            <select name="supplier_id" id="supplier_id"  class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="">---- Chọn nhà cung cấp ----</option>
                                                 @foreach($suppliers as $val)
                                                    <option @if(old('supplier_id') == $val['id'] ) selected ="selected" @endif value="{{ $val['id']}}">{{ $val['name']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger"><p>{{ $errors->first('supplier_id') }}</p></span>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                             <label for="exampleInputEmail1">Giá<span class="obligatory">*</span></label>
                                        </div>
                                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('price')) has-error @endif">
                                            <input type="number" min="0" name="price" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{{ old('price')}}">
                                            
                                            <span class="text-danger"><p>{{ $errors->first('price') }}</p></span>
                                        </div>   
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                             <label for="exampleInputEmail1">Giảm giá</label>
                                        </div>
                                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('sale')) has-error @endif">
                                            <input type="number" min="0"  max="100" name="sale" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{{ old('sale')}}">
                                            
                                            <span class="text-danger"><p>{{ $errors->first('sale') }}</p></span>
                                        </div>   
                                    </div>

                                    {{--<div class="form-group col-md-12 col-sm-12 col-xs-12">--}}
                                        {{--<div class="col-md-3 col-sm-6 col-xs-12 ">--}}
                                            {{--<label for="exampleInputEmail1">Đơn vị</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                            {{--<select name="unit" id="unit"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                                {{--<option @if(old('unit') == 'Chiếc' ) selected ="selected" @endif value="Chiếc" >Chiếc</option>--}}
                                                {{--<option @if(old('unit') == 'Hộp' ) selected ="selected" @endif value="Hộp" >Hộp</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                             <label for="exampleInputEmail1">Tổng số sản phẩm <span class="obligatory">*</span></label>
                                        </div>
                                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 @if($errors->first('total')) has-error @endif">
                                            <input type="number" min="0"  max="99999999" name="total" class="form-control" id="exampleInputWallets" placeholder="" maxlength="255" value="{{ old('total')}}">
                                            
                                            <span class="text-danger"><p>{{ $errors->first('total') }}</p></span>
                                        </div>   
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <label for="exampleInputEmail1">Hiển thi ở trang chủ</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('show_home')) has-error @endif">
                                            <select name="show_home" id="show_home"   class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option @if(old('show_home') == 1 ) selected ="selected" @endif value="1" >Hiển thị</option>
                                                <option @if(old('show_home') == 2 ) selected ="selected" @endif value="2" >Ẩn</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <label for="exampleInputEmail1">Sản phẩm bán chạy</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                               <label>
                                                  <input type="checkbox" name="hot" class="flat-red" value="1"><span>Chọn</span>
                                                </label>
                                            </div>
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
                                            <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 @if($errors->first('image')) has-error @endif">
                                            <div class="form-group has-feedback">

                                                <input type="file" id="uploadfile" name="image"  value="" placeholder = "" onChange="readURL(this);" >
                                                <div class="preview showimg" id="thumbbox" style="margin-top: 10px;">
                                                    <img id="thumbimage"  src=""  width="30%" alt="Image preview...">
                                                    <a class="removeimg" href="javascript:" ></a>
                                                </div>

                                                <span class="text-danger"><p>{{ $errors->first('image') }}</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Thông tin chung -->
                                <div class="tab-pane" id="settings">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 mg-top-20">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <label for="exampleInputEmail1">Mô tả sản phẩm <span class="obligatory">*</span></label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                                            <textarea id="description" name="description" rows="10" cols="80">
                                                {{ old('description')}}
                                            </textarea>
                                            <script>
                                                ckeditor(description);
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <label for="exampleInputEmail1">Nội dung</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                                            <textarea id="content" name="contents" rows="10" cols="80">
                                                 {{ old('contents')}}
                                            </textarea>
                                            <script>
                                                ckeditor(content);
                                            </script>
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
                        </div>
                      <!-- /.tab-content -->
                    </div>
                   <!-- /.nav-tabs-custom -->
                </div>
            </form>
        </div>
    </div>
@endsection