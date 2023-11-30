@foreach ($candidates as $candidate)
    <div class="modal fade" id="showVisiMisi{{ $candidate->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampEleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ $candidate->name_ketua }} &
                        {{ $candidate->name_wakil }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{!! $candidate->visi_misi !!}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
@foreach ($candidates as $candidate)
    <div class="modal fade" id="show{{ $candidate->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampEleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ $candidate->name_ketua }} &
                        {{ $candidate->name_wakil }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        @if ($candidate->image)
                            <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->image }}"
                                class="img-fluid" width="250">
                        @else
                            <img src="{{ asset('user.png') }}">
                        @endif
                    </div>
                    <div class="col">
                        <input type="text" class="form-control mb-2" readonly disabled
                            value="{{ $candidate->nisn_ketua }}-{{ $candidate->name_ketua }} | {{ $candidate->nisn_wakil }}-{{ $candidate->name_wakil }}">
                        <input type="text" class="form-control mb-2" readonly disabled
                            value="{{ $candidate->priode->priode }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
