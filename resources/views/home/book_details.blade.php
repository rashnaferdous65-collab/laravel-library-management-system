<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { background: #0f0f0f; }
        .card-wrapper { min-height: 100vh; padding-top: 120px; }
        .book-wrapper { background: #181818; border-radius: 25px; }
        .detail-box { background: #242424; border-radius: 12px; padding: 12px; }
        .borrow-btn {
            background: linear-gradient(45deg, #ff4e8a, #ff6fa5);
            color: #fff;
            padding: 14px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
        }
        .borrow-btn:hover {
            opacity: .9;
            transform: translateY(-2px);
            transition: .3s;
        }
    </style>
</head>

<body>

@include('home.header')

<div class="card-wrapper flex items-center justify-center px-4">
    <div class="book-wrapper w-full max-w-6xl grid md:grid-cols-2 shadow-2xl overflow-hidden">

        {{-- LEFT SIDE : IMAGE --}}
        <div class="bg-black flex items-center justify-center h-[720px]">

            @if(!empty($data->book_img))
                <img src="{{ asset('book/'.$data->book_img) }}"
                     class="w-full h-full object-cover"
                     alt="Book">
            @else
                <p class="text-gray-500 text-lg">No Image Available</p>
            @endif

        </div>

        {{-- RIGHT SIDE : DETAILS --}}
        <div class="p-10 text-white flex flex-col justify-between">

            <div>
                {{-- Title --}}
                <h2 class="text-4xl font-bold mb-6">
                    {{ $data->title }}
                </h2>

                {{-- Author Info --}}
                <div class="flex items-center gap-3 mb-6">
                    @if(!empty($data->auther_img))
                        <img src="{{ asset('auther/'.$data->auther_img) }}"
                             class="w-14 h-14 rounded-full border border-pink-400"
                             alt="Author">
                    @endif
                    <div>
                        <p class="text-gray-400 text-sm">Written By</p>
                        <p class="font-semibold">{{ $data->auther_name }}</p>
                    </div>
                </div>

                {{-- Book Info --}}
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="detail-box">
                        <p class="text-xs text-pink-400 uppercase">Stock Status</p>
                        <p class="font-bold">In Stock</p>
                    </div>

                    <div class="detail-box">
                        <p class="text-xs text-pink-400 uppercase">Copies Left</p>
                        <p class="font-bold">
                            {{ $data->quantity }} Available
                        </p>
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-8">
                    <h4 class="text-lg font-semibold mb-2">About This Book</h4>
                    <p class="text-gray-400 leading-relaxed">
                        {{ $data->description ?? 'No description found for this book.' }}
                    </p>
                </div>
            </div>

            {{-- Buttons --}}
            <div>
                <form action="{{ url('borrow_book', $data->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="borrow-btn">
                        Apply To Borrow
                    </button>
                </form>

                <a href="{{ url('/') }}"
                   class="block text-center mt-4 text-gray-500 hover:text-white transition">
                    ← Back To Home
                </a>
            </div>

        </div>

    </div>
</div>

@include('home.footer')

</body>
</html>
