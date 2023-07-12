@extends('layouts.mainmenu')
@section('content')

<section class="section dashboard">
<div class="row">

  <!-- Left side columns -->
<div class="col-lg-12">
<div class="row">
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Kategori</h5>
              <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText"  class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-5">
                  <input type="text" name="number" value="{{ $nomor }}" class="form-control"   readonly>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <input type="text" name="kategori" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Perusahaan</label>
                <div class="col-sm-10">
                <select id="inputState" class="form-select" name="kodeperusahaan">
                  <option selected>Choose...</option>
                  @foreach($perusahaan as $kat)
                  <option value="{{ $kat->number }}">{{ $kat->namaperusahaan }}</option>
                  @endforeach
                </select>
                </div>
              </div>
            <div class="row mb-3">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm">Batal</button>
                </div>
            </div>
            </form>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection