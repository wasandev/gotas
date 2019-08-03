<template>
    <div class="row">
        <div class="pull-center" v-show="$parent.pages.length > 1">

            <div class="grid-results">

                หน้า {{ $parent.current_page }} / {{ $parent.last_page }}

            </div>

        </div>
    </div>


</template>