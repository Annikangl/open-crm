<template>
  <div>
    <Navbar />
    <Sidenav v-model="isOpen" />

  </div>
</template>

<script>
import M from "materialize-css";
import Navbar from "../components/app/AdminNavbar";
import Sidenav from "../components/app/Sidenav";

export default {
  components: {
    Navbar,
    Sidenav,
  },

  data: () => ({
    isOpen: true
  }),
};
</script>

<style>
@import "/assets/css/index.css";
</style>