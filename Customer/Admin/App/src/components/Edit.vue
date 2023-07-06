<template>
  <div>
    <div v-if="errors" style="color: red">{{this.errors}}</div>
    <div v-if="success" style="color: green">{{this.success}}</div>
    <div v-else>
      <p id="links">
        <router-link to="/customers">List</router-link>
      </p>
      <p>
        <FormulateForm
            :values="formValues"
            @submit="submitHandler"
        >
          <FormulateInput
              type="text"
              name="firstname"
              label="First name"
              v-model="formValues.firstname"
          />
          <FormulateInput
              type="text"
              name="lastname"
              label="Last name"
              v-model="formValues.lastname"
          />
          <FormulateInput
              type="email"
              name="email"
              label="Email"
              v-model="formValues.email"
          />
          <FormulateInput
              type="submit"
              label="Save"
          />
        </FormulateForm>
      </p>
    </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      formValues:{
        id: '',
        firstname:'',
        lastname:'',
        email:'',
      },
      errors: null,
      success: null
    };
  },

  methods: {
    getData(id) {
      this.$http.get(
          "http://localhost:8090/customer/api/customers/"+id
      ).then(response => {
            this.formValues = response.data;
          }).catch(e => {
            console.log(e);
          });
    },
    async submitHandler (data) {
      await this.$http.post(
          "http://localhost:8090/customer/api/customers/" + this.formValues.id , {
            firstname: data.firstname,
            lastname: data.lastname,
            email: data.email,
          }
      ).then((response) => {
        this.success = response.data.message;
      }).catch( (error) => {
        if (error.response && error.response.status === 403) {
          this.errors = "Access Denied"
        } else {
          this.errors = error.message
        }

      });
    }
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