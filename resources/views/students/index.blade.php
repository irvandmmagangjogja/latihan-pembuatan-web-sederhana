<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>CRUD Siswa</title>
</head>
<header class="flex justify-between bg-gray-300 px-4 mb-10">
    <h1 class="text-2xl font-bold my-5">Data Siswa</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('students.index') }}" method="GET" class=" self-center">
        <input type="text" name="search" placeholder="Search" class="border rounded-full py-2 px-4">
    </form>

</header>

<body class="bg-white overflow-x-hidden">
    <div class="container mx-auto px-4 ">

        <!-- Tampilkan Siswa -->
        <div class=" flex flex-col justify-center">
            <h1 class="text-2xl font-bold my-5 text-center">Data Siswa Sekolah ... <button
                    onclick="document.getElementById('tambah-form').style.display='block'"
                    class="bg-gray-500 text-xs text-white hover:bg-gray-700 py-1 px-4 rounded">Tambah Data</button></h1>
            <div>
                <div class="my-4 flex gap-4 w-screen justify-center flex-wrap">
                    @foreach ($students as $student)
                        <div class="bg-gray-300 p-2 shadow mb-3 w-1/5 flex flex-col justify-between items-center">
                            <div>
                                <p class="flex justify-between">Nama : {{ $student->name }}</p>
                                <p class="flex justify-between">
                                    Ttl: {{ $student->birth_place }},
                                    {{ \Carbon\Carbon::parse($student->birth_date)->format('d-M-Y') }}
                                </p>
                                <p class="flex justify-between">Sekolah : {{ $student->school }}</p>
                                <p class="flex justify-between">Keterangan : {{ $student->description }}</p>
                            </div>
                            <div class="flex gap-4 mt-3">
                                <!-- Form Edit -->
                                <button
                                    onclick="document.getElementById('edit-form-{{ $student->id }}').style.display='block'"
                                    class="bg-gray-500 text-white hover:bg-gray-700 py-1 px-4 w-24 rounded">Edit</button>

                                <!-- Form Delete -->
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-gray-500 text-white hover:bg-gray-700 py-1 px-4 w-24 rounded">Hapus</button>
                                </form>
                            </div>
                        </div>

                        <div class="backdrop-blur-sm left-0 top-0 pt-4 w-screen flex justify-center absolute z-50">
                            <div id="edit-form-{{ $student->id }}" style="display:none;"
                                class="bg-gray-400 rounded-xl w-96 p-5 shadow-xl">
                                <form action="{{ route('students.update', $student->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex flex-col">
                                        <h1 class="text-2xl font-bold my-5 text-center">Edit Data</h1>
                                        <p class="font-bold">Nama</p>
                                        <input type="text" class="rounded-lg p-2 mb-2" name="name"
                                            value="{{ $student->name }}" required>
                                        <p class="font-bold">Tempat Lahir</p>
                                        <input type="text" class="rounded-lg p-2 mb-2" name="birth_place"
                                            value="{{ $student->birth_place }}" required>
                                        <p class="font-bold">Tanggal Lahir</p>
                                        <input type="date" class="rounded-lg p-2 mb-2" name="birth_date"
                                            value="{{ $student->birth_date }}" required>
                                        <p class="font-bold">Sekolah</p>
                                        <input type="text" class="rounded-lg p-2 mb-2" name="school"
                                            value="{{ $student->school }}" required>
                                        <p class="font-bold">Keterangan</p>
                                        <textarea class="rounded-lg p-2 mb-2" name="description">{{ $student->description }}</textarea>
                                        <div class="flex gap-5 mt-2 mx-auto">
                                            <button
                                                onclick="document.getElementById('edit-form-{{ $student->id }}').style.display='none'"
                                                class="bg-gray-500 text-white hover:bg-gray-700 py-1 px-4 w-24 rounded">Batal</button>
                                            <button type="submit"
                                                class="bg-gray-500 text-white hover:bg-gray-700 py-1 px-4 w-24 rounded">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="backdrop-blur-sm left-0 top-0 pt-4 w-screen flex justify-center absolute z-50">
            <div id="tambah-form" style="display:none;" class="bg-gray-400 rounded-xl w-96 p-5 shadow-xl">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold my-5 text-center">Tambah Data</h1>
                        <p class="font-bold">Nama</p>
                        <input type="text" class="rounded-lg p-2 mb-2" name="name" required>
                        <p class="font-bold">Tempat Lahir</p>
                        <input type="text" class="rounded-lg p-2 mb-2" name="birth_place" required>
                        <p class="font-bold">Tanggal Lahir</p>
                        <input type="date" class="rounded-lg p-2 mb-2" name="birth_date" required>
                        <p class="font-bold">Sekolah</p>
                        <input type="text" class="rounded-lg p-2 mb-2" name="school" required>
                        <p class="font-bold">Keterangan</p>
                        <textarea name="description" id="description" class="rounded-lg p-2 mb-2"></textarea>
                        <div class="flex gap-5 mt-2 mx-auto">
                            <button onclick="document.getElementById('tambah-form').style.display='none'"
                                class="bg-gray-500 text-white hover:bg-gray-700 py-1 px-4 w-24 rounded">Batal</button>
                            <button type="submit"
                                class="bg-gray-500 text-white hover:bg-gray-700 py-1 px-4 w-24 rounded">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
