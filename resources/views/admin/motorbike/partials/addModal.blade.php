
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add motorbike</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route("motorbike.store")}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6">
                        <labe for="make">make:</labe>
                        <input type="text" class="form-control" name="make" id="make" value="{{old("make")}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <labe for="model">model:</labe>
                        <input type="date" class="form-control" name="model" id="model" value="{{old("model")}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <labe for="color">color:</labe>
                        <input type="color" class="form-control" name="color" id="color" value="{{old("color")}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <labe for="weight">weight:</labe>
                        <input type="number" class="form-control" name="weight" id="weight" value="{{old("weight")}}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <labe for="price">price:</labe>
                        <input type="number" class="form-control" name="price" id="price" value="{{old("price")}}" required>
                    </div>
                    <div class="custom-file col-md-12" style="margin: 10px">
                        <labe for="image">image:</labe>
                        <input type="file" class="custom-file-input" name="image" id="image" required>
                    </div>
                    <input type="submit" value="save" class="btn btn-success">
                    <input type="reset" value="reset" class="btn btn-danger">

                </form>
            </div>
        </div>
    </div>
</div>