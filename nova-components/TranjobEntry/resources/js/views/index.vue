<template>
  <div>
    <div class="flex items-center mb-6">
      <heading class="flex">{{ __('Tranjob') }}</heading>
      <div class="flex w-full justify-end">
        <router-link
          class="cursor-pointer btn btn-default btn-primary"
          :to="{ name: 'tranjob-entry.create'}"
          :title="__('Add language')"
        >{{ __('Add Job') }}</router-link>
      </div>
    </div>
    <loading-view :loading="initialLoading">
      <loading-card :loading="loading" class="card">
        <table
          v-if="Object.keys(tranjobs).length > 0"
          class="table w-full"
          cellpadding="0"
          cellspacing="0"
          data-testid="resource-table"
        >
          <thead>
            <tr>
              <th class="text-left">{{ __('ID') }}</th>
              <th class="text-left">{{ __('Tranjob_no') }}</th>
              <th class="text-left">{{ __('Tranjob_date') }}</th>
              <th class="text-left">{{ __('จากสาขา') }}</th>
              <th class="text-left">{{ __('ผู้ส่ง') }}</th>
              <th class="text-left">{{ __('ไปสาขา') }}</th>
              <th class="text-left">{{ __('ผู้รับ') }}</th>

              <th>&nbsp;</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="item in tranjobs.results.data">
              <td>{{ item.id }}</td>
              <td>{{ item.tranjob_no }}</td>
              <td>{{ item.tranjob_date }}</td>
              <td>{{ item.branch_send.name }}</td>
              <td>{{ item.customer_sender.name }}</td>
              <td>{{ item.branch_rec.name }}</td>
              <td>{{ item.customer_reciever.name }}</td>

              <td>
                <router-link
                  class="cursor-pointer text-70 hover:text-primary"
                  :to="{name: 'tranjob-entry.show',
                        title: __('View Job'),
                        params: {
                            tranjobId: item.id
                        }}"
                >
                  <icon type="view" width="22" height="18" view-box="0 0 22 16" />
                </router-link>
              </td>
            </tr>
          </tbody>
        </table>
      </loading-card>
    </loading-view>
  </div>
</template>

<script>
export default {
  props: [],
  data() {
    return {
      initialLoading: true,
      loading: false,
      tranjobs: {}
    };
  },

  methods: {
    listTranjobs() {
      Nova.request()
        .get("/nova-vendor/tranjob-entry/tranjob-entry")
        .then(response => {
          this.tranjobs = response.data;
          this.initialLoading = false;
          this.loading = false;
        });
    }
  },

  created() {
    this.listTranjobs();
  }
};
</script>
