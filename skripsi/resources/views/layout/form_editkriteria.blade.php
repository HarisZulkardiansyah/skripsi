<div class="row clearfix">
    <div class="col-md-6">Nama kriteria</div>
    
    <div class="col-md-6">
        <input class="form-control" type="text" name="nama" value="{{ $model->nama }}"> 
        @foreach($errors->get('nama') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-6">Atribut</div>
    
    <div class="col-md-6">
        <select class="form-select" name='atribut' aria-label="Default select example">
            <option value="">==== Select Atribut ===</option>
            <option value="Cost" {{'Cost' == $model->atribut ? 'selected':''}}>Cost</option>
            <option value="Benefit" {{'Benefit' == $model->atribut ? 'selected':''}}>Benefit</option>
          </select>
        @foreach($errors->get('atribut') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<button type="submit" class="btn btn-primary">SIMPAN</button>