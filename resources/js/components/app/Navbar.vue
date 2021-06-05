<template>
  <nav class="navbar blue darken-1">
    <div class="container">
 <div class="nav-wrapper">
      <a href="#!" class="#">Министерство юстиции</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#"><i class="material-icons">email</i></a></li>
        <li><a href="#"><i class="material-icons">info</i></a></li>
        <li><a href="/login"><i class="material-icons">account_circle</i></a></li>
      </ul>
    </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: {
    userInfo: {
      type: Object
    }
  },
  
  data: () => ({
    date: new Date(),
    interval: null,
    dropdown: null,
  }),
  methods: {
    logout() {
      console.log("Logout");
      this.$router.push("/login?message=logout");
    },
  },
  mounted() {
    this.interval = setInterval(() => {
      this.date = new Date();
    }, 1000);
    this.dropdown = M.Dropdown.init(this.$refs.dropdown, {
      constrainWidth: false,
    });
  },
  beforeDestroy() {
    clearInterval(this.interval);
    if (this.dropdown && this.dropdown.destroy) {
      this.dropdown.destroy();
    }
  },
};
</script>
