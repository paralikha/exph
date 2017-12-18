{{-- <v-pagination circle length="{{ $resources->total() }}" :value="{{ $resources->currentPage() }}" :total-visible="8" class="caption main-paginate"></v-pagination> --}}

@if ($resources->lastPage() > 1)
    <div class="text-xs-center">
        <ul class="caption main-paginate pagination pagination--circle">
            <li>
                <a href="{{ $resources->url(1) }}" class="pagination__navigation" :class="{'pagination__navigation--disabled': '{{ ($resources->currentPage() == 1) }}'}">
                    <i class="material-icons icon">chevron_left</i>
                </a>
            </li>
            @for ($i = 1; $i <= $resources->lastPage(); $i++)
            <li>
                <a href="{{ $resources->url($i) }}" class="pagination__item" :class="{'pagination__item--active': '{{ ($resources->currentPage() == $i) }}'}">{{ __($i) }}</a>
            </li>
            @endfor
            <li>
                <a href="{{ $resources->url($resources->lastPage()) }}" class="pagination__navigation" :class="{'pagination__navigation--disabled':'{{ ($resources->currentPage() == $resources->lastPage()) }}'}">
                    <i class="material-icons icon">chevron_right</i>
                </a>
            </li>
        </ul>
    </div>
@endif
