<template>
  <div class="panel">
    <div class="panel-heading">
      {{ tranjob }}
      <span class="panel-title">{{ tranjob.tranjob_no}}</span>
      <div>
        <router-link to="tranjob-entry" class="btn">Back</router-link>
        <router-link :to="`tranjob-entry/${tranjob.id}/edit`" class="btn">Edit</router-link>
        <button class="btn btn-error" @click="deleteItem">Delete</button>
      </div>
    </div>
    <div class="panel-body">
      <div class="document">
        <div class="row">
          <div class="col-6">
            <strong>To:</strong>
            <div>
              <span>{{ tranjob.customer_sender.name}}</span>
              <pre>{{ tranjob.customer_sender.address}}</pre>
            </div>
          </div>
          <div class="col-6 col-offset-12">
            <table class="document-summary">
              <tbody>
                <tr>
                  <td colspan="2">
                    <span class="document-title">ใบรับงานขนส่ง</span>
                  </td>
                </tr>
                <tr>
                  <td>เลขที่</td>
                  <td>{{ tranjob.tranjob_no}}</td>
                </tr>
                <tr>
                  <td>วันที่</td>
                  <td>{{ tranjob.tranjob_date}}</td>
                </tr>
                <tr>
                  <td>กำหนดวันส่งถึง</td>
                  <td>{{ tranjob.due_date}}</td>
                </tr>
                <tr v-if="tranjob.reference">
                  <td>อ้างถึง</td>
                  <td>{{ tranjob.reference}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="document-body">
          <table class="table document-table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in tranjob.tranjob_details" :key="item.id">
                <td class="w-3">{{item.product.id}}</td>
                <td class="w-12">
                  <pre>{{item.product.name}}</pre>
                </td>
                <td class="w-3">{{item.tranprice | formatMoney}}</td>
                <td class="w-2">{{item.amount}}</td>
                <td class="w-4">{{item.amount * item.tranprice | formatMoney}}</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4">Sub Total</td>
                <td>{{ tranjob.sub_total | formatMoney}}</td>
              </tr>
              <tr>
                <td colspan="4">Discount</td>
                <td>{{ tranjob.discount | formatMoney}}</td>
              </tr>
              <tr>
                <td colspan="4">Grand Total</td>
                <td>{{ tranjob.total | formatMoney}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="document-footer">
          <strong>Terms and Conditions</strong>
          <pre>{{ tranjob.terms_and_conditions}}</pre>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["tranjobId"],
  data() {
    return {
      tranjob: {
        tranjob_details: [],
        customer_sender: {}
      }
    };
  },
  watch: {
    tranjobId() {
      this.getTranjob();
    }
  },
  methods: {
    getTranjob: async function() {
      let { data: tranjob } = await Nova.request().get(
        "/nova-vendor/tranjob-entry/tranjob-entry/" + "2"
      );

      this.tranjob = tranjob;
    },

    deleteItem() {
      byMethod("delete", "/tranjob-entry/${this.tranjob.id}").then(res => {
        if (res.data.deleted) {
          this.$router.push("/tranjob-entry");
        }
      });
    }
  },
  mounted() {
    this.getTranjob();
  }
};
</script>
