<template>
    <button
        type="button"
        @click="toggle"
        class="rounded active:outline-none active:shadow-outline focus:outline-none focus:shadow-outline"
    >
        <slot />

        <portal v-if="visible" to="dropdowns">
            <div>
                <div
                    style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; z-index: 99998;"
                    @click="toggle"
                />

                <div
                    ref="menu"
                    style="position: absolute; z-index: 99999"
                    @click.stop
                >
                    <slot name="menu" />
                </div>
            </div>
        </portal>
    </button>
</template>

<script>
import Popper from 'popper.js'

export default {
    props: {
        placement: {
            type: String,
            default: 'bottom-end',
        },

        boundary: {
            type: String,
            default: 'viewPort',
        },
    },

    data: () => ({ visible: false, popper: null }),

    watch: {
        visible(showing) {
            if (showing) {
                this.$nextTick(() => {
                    if (this.popper) {
                        this.popper.destroy()
                    }

                    this.popper = new Popper(this.$el, this.$refs.menu, {
                        placement: this.placement,
                        modifiers: {
                            preventOverflow: {
                                boundariesElement: this.boundary,
                            },
                            offset: '10',
                        },
                    })
                })
            }
        },
    },

    mounted() {
        document.addEventListener('keydown', e => {
            if (e.keyCode === 27) {
                this.close()
            }
        })

        Nova.$on('close-dropdowns', () => {
            this.close()
        })
    },

    destroyed() {
        Nova.$off('close-dropdowns')
    },

    methods: {
        /**
         * Toggle the visible state of the dropdown.
         */
        toggle() {
            this.visible = !this.visible
        },

        /**
         * Close the dropdown menu.
         */
        close(event) {
            this.visible = false
        },
    },
}
</script>
