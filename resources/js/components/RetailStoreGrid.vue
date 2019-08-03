<template>
  <div class="col-lg-12">
    <h1>ร้านของคุณ</h1>

    <search-box></search-box>

    <grid-count></grid-count>

    <section class="panel">
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <table-head></table-head>

          <tbody>
            <tr v-for="row in gridData">
              <td>{{ row.Id }}</td>

              <td>
                <a v-bind:href="'/retailstore/' + row.Id + '-' ">{{ row.Name }}</a>
              </td>

              <td>{{ row.Created }}</td>

              <td>
                <a v-bind:href="'/retailstore/' + row.Id + '/edit'">
                  <button type="button" class="btn btn-default">Edit</button>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <page-number></page-number>
    </section>

    <pagination></pagination>
  </div>
</template>

<script>
var gridData = require("../utilities/gridData").default;

export default {
  components: {
    "pagination": require("./Pagination").default,
    "search-box": require("./SearchBox").default,
    "grid-count": require("./GridCount").default,
    "page-number": require("./PageNumber").default,
    "table-head": require("./TableHead").default
  },

  mounted: function(){
    gridData.loadData("api/retail-store-data", this);
  },
  data: function() {
    return {
      query: "",
      gridColumns: [
        { keycolumn: "Id", header: "Id" },
        { keycolumn: "Name", header: "ชื่อ" },
        { keycolumn: "Created", header: "วันที่เพิ่ม" }
      ],
      gridData: [],
      total: null,
      next_page_url: null,
      prev_page_url: null,
      last_page: null,
      current_page: null,
      pages: [],
      first_page_url: null,
      last_page_url: null,
      go_to_page: null,
      sortOrder: 1,
      sortKey: "",
      createUrl: "/retailstore/create",
      showCreateButton: true
    };
  },

  methods: {
    sortBy: function(key) {
      this.sortKey = key;
      this.sortOrder = this.sortOrder == 1 ? -1 : 1;
      this.getData(1);
    },

    search: function(query) {
      this.getData(query);
    },

    getData: function(request) {
      gridData.getQueryData(request, "api/retail-store-data", this);
    },

    setPageNumbers: function() {
      for (var i = 1; i <= this.last_page; i++) {
        this.pages.push(i);
      }
    },

    checkPage: function(page) {
      return page == this.current_page;
    },

    resetPageNumbers: function() {
      this.pages = [];
      for (var i = 1; i <= this.last_page; i++) {
        this.pages.push(i);
      }
    },

    checkUrlNotNull: function(url) {
      return url != null;
    },

    clearPageNumberInputBox: function() {
      return (this.go_to_page = "");
    },

    pageInRange: function() {
      return this.go_to_page <= parseInt(this.last_page);
    }
  }
};
</script>