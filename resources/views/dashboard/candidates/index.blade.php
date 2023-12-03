@extends('dashboard.components.layouts.main')
@section('main')
    <div class="bg-primary">
        <h2 class="text-center text-light">{{ $title }}</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile-body">
                <div class="tile">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="{{ route('candidates.create') }}" class="btn btn-success mb-2"> <i
                                    class="fa fa-pencil"></i>Daftar
                            </a>
                            <select name="searchPriode" id="searchPriode" class="form-control col-md-4 form-control-sm mb-2">
                                @foreach ($priodes as $priode)
                                <option value="{{ $priode->id }}">PRIODE: {{ $priode->priode }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="tile-body table-responsive-sm table-striped table">
                        <table class="table" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Kandidate</th>
                                    <th>BEM</th>
                                    <th>Priode/Masa Jabatan</th>
                                    <th>Visi & Misi</th>
                                    <th>Total Suara</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#show{{ $candidate->id }}">
                                            @if ($candidate->image)
                                            <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->image }}"
                                                class="img-fluid" width="50">
                                            @else
                                            <img src="{{ asset('user.png') }}" width="50">
                                            @endif
                                        </a>
                                    </td>
                                    <td>{{ $candidate->name_ketua }} & {{ $candidate->name_wakil }}</td>
                                    <td>{{ $candidate->gender }}</td>
                                    <td>{{ $candidate->priode->priode }}</td>
                                    <th>
                                        <button data-toggle="modal" data-target="#showVisiMisi{{ $candidate->id }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
                                        @include('dashboard.candidates.show')
                                    </th>
                                    <th>{{ $candidate->votes }} Suara</th>
                                    <th>
                                        <div class="btn-group">
                                            <form id="delete-form" action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-warning text-light btn-sm"
                                                    href="{{ route('candidates.edit', $candidate->id) }}"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-delete btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add event listener to the searchPriode select element
            $('#searchPriode').on('change', function() {
                // Get the selected priode ID
                var selectedPriodeId = $(this).val();

                // Make an AJAX request to fetch candidates for the selected priode
                $.ajax({
                    url: '/getCandidate/' + selectedPriodeId, // Corrected URL with a forward slash
                    type: 'GET',
                    success: function(data) {
                        // Update the content of the candidates table with the fetched data
                        $('#candidatesTable').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching candidates:', error);
                    }
                });
            });
        });
    </script>
@endsection
