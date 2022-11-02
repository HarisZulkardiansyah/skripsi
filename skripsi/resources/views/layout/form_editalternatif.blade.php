<div class="row clearfix">
    <div class="col-md-6">Nama Alternatif</div>
    
    <div class="col-md-6">
        <input class="form-control" type="text" name="nama_alternatif" value="{{ $model->nama_alternatif }}"> 
        @foreach($errors->get('nama_alternatif') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-6">Sanksi Berorganisasi</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="sanksi_berorganisasi" value="{{ $model->sanksi_berorganisasi }}">
        @foreach($errors->get('sanksiberorganisasi') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-6">Status Keanggotaan</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="status_keanggotaan" value="{{ $model->status_keanggotaan }}">
        @foreach($errors->get('status_keanggotaan') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-6">keaktifan</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="keaktifan" value="{{ $model->keaktifan }}">
        @foreach($errors->get('keaktifan') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-6">Pengalaman</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="pengalaman" value="{{ $model->pengalaman }}">
        @foreach($errors->get('pengalaman') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-6">IJDK</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="ijdk" value="{{ $model->ijdk }}">
        @foreach($errors->get('ijdk') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>
{{-- 
<div class="row clearfix">
    <div class="col-md-6">Keaktifan</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="keaktifan" value="{{ $model->keaktifan }}">
        @foreach($errors->get('keaktifan') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
</div><div class="row clearfix">
    <div class="col-md-6">Keaktifan</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="keaktifan" value="{{ $model->keaktifan }}">
        @foreach($errors->get('keaktifan') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
</div>

    <div class="row clearfix">
        <div class="col-md-6">Pengalaman</div>
        
    <div class="col-md-6">
        <input class="form-control"  type="text" name="pengalaman" value="{{ $model->pengalaman }}"> 
        @foreach($errors->get('pengalaman') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-6">IJDK</div>
    
    <div class="col-md-6">
        <input class="form-control"  type="text" name="ijdk"  value="{{ $model->ijdk }}">
        @foreach($errors->get('ijdk') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div> --}}

<button type="submit" class="btn btn-primary">SIMPAN</button>