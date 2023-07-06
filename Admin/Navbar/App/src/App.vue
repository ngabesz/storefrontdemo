<template>
  <div>
    <nav class="navbar-links">
      <div>
        <ul>
          <li>
            <router-link
                to="/"
                class="nav-link"
                active-class="active-nav-link"
            >Home</router-link
            >
          </li>
          <li>
            <router-link
                to="/customers"
                class="nav-link"
                active-class="active-nav-link"
            >Customers</router-link>
          </li>
          <li>
            <router-link
                to="/subscribers"
                class="nav-link"
                active-class="active-nav-link"
            >Subscribers</router-link>
          </li>
          <li>
            <router-link
                to="/orders"
                class="nav-link"
                active-class="active-nav-link"
            >Orders</router-link>
          </li>
          <li>
            <a href="#" class="nav-link"  @click="Logout"> Logout </a>
          </li>
        </ul>
      </div>
    </nav>
    <router-view />
  </div>
</template>

<script>
import { logout } from "admin-shared";
export default {
  props: {

  },
  methods: {
    Logout: function() {
      logout()
    }
  },
  watch: {
    '$route' (to, from) {
      console.log('Route changed from ' + from.path + ' to ' + to.path);
    }
  }
};
</script>

