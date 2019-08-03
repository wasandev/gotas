var dataHelper = {

    getQueryData(request, url, vm) {

        let getPage;

        switch (request) {

            case vm.prev_page_url:

                getPage = vm.prev_page_url +
                    '&column=' + vm.sortKey +
                    '&direction=' + vm.sortOrder;

                break;

            case vm.next_page_url:

                getPage = vm.next_page_url +
                    '&column=' + vm.sortKey +
                    '&direction=' + vm.sortOrder;

                break;

            case vm.first_page_url:

                getPage = vm.first_page_url +
                    '&column=' + vm.sortKey +
                    '&direction=' + vm.sortOrder;

                break;

            case vm.last_page_url:

                getPage = vm.last_page_url +
                    '&column=' + vm.sortKey +
                    '&direction=' + vm.sortOrder;

                break;

            case vm.query:

                getPage = url + '?' +
                    'keyword=' + vm.query +
                    '&column=' + vm.sortKey +
                    '&direction=' + vm.sortOrder;

                break;

            case vm.go_to_page:

                if (vm.go_to_page != '' && vm.pageInRange()) {

                    getPage = url + '?' +
                        'page=' + vm.go_to_page +
                        '&column=' + vm.sortKey +
                        '&direction=' + vm.sortOrder +
                        '&keyword=' + vm.query;
                    vm.clearPageNumberInputBox();

                } else {

                    alert('Please enter a valid page number');

                }

                break;

            default:

                getPage = url + '?' +
                    'page=' + request +
                    '&column=' + vm.sortKey +
                    '&direction=' + vm.sortOrder +
                    '&keyword=' + vm.query;

                break;

        }

        if (vm.query == '' && getPage != null) {

            $.getJSON(getPage, function (data) {

                vm.gridData = data.data;
                vm.total = data.total;
                vm.last_page = data.last_page;
                vm.next_page_url = data.next_page_url;
                vm.prev_page_url = data.prev_page_url;
                vm.current_page = data.current_page;

            }.bind(vm));

        } else {

            if (getPage != null) {

                $.getJSON(getPage, function (data) {

                    vm.gridData = data.data;
                    vm.total = data.total;
                    vm.last_page = data.last_page;
                    vm.next_page_url = (data.next_page_url == null) ? null : data.next_page_url + '&keyword=' + vm.query;
                    vm.prev_page_url = (data.prev_page_url == null) ? null : data.prev_page_url + '&keyword=' + vm.query;
                    vm.first_page_url = url + '?page=1&keyword=' + vm.query;
                    vm.last_page_url = url + '?page=' + vm.last_page + '&keyword=' + vm.query;
                    vm.current_page = data.current_page;
                    vm.resetPageNumbers();

                }.bind(vm));

            }
        }
    },

    loadData(url, vm) {


        $.getJSON(url, function (data) {

            vm.gridData = data.data;
            vm.total = data.total;
            vm.last_page = data.last_page;
            vm.next_page_url = data.next_page_url;
            vm.prev_page_url = data.prev_page_url;
            vm.current_page = data.current_page;
            vm.first_page_url = url + '?page=1';
            vm.last_page_url = url + '?page=' + vm.last_page;
            vm.setPageNumbers();

        }.bind(vm));

    }

};


export default dataHelper;