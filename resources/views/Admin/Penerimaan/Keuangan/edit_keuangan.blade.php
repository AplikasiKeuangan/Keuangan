@extends('layouts.apps')

@section('judul',' - Edit Kategori')
@section('head')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Kategori - {{ $keuangan->tanggal }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-Data-kategori-index') }}">Daftar Kategori</a></li>
              <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>
          </div>
        </div>
      </div>
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
   @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
      </div>
   @endif
      <!-- modal-tambah-data -->
      <div class="row col-md-12">
         <div class="modal-dialog modal-lg col-md-12" role="document">
            <div class="modal-content col-md-12">
                  <div class="modal-header">
                     <div class="card-header col-md-11"><strong>Edit Data</strong> Form</div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="card">
                              <div class="card-body card-block">
                                 <form method="post" id="form-edit-kategori" class="form-horizontal" action="/admin/Data/kategori/{{$keuangan->id}}/update" >
                                    @csrf
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                        <label for="hf-tanggal" class=" form-control-label" value="{{$keuangan->tanggal}}">Tanggal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                           <input type="date" value="{{$keuangan->tanggal}}" id="hf-tanggal" name="tanggal" required="" class="form-control">
                                        </div>
                                  </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-uraian" class=" form-control-label">Keterangan</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <textarea id="hf-uraian" name="keterangan" placeholder="Keterangan" required="" class="form-control">{{$keuangan->keterangan}}</textarea>
                                          </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                          <label for="hf-kategori" class=" form-control-label">Kategori</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                          <select id="hf-kategori" name="kategori" placeholder="kategori" required="" class="ops form-control">
                                            @foreach($kategori as $key=>$value)
                                            <?php
                                                 if($key!=0){
                                                     $sub_categories=DB::table('kategoris')->select('id','nama_kategori')->get();
                                                     if(count($sub_categories)>0){
                                                         foreach ($sub_categories as $sub_category){
                                                             echo '<option value="'.$sub_category->id.'">&nbsp;&nbsp;'.$keuangan->nama_kategori.'</option>';
                                                         }
                                                     }
                                                 }
                                             ?>
                                          @endforeach
                                          </select>
                                       </div>
                                 </div>
                                    <div class="row form-group">
                                          <div class="col col-md-3">
                                             <label for="hf-jenis" class=" form-control-label">Jenis</label>
                                          </div>
                                          <div class="col-12 col-md-9">
                                             <select id="hf-jenis" name="jenis" placeholder="jenis" required="" class="ops form-control">
                                                <option class="ops @error('ops') is-invalid @enderror" value="0">Pilih...</option>
                                                <option class="ops @error('ops') is-invalid @enderror" value="penerimaan">Penerimaan (Debit)</option>
                                                <option class="ops @error('ops') is-invalid @enderror" value="pengeluaran">Pengeluaran (Kredit)</option>
                                             </select>
                                          </div>
                                    </div>
                                    
                                    <div class="row form-group" style="display: none;" id="Nominal">
                                       <div class="col col-md-3">
                                          <label for="hf-nominal" class=" form-control-label">Nominal</label>
                                       </div>
                                       <div class="col-12 col-md-9">
                                           @if ($keuangan->pengeluaran != null && $keuangan->penerimaan == null)
                                                <input type="number" id="hf-nominal" name="nominal" placeholder="Nominal" value="{{$keuangan->pengeluaran}}" class="form-control">
                                            @elseif($keuangan->penerimaan != null && $keuangan->pengeluaran == null)
                                                <input type="number" id="hf-nominal" name="nominal" placeholder="Nominal" value="{{$keuangan->penerimaan}}" class="form-control">
                                           @endif
                                         
                                       </div>
                                 </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                           <i class="fa fa-ban"></i> Reset
                                        </button>
                                     </div>
                                 </form>
                              </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <script>
        $(document).ready(function(){
         $('.ops').on('change', function() {
         if ( this.value == 'penerimaan')
         {
            
             $("#Nominal").show();
         }
         else if ( this.value == 'pengeluaran')
         {
           
             $("#Nominal").show();
         }
         else
         {
             
             $("#Nominal").hide();
         }
         });
     });
    </script>
   </section>
@endsection

@section('script')
@endsection