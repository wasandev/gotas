<script>
import Popper from 'popper.js'
import { directive as onClickaway } from 'vue-clickaway'

export default {
    directives: {
        onClickaway,
    },

    props: {
        trigger: {
            default: 'hover',
            validator: val => ['click', 'hover'].includes(val),
        },

        placement: {
            default: 'top',
        },

        boundary: {
            type: String,
            default: 'window',
        },
    },

    data: () => ({
        visible: false,
        popper: null,
        clickawayEvent: null,
        stopPropagation: function() {
            e => e.stopPropagation()
        },
    }),

    watch: {
        visible(showing) {
            if (showing) {
                this.$nextTick(() => {
                    if (this.popper) {
                        this.popper.destroy()
                    }

                    this.popper = new Popper(this.$el, this.$refs.content, {
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

    methods: {
        toggle() {
            this.visible = !this.visible
        },

        show() {
            this.visible = true
        },

        hide() {
            this.visible = false
        },
    },

    computed: {
        triggerListeners() {
            return {
                on: {
                    click: { click: this.toggle },
                    hover: { mouseenter: this.show, mouseleave: this.hide },
                }[this.trigger],
            }
        },
    },

    render(h) {
        return (
            <span class="select-none">
                <span {...this.triggerListeners}>{this.$slots.default}</span>

                {this.visible && (
                    <portal to="dropdowns">
                        <div
                            ref="content"
                            style="position: absolute; z-index: 99999"
                            onClick={e => e.stopPropagation()}
                            v-on-clickaway={this.hide}
                        >
                            {this.$slots.content}
                        </div>
                    </portal>
                )}
            </span>
        )
    },
}
</script>
