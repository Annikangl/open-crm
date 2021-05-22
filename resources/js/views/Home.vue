<template>
  <div class="app">
    <Navbar />

    <div class="app-content">
        <h3 class="text">Эта страница предназначена для отправки формы</h3>
    </div>
  </div>
</template>

<script>
import Navbar from "../components/app/Navbar";
export default {
  name: "Home",
  components: {
    Navbar,
  },
};
</script>