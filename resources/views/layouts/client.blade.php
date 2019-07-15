<section class="content-bottom">
    <div class="home-our-client">
        <div class="heading">
            <div class="popover popover-top">
                <div class="popover-content">
                    <h2>{{ __('interface.ourclient') }}</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="client-list">
                <ul>
                    @foreach($clients as $item)
                        <li>
                            <a href="{{ $item->link }}" target="_blank" title="{{ $item->name }}"><img
                                        src="{{ asset('/uploads/links') }}/{{ $item->logo }}"
                                        alt="{{ $item->name }}"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>