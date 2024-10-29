@extends(adminTemplate())
@section('container')
    <div class="card">
        <div class="card-body">
            <form action="" method="get" class="invalid ">
                @csrf
                <x-input-comp label="Alamat email" type="email" name="email" placeholder="Email" required />
                <x-select-comp label="Negara" name="country" required>
                    <option value="" selected disabled>Select dropdown</option>
                    <option>With options</option>
                </x-select-comp>
                <x-textarea-comp label="Deskripsi" name="description" rows="3" placeholder="This is a placeholder..."
                    required />
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div id="carousel-example-caption" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-example-caption" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-example-caption" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="{{ asset('web/foto/landing/luca-bravo-XJXWbfSo2f0-unsplash.jpg') }}"
                    alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-white">First Slide Label</h3>
                    <p class="text-white">
                        Donut jujubes I love topping I love sweet. Jujubes I love brownie
                        gummi bears I love donut sweet
                        chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('web/foto/landing/marvin-meyer-SYTO3xs06fU-unsplash.jpg') }}"
                    alt="Second slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-white">Second Slide Label</h3>
                    <p class="text-white">
                        Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar
                        jelly caramels jujubes
                        chocolate cake gummies. Cupcake cake I love cake danish carrot cake.
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" data-bs-target="#carousel-example-caption" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carousel-example-caption" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    {{-- dropdown --}}
    <x-dropdown-comp id="test-dropdown" class="is-left" buttonText="Dropdown" :content="[['url' => '', 'title' => 'Dropdown 1']]">
        @slot('buttonSlot')
            <button type="button" class="button">
                <i class="fa-solid fa-save"></i>
            </button>
        @endslot

        @slot('contentSlot')
            <a href="#" class="dropdown-item">Dropdown Slot</a>
        @endslot
    </x-dropdown-comp>

    {{-- pagination --}}
    <div class="box mt-4">
        <x-pagination-comp :data="$users" />

        <div class="list my-4">

            @foreach ($users as $user)
                <div class="list-item">
                    <div class="list-item-image">
                        <figure class="image is-64x64">
                            <img class="is-rounded" src="https://via.placeholder.com/128x128.png?text=Image">
                        </figure>
                    </div>

                    <div class="list-item-content">
                        <div class="list-item-title">{{ $user->nama }}</div>
                        <div class="list-item-description">{{ '@' . $user->username }}</div>
                    </div>

                    <div class="list-item-controls">
                        <div class="buttons is-right">
                            <button class="button">
                                <span class="icon is-small">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span>Ubah</span>
                            </button>

                            <button class="button">
                                <span class="icon is-small">
                                    <i class="fas fa-ellipsis-h"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <x-pagination-comp :data="$users" />
    </div>
@endsection

@section('modal')
    {{-- modal --}}
    <x-modal-comp :header="false" :footer="true" :form="[
        'action' => '',
        'method' => 'get',
    ]">
        <x-input-comp type="search" name="cari" class="is-large" value="{{ request('cari') }}"
            placeholder="Kata kunci pencarian..." required />

        {{-- slot footer --}}
        {{-- @slot('footerSlot')
            ini footer
        @endslot --}}
    </x-modal-comp>
@endsection
