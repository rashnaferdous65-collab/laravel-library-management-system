<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .details-container { background-color: #121212; min-height: 100vh; padding-top: 100px; }
        .book-card { background-color: #1e1e1e; border-radius: 20px; overflow: hidden; }
        .info-box { background-color: #2a2a2a; padding: 15px; border-radius: 15px; }
        .btn-apply { background: #f04e7c; color: white; padding: 12px; border-radius: 12px; font-weight: bold; width: 100%; }
        .btn-apply:hover { background: #d63d69; }
    </style>
</head>

<body class="details-container">

@include('home.header')

<div class="container mx-auto px-4 py-10">
    <div class="max-w-5xl mx-auto book-card flex flex-col md:flex-row shadow-2xl">

        {{-- Book Image --}}
        <div class="md:w-1/2 h-[730px] bg-[#151515] overflow-hidden">

            @if(!empty($data->book_img))
                <img src="{{ asset('book/'.$data->book_img) }}"
                      class="w-full h-full object-cover"
                     alt="Book Image">
            @else
                <span class="text-gray-500">No Image Available</span>
            @endif
        </div>

        {{-- Book Details --}}
        <div class="md:w-1/2 p-10">
            <h1 class="text-3xl font-bold text-white mb-4">
                {{ $data->title }}
            </h1>

            {{-- Author --}}
            <div class="flex items-center mb-6">
                @if(!empty($data->auther_img))
                    <img src="{{ asset('auther/'.$data->auther_img) }}"
                         class="w-12 h-12 rounded-full border-2 border-pink-500 mr-3"
                         alt="Author">
                @endif
                <span class="text-gray-300 font-medium">
                    {{ $data->auther_name }}
                </span>
            </div>

            {{-- Status --}}
            <div class="flex gap-4 mb-8">
                <div class="info-box flex-1">
                    <p class="text-pink-500 text-xs font-bold uppercase">Status</p>
                    <p class="text-white font-bold">In Stock</p>
                </div>

                <div class="info-box flex-1">
                    <p class="text-pink-500 text-xs font-bold uppercase">Available</p>
                    <p class="text-white font-bold">
                        {{ $data->quantity }} Copies
                    </p>
                </div>
            </div>

            {{-- Description --}}
            <p class="text-gray-400 mb-8 leading-relaxed">
                {{ $data->description ?? 'No description found for this book.' }}
            </p>

            {{-- Actions --}}
            <div class="space-y-4">
                <form action="{{ url('borrow_book', $data->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-apply transition-all transform hover:scale-105">
                        Apply To Borrow
                    </button>
                </form>

                <a href="{{ url('/') }}"
                   class="block text-center text-gray-500 hover:text-white transition">
                    ← Return to Library
                </a>
            </div>
        </div>

    </div>
</div>

@include('home.footer')

</body>
</html>
