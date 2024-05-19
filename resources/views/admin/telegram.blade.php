@extends('layout.admin')

@section('container')
    <div class="relative flex items-center">
        <form class="space-y-4 md:space-y-6" action="/buatberita" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col justify-center items-center w-full md:w-auto md:max-w-[1000px] h-[720px] ml-[385px] mt-10">
                <div class="bg-white shadow-md rounded-lg p-6 mt-8 mx-auto w-[1000px] h-[720px]">
                    <!-- Content of your rectangular card goes here -->
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Judul Berita</h2>
                    <div>
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900"></label>
                        <input type="text" name="judul" id="judul" placeholder="Isi Judul Berita..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#F5682A] focus:border-[#F5682A] block w-64 p-2.5"
                            required="">
                        @error('judul')
                            <p class="text-red-500 text-sm font-medium py-2 capitalize" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <h2 class="text-lg font-semibold mt-2 text-gray-800 mb-4">Isi Berita</h2>
                    <div>
                        <label for="isi_berita" class="block mb-2 text-sm font-medium text-gray-900"></label>
                        <div
                            class="overflow-hidden rounded-lg w-1/2 h-64 border border-gray-300 focus-within:border-[#F5682A] focus-within:ring-1 focus-within:ring-[#F5682A]">
                            <textarea type="text" id="isi_berita" name="isi_berita"
                                class="p-2 w-full h-full resize-none border-none align-top focus:ring-0 sm:text-sm"
                                placeholder="Tuliskan Isi Berita..."></textarea>
                        </div>
                        @error('isi_berita')
                            <p class="text-red-500 text-sm font-medium py-2 capitalize" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Keterangan foto (opsional) </h2>
                    <div>
                        <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900"></label>
                        <input type="file" name="thumbnail" id="fileInput" accept="image/*">
                    </div>
                    <br>

                    <h2>Pilih Grup Telegram : </h2>
                    <select id="telegramGroup">
                        <option value= "-1002122684774">Grup Utama</option>
                        <option value= "-1002097094091">Kecamatan Panji</option>
                        <option value= "-1002006597152">Kecamatan Situbondo</option>
                    </select>

                    <button type="button" id="kirim" value="KIRIM"
                        class="bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded mt-4"
                        onclick="kirimPesanadmin()">Kirim</button>


                    <button type="button" id="kirim" value="KIRIM"
                        class="bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded mt-4"
                        onclick="kirimPesanSemua()">Kirim ke Semua</button>

                </div>
            </div>
        </form>
    </div>

    <style>
        body {
            background-image: linear-gradient(#72B944, #FFFFFF);
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function kirimPesanSemua() {
            var judulOnly = document.getElementById('judul');
            var judul = document.getElementById('judul').value;
            var isi_beritaOnly = document.getElementById('isi_berita');
            var isi_berita = document.getElementById('isi_berita').value;
            var token = '6750609219:AAFbaG0pzoOYqfjMsx_t8jpswm5DlgYrln4'; // TELEGRAM TOKEN
            var groups = ['-1002122684774', '-1002097094091', '-1002006597152']; // CHAT IDs

            // Get the file input element
            var fileInput = document.getElementById('fileInput');
            var file = fileInput.files[0];

            var gabungan = `${judul}\n${isi_berita}`;

            if (file) {
                // If file is selected, send photo with caption to each group
                groups.forEach(function(group) {
                    var formData = new FormData();
                    formData.append('chat_id', group);
                    formData.append('caption', gabungan);
                    formData.append('photo', file);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', `https://api.telegram.org/bot${token}/sendPhoto`, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                console.log(`Message with photo sent successfully to group ${group}.`);
                            } else {
                                console.error(`Error sending message with photo to group ${group}:`, xhr
                                .status);
                            }
                        }
                    };
                    xhr.send(formData);
                });
            } else {
                // If no file is selected, send text message to each group
                groups.forEach(function(group) {
                    var xhrText = new XMLHttpRequest();
                    xhrText.open('POST', `https://api.telegram.org/bot${token}/sendMessage`, true);
                    xhrText.setRequestHeader('Content-Type', 'application/json');
                    xhrText.onreadystatechange = function() {
                        if (xhrText.readyState === XMLHttpRequest.DONE) {
                            if (xhrText.status === 200) {
                                console.log(`Text message sent successfully to group ${group}.`);
                            } else {
                                console.error(`Error sending text message to group ${group}:`, xhrText.status);
                            }
                        }
                    };
                    xhrText.send(JSON.stringify({
                        chat_id: group,
                        text: gabungan,
                        parse_mode: 'HTML'
                    }));
                });
            }
        }



        function kirimPesanadmin() {
            var judulOnly = document.getElementById('judul');
            var judul = document.getElementById('judul').value;
            var isi_beritaOnly = document.getElementById('isi_berita');
            var isi_berita = document.getElementById('isi_berita').value;
            var token = '6750609219:AAFbaG0pzoOYqfjMsx_t8jpswm5DlgYrln4'; // TELEGRAM TOKEN

            // Get the selected Telegram group
            var selectedGroup = document.getElementById("telegramGroup").value;

            // Get the file input element and file
            var fileInput = document.getElementById('fileInput');
            var file = fileInput.files[0];

            // Create FormData object to send both text and image
            var formData = new FormData();
            formData.append('chat_id', selectedGroup);
            formData.append('caption', `${judul}\n${isi_berita}`);

            if (file) {
                formData.append('photo', file);

                // Create XMLHttpRequest to send the data
                var xhr = new XMLHttpRequest();
                xhr.open('POST', `https://api.telegram.org/bot${token}/sendPhoto`, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log('Message sent successfully.');
                        } else {
                            console.error('Error sending message:', xhr.status);
                        }
                    }
                };
                xhr.send(formData);
            } else {
                // Send a regular text message if no file is selected
                var gabungan = judulOnly.value + "\n" + isi_beritaOnly.value;
                var xhrText = new XMLHttpRequest();
                xhrText.open('POST', `https://api.telegram.org/bot${token}/sendMessage`, true);
                xhrText.setRequestHeader('Content-Type', 'application/json');
                xhrText.onreadystatechange = function() {
                    if (xhrText.readyState === XMLHttpRequest.DONE) {
                        if (xhrText.status === 200) {
                            console.log('Text message sent successfully.');
                        } else {
                            console.error('Error sending text message:', xhrText.status);
                        }
                    }
                };
                xhrText.send(JSON.stringify({
                    chat_id: selectedGroup,
                    text: gabungan,
                    parse_mode: 'HTML'
                }));
            }
        }
    </script>
@endsection
