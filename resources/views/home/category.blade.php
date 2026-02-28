<div class="categories-collections">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="categories">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="section-heading">
                                <div class="line-dec"></div>
                                <h2>Browse Through Book <em>Categories</em> Here.</h2>
                            </div>
                        </div>

                        @php
                            $categories = [
                                ['name' => 'Motivational', 'icon' => 'icon-01.png'],
                                ['name' => 'Money', 'icon' => 'icon-02.png'],
                                ['name' => 'Psychological', 'icon' => 'icon-03.png'],
                                ['name' => 'Story', 'icon' => 'icon-04.png'],
                                ['name' => 'Fictional', 'icon' => 'icon-05.png'],
                                ['name' => 'Romance', 'icon' => 'icon-06.png'],
                            ];
                        @endphp

                        @foreach($categories as $category)
                            <div class="col-lg-2 col-sm-6">
                                <div class="item text-center">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/' . $category['icon']) }}" alt="{{ $category['name'] }}">
                                    </div>
                                    <h4>{{ $category['name'] }}</h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>