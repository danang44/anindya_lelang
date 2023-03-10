@extends('Admin.layouts_admin.app')

@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline" style="background-color:#011126">
                    <div class="page-title d-flex" style="padding-top:1% !important;padding-bottom:1% !important">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Data Artikel</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none py-0 mb-3 mb-md-0">
                        <div class="breadcrumb">
                            <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Data Artikel</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="/article_add"> <button type="button" class=" mt-3 mb-1 btn btn-outline-success" >
                            Tambah Data <i class="fa-solid fa-plus"></i>
                        </button></a>
                    </div>
                    <div class=" card">
                        <div class="pt-2 pr-1 pl-1 table-responsive col-sm-12 ">
                            <table id="table_id" class="table table-striped  table-striped table-border m-1 datatable-scroll-y">
                                <thead>
                                    <tr class="text-center">
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>User</th>
                                        <th></th>
                                        <th class="col-3s text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mast_lelang as $c)
                                    <tr>
                                        <td class="pr-2 pl-2 ">{{$c->nama_perusahaan}}</td>
                                        <td class="pr-2 pl-2 ">{{$c->tgl_mulai}}</td>
                                        <td class="pr-2 pl-2 ">{{$c->tgl_akhir}}</td>
                                        <td class="pr-2 pl-2 ">{{$c->desc}}</td>
                                        {{-- <td class="pr-2 pl-2 ">{{$c->title}}</td>
                                        <td class="text-justify pr-2 pl-2 ">{{$c->intro}}</td>
                                        <td class="pr-2 pl-1 "><img src="public/data_article/{{ $c->gambar }}" class="gallery-image"
                                      ></td>
                                        {{-- <td class="pr-2 pl-1 "><img width="300px" src="{{ url('/content/images/'.$c->gambar) }}"></td> --}}
                                        {{-- <td class="pr-2 pl-2 ">{{$c->gambar}}</td> --}}
                                        {{-- <td class="pr-2 pl-2 ">{{@$c->user->name}}</td> --}} --}}

                                        <td class="pr-2 pl-2 "></td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-danger deletebtn" value="{{$c->id}}"><i class="fa-solid fa-trash"></i></button>
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
{{-- 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            order: [[0, 'desc']],
        });
        $(document).on('click', '.deletebtn', function() {
            var id = $(this).val();
            // alert(id);
            $('#deleteModal').modal('show');
            $('#deleting_id').val(id);
        });
        $(document).on('click', '.editbtn', function() {
            var id = $(this).val();
            // alert(id)
            $('#editModal').modal('show');

        });
    });
</script>

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
                <form action="/article_delete" method="post">
                    @csrf
                    @method('DELETE')
                    <h3>Anda yakin menghapus data ?</h3>
                    <input type="hidden" id="deleting_id" name="delete_id">
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


@endsection --}}

@endsection
