@extends('main')

@section('title', 'Nilai')

@section('search')
<form class="form-inline mr-auto" action="nilai" method="GET">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
  </ul>
  <div class="search-element">
    <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search" data-width="250">
    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
  </div>
</form>
@endsection

@section('breadcrumb')
<div class="section-header">
  <h1>Teknik Informatika Universitas Muria Kudus</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Nilai</div>
  </div>

</div> 

@endsection
    
@section('content')
<div class="section-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-body table-responsive">
          <strong >Data Nilai</strong>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">

          </div>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th  class="text-center">No</th>
                {{-- <th class="text-center">Nama</th> --}}
                <th class="text-center">Nim</th>

                <th class="text-center">Nilai</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Tnilai as $item)
                <tr>
                    {{-- <td class="text-center">{{$nilai-> firstItem() + $key}}</td> --}}
                    <td class="text-center">{{ $loop->iteration}}</td>
                    {{-- <td class="text-center">{{ $item->nama}}</td> --}}
                    <td class="text-center">{{ $item->nim_id}}</td>
                    <td class="text-center">{{ $item->nilai}}</td>
                    <td class="text-center">
                        <a href="{{ url('Tnilai/'.$item->id)}}" class="btn btn-warning btn-sm">
                          <i class="fas fa-eye"></i>
                      </a>

                    </td>
                </tr> 
                @endforeach
            </tbody>
          </table>
          <div class="col-lg-6 d-grid gap-2 d-md-flex justify-content-md-start">
              {{-- Showing --}}
              {{-- {{ $nilai->firstItem()}}
              to
              {{ $nilai->lastItem()}}
              of
              {{ $nilai->total()}} --}}
          </div>
          <div class="col-lg-6 d-grid gap-2 d-md-flex justify-content-md-end">
            {{-- {{ $nilai->links() }} --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('modal')
    {{-- modal delete --}}
    @foreach ($Tnilai as $item)
    <script>
      function showEdit(q){
        //  var id = $(this).data("idne");
        //  console.log(q)
          // $("#modal-edit-"+q).modal('show');
        }
        function delet(q){
      
          $("#modal-hapus-"+q).modal('show');
      
        }
      
        </script>
          {{-- modal delete --}}
          <form action="{{ url('deleteNilai', $item->id)}}" method="POST" class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-<?=$item->id?>" aria-modal="true"> 
            @method('delete')
            @csrf     
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">         
              <div class="modal-content">          
                <div class="modal-header">             
                <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini?</h5>             
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                  <span aria-hidden="true">×</span>             
                </button>           
              </div>           
              <div class="modal-body">          
                 Klik 'Yes' untuk melanjutkan</div>  
                           
                 <div class="modal-footer">           
                   {{-- <button type="submit" class="btn btn-danger btn-shadow" id="">Yes</button> --}}
                   <a href="{{ url('deleteNilai', $item->id)}}" class="btn btn-danger">Delete</a>
                   <button type="button" data-dismiss="modal" class="btn btn-secondary" id="">Cancel</button>
                  </div>         
                </div>       
              </div>    
            </form>
    @endforeach
        
@endsection
