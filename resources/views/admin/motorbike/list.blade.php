@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    @if(Session::has('msg'))
                        <div class="alert alert-success">{{session(['msg'])}}</div>
                    @endif
                    @can("register_motorbike")
                        {{--          add motorbike modal          --}}
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                                style="margin: 10px;">
                            <i class="fa fa-plus"> add motorbike</i>
                        </button>
                        @include("admin.motorbike.partials.addModal")
                    @endcan

                </div>
                <div class="card-body">
                    {{--filtering--}}
                    <input type="text" id="myInput" placeholder="Search for everything.."
                           title="Type in a name">
                    {{--tabel for show list of motorbike--}}
                    <table class="table table-striped" id="myTable">
                        <tr class="header">
                            <th>id</th>
                            <th>make</th>
                            <th>model</th>
                            <th>color</th>
                            <th>weight</th>
                            <th>price</th>
                            <th>image</th>
                            <th>operation</th>
                        </tr>
                        @if(isset($motorbikes))
                            @foreach($motorbikes as $motorbike)
                                <tr>
                                    <td>{{$motorbike->id}}</td>
                                    <td>{{$motorbike->make}}</td>
                                    <td>{{$motorbike->model}}</td>
                                    <td>{{$motorbike->color}}</td>
                                    <td>{{$motorbike->weight}}</td>
                                    <td>{{$motorbike->price}}</td>
                                    <td>
                                        <img src="{{$motorbike->image}}" alt="">
                                        @if(is_file(storage_path("app/".$motorbike->image)))
                                            <img src="{{ storage_path('/app/'.$motorbike->image) }}" width="150"
                                                 height="100">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="" data-toggle="modal" data-target="#editModal">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        @include("admin.motorbike.partials.editModal" ,["motorbike"=>$motorbike])
                                        <a href="#" onclick="motorbikeDelete({{$motorbike->id}})">
                                            <i class="fa fa-trash fa-2x text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <div class="text-center">
                    {{$motorbikes->links()}}
                </div>
            </div>
        </div>
    </div>
@stop


@push("js")
    <script>
        function motorbikeDelete(id) {
            swal({
                title: "Are you sure?",
                text: "your data is delete forever!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{route("motorbike.delete")}}",
                            type: "POST",
                            data: {
                                id: id
                            },
                            dataType: "html",
                            success: function () {
                                swal("Done!", "It was succesfully deleted!", "success");
                                location.reload(true)
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!", "Please try again", "error");
                            }
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }

        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush