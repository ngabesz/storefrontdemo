<template>
  <div>
    <div v-for="order in orders" v-bind:key="order.id">
      <router-link :to="'/orders/details/'+order.id " ><span>{{ order.id }} - {{ order.customer.firstName }} {{order.customer.lastName}}</span></router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      orders: [],
    };
  },

    methods: {
        async getData() {
            try {
                const response = await this.$http.get(
                    "http://localhost:8090/order/api/orders"
                );

                this.orders = response.data.orders;
            } catch (error) {
                console.log(error);
            }
        },
    },

  beforeMount() {
    this.getData();
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
