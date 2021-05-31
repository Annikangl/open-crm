<template>
  <div>
    <Navbar />
    <Sidenav v-model="isOpen" />

    <section class="main">
      <div class="container">
        <h5 class="title">Главная страница админки</h5>
      </div>
    </section>
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

.main {
  margin-top: 100px;
}
</style>