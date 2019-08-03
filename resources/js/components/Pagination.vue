<template>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">   
                <div class="col-xs-8" >
                    <div class="pull-left" v-show="$parent.pages.length > 1">
                                
                        <ul class="pagination">
                            <li><a @click.prevent="$parent.getData($parent.first_page_url)"> << </a></li>
                            <li v-if="$parent.checkUrlNotNull($parent.prev_page_url)">
                                <a @click.prevent="$parent.getData($parent.prev_page_url)" > < </a>
                            </li>
                            <li v-for="page in $parent.pages"
                                v-if="page > $parent.current_page - 2 && page < $parent.current_page + 2"
                                v-bind:class="{'active': $parent.checkPage(page)}">
                                <a @click.prevent="$parent.getData(page)">{{ page }}</a>
                            </li>
                            <li v-if="$parent.checkUrlNotNull($parent.next_page_url)">
                                <a @click.prevent="$parent.getData($parent.next_page_url)"> > </a>
                            </li>
                            <li><a @click.prevent="$parent.getData($parent.last_page_url)"> >> </a></li>
                        </ul>
                    </div>
                </div> 
                <div class="col-xs-4">
                    <div class="grid-results pull-right" v-show="$parent.pages.length > 1">
                        {{ $parent.current_page }}/{{ $parent.last_page }}
                    </div>   
                </div>        
            </div>                 
            
            <div class="pull-left" v-show="$parent.showCreateButton"> 
                <a v-bind:href="$parent.createUrl">
                    <button type="button" class="btn btn-primary grid-results">
                            เพิ่มข้อมูล
                    </button>
                </a>
            </div>
                    
                   
        </div>
    </div>
</template>

