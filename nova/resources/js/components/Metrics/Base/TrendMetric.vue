<template>
    <loading-card :loading="loading" class="px-6 py-4">
        <div class="flex mb-4">
            <h3 class="mr-3 text-base text-80 font-bold">{{ title }}</h3>

            <select
                v-if="ranges.length > 0"
                @change="handleChange"
                class="select-box-sm ml-auto min-w-24 h-6 text-xs appearance-none bg-40 pl-2 pr-6 active:outline-none active:shadow-outline focus:outline-none focus:shadow-outline"
            >
                <option
                    v-for="option in ranges"
                    :key="option.value"
                    :value="option.value"
                    :selected="selectedRangeKey == option.value"
                >
                    {{ option.label }}
                </option>
            </select>
        </div>

        <p class="flex items-center text-4xl mb-4">
            {{ formattedValue }}
            <span v-if="suffix" class="ml-2 text-sm font-bold text-80">{{ formattedSuffix }}</span>
        </p>

        <div ref="chart" class="absolute pin rounded-b-lg ct-chart" style="top: 60%" />
    </loading-card>
</template>

<script>
import numbro from 'numbro'
import numbroLanguages from 'numbro/dist/languages.min'
Object.values(numbroLanguages).forEach(l => numbro.registerLanguage(l))
import _ from 'lodash'
import Chartist from 'chartist'
import 'chartist-plugin-tooltips'
import 'chartist/dist/chartist.min.css'
import { SingularOrPlural } from 'laravel-nova'
import 'chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css'

// const getLabelForValue = (value, vm) => {
//     const { labels, series } = vm.chartData

//     return labels[_.findIndex(series[0], (item) => {
//         return item.value == value;
//     })]
// }

export default {
    name: 'BaseTrendMetric',

    props: {
        loading: Boolean,
        title: {},
        value: {},
        chartData: {},
        prefix: '',
        suffix: '',
        suffixInflection: true,
        ranges: { type: Array, default: () => [] },
        selectedRangeKey: [String, Number],
        format: {
            type: String,
            default: '0[.]00a',
        },
    },

    data: () => ({ chartist: null }),

    watch: {
        selectedRangeKey: function(newRange, oldRange) {
            this.renderChart()
        },

        chartData: function(newData, oldData) {
            this.renderChart()
        },
    },

    mounted() {
        if (Nova.config.locale) {
            numbro.setLanguage(Nova.config.locale.replace('_', '-'))
        }

        const low = Math.min(...this.chartData)
        const high = Math.max(...this.chartData)

        this.chartist = new Chartist.Line(this.$refs.chart, this.chartData, {
            lineSmooth: Chartist.Interpolation.none(),
            fullWidth: true,
            showPoint: true,
            showLine: true,
            showArea: true,
            chartPadding: {
                top: 10,
                right: 0,
                bottom: 0,
                left: 0,
            },
            low: low,
            high: high,
            areaBase: low,
            axisX: {
                showGrid: false,
                showLabel: true,
                offset: 0,
            },
            axisY: {
                showGrid: false,
                showLabel: true,
                offset: 0,
            },
            plugins: [
                Chartist.plugins.tooltip({
                    anchorToPoint: true,
                    transformTooltipTextFnc: value => {
                        if (this.prefix) {
                            return `${this.prefix}${value}`
                        }

                        if (this.suffix) {
                            const suffix = SingularOrPlural(value, this.suffix)

                            return `${value} ${suffix}`
                        }

                        return `${value}`
                    },
                }),
            ],
        })
    },

    methods: {
        renderChart() {
            this.chartist.update(this.chartData)
        },

        handleChange(event) {
            this.$emit('selected', event.target.value)
        },
    },

    computed: {
        isNullValue() {
            return this.value == null
        },

        formattedValue() {
            if (!this.isNullValue) {
                const value = numbro(new String(this.value)).format(this.format)

                return `${this.prefix}${value}`
            }

            return ''
        },

        formattedSuffix() {
            if (this.suffixInflection === false) {
                return this.suffix
            }

            return SingularOrPlural(this.value, this.suffix)
        },
    },
}
</script>
