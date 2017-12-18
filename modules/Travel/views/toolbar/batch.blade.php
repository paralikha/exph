{{-- Batch Commands --}}
<v-btn
    v-show="dataset.selected.length < 2"
    flat
    icon
    v-model="dataset.bulk.destroy.model"
    :class="dataset.bulk.destroy.model ? 'btn--active error error--text' : ''"
    v-tooltip:left="{'html': '{{ __('Toggle the bulk command checboxes') }}'}"
    @click.native="dataset.bulk.destroy.model = !dataset.bulk.destroy.model"
><v-icon>@{{ dataset.bulk.destroy.model ? 'indeterminate_check_box' : 'check_box_outline_blank' }}</v-icon></v-btn>
{{-- Bulk Delete --}}
<v-slide-y-transition>
    <template v-if="dataset.selected.length > 1">
        <form action="{{ route('stories.many.destroy') }}" method="POST" class="inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <template v-for="item in dataset.selected">
                <input type="hidden" name="stories[]" :value="item.id">
            </template>
            <v-btn
                flat
                icon
                type="submit"
                v-tooltip:left="{'html': `Move ${dataset.selected.length} selected items to Trash`}"
            ><v-icon error>delete_sweep</v-icon></v-btn>
        </form>
    </template>
</v-slide-y-transition>
{{-- /Bulk Delete --}}
{{-- /Batch Commands --}}

{{-- Search --}}
<v-text-field
    append-icon="search"
    label="{{ _('Search') }}"
    single-line
    hide-details
    v-if="dataset.searchform.model"
    v-model="dataset.searchform.query"
    light
></v-text-field>
<v-btn v-tooltip:left="{'html': dataset.searchform.model ? 'Clear' : 'Search resources'}" icon flat light @click.native="dataset.searchform.model = !dataset.searchform.model; dataset.searchform.query = '';">
    <v-icon>@{{ !dataset.searchform.model ? 'search' : 'clear' }}</v-icon>
</v-btn>
{{-- /Search --}}

{{-- Trashed --}}
@if (isset($trashed))
    <v-btn
        icon
        flat
        href="{{ route('stories.trash') }}"
        light
        v-tooltip:left="{'html': `View trashed items`}"
    ><v-icon class="grey--after" v-badge:{{ $trashed }}.overlap>archive</v-icon></v-btn>
@endif
{{-- /Trashed --}}
