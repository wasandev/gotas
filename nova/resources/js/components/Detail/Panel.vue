<template>
    <div>
        <slot>
            <heading :level="1" class="mb-3">{{ panel.name }}</heading>
        </slot>

        <card class="mb-6 py-3 px-6">
            <component
                :class="{ 'remove-bottom-border': index == panel.fields.length - 1 }"
                :key="index"
                v-for="(field, index) in panel.fields"
                :is="resolveComponentName(field)"
                :resource-name="resourceName"
                :resource-id="resourceId"
                :resource="resource"
                :field="field"
                @actionExecuted="actionExecuted"
            />
        </card>
    </div>
</template>

<script>
import { BehavesAsPanel } from 'laravel-nova'

export default {
    mixins: [BehavesAsPanel],

    methods: {
        /**
         * Resolve the component name.
         */
        resolveComponentName(field) {
            return field.prefixComponent ? 'detail-' + field.component : field.component
        },
    },
}
</script>
