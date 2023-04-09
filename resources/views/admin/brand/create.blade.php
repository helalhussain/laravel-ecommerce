@extends('admin\mastar')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Create brand</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('success'))
                    <span>{{ Session::get('success') }}</span>
                    @endif
                    @if(Session::has('fail'))
                        <span>{{ Session::get('fail') }}</span>
                    @endif
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">brand Title</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge @error('title') is-invalid @enderror" name="title">
                               <br> @error('title')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>



                        <div class="control-group hidden-phone">
                            <label class="control-label " for="textarea2"> Description</label>
                            <div class="controls">
                                <textarea class="cleditor @error('description') is-invalid
                            @enderror" name="description" rows="3" ></textarea>
                           <br> @error('description')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Create brand</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
