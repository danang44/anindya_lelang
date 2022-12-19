@extends('Admin.layouts_admin.app')

@section('content')


<style>
    label {
        color: black !important;
    }

    option {
        color: black;
    }

    .dataTables_info {
        color: black !important;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline" style="background-color:#011126">
                    <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Card</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data Card</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-right">
                        <button type="button" class=" mt-3 mb-1 btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;">
                            Tambah Data <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class=" card">
                        <div class="pt-2 pr-1 pl-1 table-responsive col-sm-12 ">
                            <table id="table_id" class="table table-striped  table-striped table-border m-1 datatable-scroll-y">
                                <thead>
                                    <tr class="text-center">
                                    
                                        <th>Nama perusahaan</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>No NIB</th>
                                      
                                        <th class="col-3s text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user_lelang as $i )
                                    <tr>
                                        <td class="pr-2 pl-2 ">{{$i->nama_perusahaan}}</td>
                                        <td class="pr-2 pl-2 ">{{$i->email}}</td>
                                        <td class="pr-2 pl-2 ">{{$i->alamat}}</td>
                                        <td class="pr-2 pl-2 ">{{$i->telp}}</td>
                                        <td class="pr-2 pl-2 ">{{$i->no_nib}}</td>
                                       
                                        <td class="text-center">
                                            <button class="btn btn-outline-info editbtn" value="{{$i->id}}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-outline-danger deletebtn" value="{{$i->id}}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
        $(document).on('click', '.deletebtn', function() {
            var id = $(this).val();
            // alert(id);
            $('#deleteModal').modal('show');
            $('#deleting_id').val(id);
        });
        // $(document).on('click', '.editbtn', function() {
        //     var id = $(this).val();
        //     // alert(id)
        //     $('#editModal').modal('show');

        //     $.ajax({
        //         type: "GET",
        //         url: "/card_edit/" + id,
        //         success: function(response) {
        //             console.log(response.card.desc)
        //             $('#name').val(response.card.name);
        //             $('#desc').val(response.card.desc);
        //             $('#id').val(response.card.id);
        //         }
        //     });
        // });
    });
</script>

<!-- Modal Update -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title">Update Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/card/update" method="post">
                    @csrf

                    <input type="hidden" id="id" name="id"> <br />

                    <div class="form-group">
                        <label>Jenis Kartu</label>
                        <input type="text" required="required" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" required="required" class="form-control" name="desc" id="desc">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Barang-->



<!-- delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/card_delete" method="post">
                    @csrf
                    @method('DELETE')
                    <h3>Anda yakin menghapus data ?</h3>
                    <input type="hidden" id="deleting_id" name="delete_id">
                    <!-- <input type="hidden" id="delete_by" name="delete_by" value="{{Auth::id()}}"> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-primary">Hapus</button>
                    </div>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- end delete -->

<!-- add -->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center pb-3" style="background-color:#011126">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/userlelang_store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id"> <br />
                    <input type="hidden" id="id_user" name="id_user" value="{{Auth::id()}}"> <br />
                  
                  

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" required="required" name="email" id="email" value="{{Auth::user()->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" required="required" class="form-control" name="nama_perusahaan" id="nama_perusahaan">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" required="required" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label>Telp</label>
                        <input type="text" required="required" class="form-control" name="telp" id="telp">
                    </div>
                    <div class="form-group">
                        <label>No NIB</label>
                        <input type="text" required="required" class="form-control" name="no_nib" id="no_nib">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" value="Upload" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>   
var desc = document.getElementById("desc"); 
    CKEDITOR.replace(desc);
    CKEDITOR.replace('scope');
    CKEDITOR.config.autoParagraph = false;
   
</script> --}}

@endsection