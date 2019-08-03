<template>

    <thead>
    <tr>
        <th v-for="key in $parent.gridColumns" 
        
            @click="$parent.sortBy(key.keycolumn)"
            v-bind:class="{active: $parent.sortKey == key}">
            
            {{ key.header }}

            <span class="arrow"
                  v-bind:class="$parent.sortOrder > 0 ? 'asc' : 'dsc'">
            </span>

        </th>

        <th>Actions</th>

    </tr>
    </thead>

</template>