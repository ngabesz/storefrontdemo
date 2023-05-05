<template>
  <div>
    <p id="links">
      <router-link to="/orders">List</router-link>
    </p>
      <table>
        <tr>
            <td>ID:</td>
            <td>{{ order.id }}</td>
        </tr>
        <tr>
            <td>Customer:</td>
            <td>{{ order.customer.firstName }} {{ order.customer.lastName }}</td>
        </tr>
        <tr>
            <td>Shipping address:</td>
            <td>{{ order.shippingAddress.country }}, {{ order.shippingAddress.zipCode }} {{ order.shippingAddress.city }}, {{ order.shippingAddress.address }}</td>
        </tr>
        <tr>
            <td>Billing address:</td>
            <td>{{ order.billingAddress.country }}, {{ order.billingAddress.zipCode }} {{ order.billingAddress.city }}, {{ order.billingAddress.address }}</td>
        </tr>
        <tr>
            <td>Shipping method:</td>
            <td>{{ order.shippingMethod.name }} {{ order.shippingMethod.code }} {{ order.shippingMethod.grossPrice }}Ft</td>
        </tr>
        <tr>
            <td>Billing method:</td>
            <td>{{ order.billingMethod.name }} {{ order.billingMethod.code }} {{ order.billingMethod.grossPrice }}Ft</td>
        </tr>

          <tr>
              <td>Products</td>
          </tr>
          <table>
              <tr v-for="product in order.products" v-bind:key="product.id">
                  <td>
                      id: {{product.id}} name: {{ product.name }}
                  </td>
              </tr>
          </table>


      </table>

  </div>
</template>

<script>
export default {
  data() {
    return {
      order: {},
    };
  },

  methods: {
    getData(id) {
      this.$http.get(
          "http://localhost:8090/order/api/orders/"+id
      )
      .then(response => {
        this.order = response.data;
      })
      .catch(e => {
        console.log(e);
      });
    },
  },

  mounted() {
    this.getData(this.$route.params.id);
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
