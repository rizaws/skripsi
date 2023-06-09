<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <h1>Pad Tanda Tangan</h1>
            <div>
                <canvas id="signatureCanvas" width="500" height="200"></canvas>
                <button id="clearButton">Hapus</button>
                <button id="saveButton">Simpan</button>
            </div>
        </div>
    </div>
</x-app-layout>
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <script>
        var canvas = document.getElementById('signatureCanvas');
        var signaturePad = new SignaturePad(canvas);

        var clearButton = document.getElementById('clearButton');
        clearButton.addEventListener('click', function() {
            signaturePad.clear();
        });

        var saveButton = document.getElementById('saveButton');
        saveButton.addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                alert('Tanda tangan belum dibuat.');
            } else {
                var signatureData = signaturePad.toDataURL(); // Mengonversi tanda tangan menjadi data gambar
                // Kirim signatureData ke server untuk disimpan atau diproses sesuai kebutuhan Anda
            }
        });
    </script>
@endsection
