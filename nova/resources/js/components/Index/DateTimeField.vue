<template>
    <div :class="`text-${field.textAlign}`">
        <span class="whitespace-no-wrap">{{ localizedDateTime }}</span>
    </div>
</template>

<script>
import { InteractsWithDates } from 'laravel-nova'

export default {
    mixins: [InteractsWithDates],

    props: ['resourceName', 'field'],

    computed: {
        /**
         * Get the localized date time.
         */
        localizedDateTime() {
            return this.localizeDateTimeField(this.field)
        },
    },
}
</script>
