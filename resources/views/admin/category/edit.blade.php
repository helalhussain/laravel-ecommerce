@extends('admin\mastar')
@section('admin_content')
{{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    @if(Session::has('success'))
                    <span>{{ Session::get('success') }}</span>
                    @endif
                    @if(Session::has('fail'))
                        <span>{{ Session::get('fail') }}</span>
                    @endif
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Category Title</label>
                            <div class="controls">
                                <input type="text" value="{{ $category->title }}" class="input-xlarge @error('title') is-invalid @enderror" name="title">
                               <br> @error('title')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label " for="textarea2"> Description</label>
                            <div class="controls">
                                <textarea class="cleditor @error('description') is-invalid
                            @enderror" name="description" rows="3" >
                        {{ $category->description }}
                        </textarea>
                           <br> @error('description')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
