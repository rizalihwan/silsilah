@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Selamat datang {{ Str::upper(auth()->user()->name) }} berikut adalah <strong>silsilah keluarga
                            anda</strong>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h3>Visualisasi Tree Anak Dan Cucu Anda</h3>
                            </div>
                            <div class="card-body">
                                @forelse ($childs as $child)
                                <div class="accordion mb-3" id="accordionExample">
                                    <div class="card">
                                      <div class="card-header" id="headingOne">
                                        <h4 class="mb-0">
                                          <strong>{{ $child->name }} {!! $child->GenderDefinition !!}</strong>
                                        </h4>
                                      </div>
                                  
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div>
                                                <h4>KETURUNAN / CUCU ANDA :</h4> 
                                            </div>
                                            <b>{!! Str::upper('- ' . $child->grandchilds()->get()->implode('name', '</br> - ')) !!}</b>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @empty
                                  <h5 style="color: red; text-align: center">Visualisasi Tree Data Kosong.</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
