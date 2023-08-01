@foreach ($resis as $resi)
    <div class="modal fade" id="fullImageModal{{ $resi->id }}" tabindex="-1" aria-labelledby="fullImageModalLabel{{ $resi->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullImageModalLabel{{ $resi->id }}">Full Image - {{ $resi->namapt }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/files/' . $resi->original_filename) }}" alt="FotoResi" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </div>
@endforeach
