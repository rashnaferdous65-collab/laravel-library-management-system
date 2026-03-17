@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
    $widthClasses = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ];

    $modalWidth = $widthClasses[$maxWidth] ?? $widthClasses['2xl'];
@endphp

<div
    x-data="modalHandler(@js($show))"
    x-init="init()"
    x-on:open-modal.window="handleOpen($event, '{{ $name }}')"
    x-on:close-modal.window="handleClose($event, '{{ $name }}')"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="handleTab($event)"
    x-show="show"
    class="fixed inset-0 z-50 px-4 py-6 overflow-y-auto sm:px-0"
    style="display: {{ $show ? 'block' : 'none' }}"
>
    <!-- Overlay -->
    <div
        x-show="show"
        class="fixed inset-0 transition-all"
        x-on:click="show = false"
        x-transition.opacity
    >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- Modal Content -->
    <div
        x-show="show"
        class="mb-6 bg-white rounded-lg shadow-xl overflow-hidden transform transition-all sm:w-full sm:mx-auto {{ $modalWidth }}"
        x-transition
    >
        {{ $slot }}
    </div>
</div>

{{-- Alpine Helper --}}
<script>
    function modalHandler(initialState) {
        return {
            show: initialState,

            init() {
                this.$watch('show', value => {
                    document.body.classList.toggle('overflow-y-hidden', value);

                    if (value) {
                        setTimeout(() => this.firstFocusable()?.focus(), 100);
                    }
                });
            },

            focusables() {
                let selector = 'a, button, input:not([type="hidden"]), textarea, select, details, [tabindex]:not([tabindex="-1"])';

                return [...this.$el.querySelectorAll(selector)]
                    .filter(el => !el.hasAttribute('disabled'));
            },

            firstFocusable() {
                return this.focusables()[0];
            },

            lastFocusable() {
                return this.focusables().slice(-1)[0];
            },

            nextFocusable() {
                let index = this.focusables().indexOf(document.activeElement);
                return this.focusables()[index + 1] || this.firstFocusable();
            },

            prevFocusable() {
                let index = this.focusables().indexOf(document.activeElement);
                return this.focusables()[index - 1] || this.lastFocusable();
            },

            handleTab(e) {
                if (e.shiftKey) {
                    this.prevFocusable()?.focus();
                } else {
                    this.nextFocusable()?.focus();
                }
            },

            handleOpen(event, name) {
                if (event.detail === name) this.show = true;
            },

            handleClose(event, name) {
                if (event.detail === name) this.show = false;
            }
        }
    }
</script>
