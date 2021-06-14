<template>
  <nav class="navbar white">
    <div class="container">
 <div class="nav-wrapper ">
      <a href="/" class="brand-logo text-dark"><img src="/assets/img/logo.jpg" class="nav-logo" alt="logo" width="50" height="50">
        <span>Министерства юстиции</span>
      </a>
      <ul class="right hide-on-med-and-down">
        <li class="active"><a href="#" class="">Главная</a></li>
        <li><a href="#">Контакты</a></li>
        <!-- <li><a href="#"><i class="material-icons">info</i></a></li>
        <li><a href="/login"><i class="material-icons">account_circle</i></a></li> -->
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

<style lang="css" scoped>
.nav-logo {
  margin-top: 7px;
  margin-right: 5px;
}

.brand-logo {
  display: flex;
}

.brand-logo span {
  color: #000;
  font-size: 16px;
}

nav ul a {
  color: #2a2a2a;
  font-weight: 600;
}
</style>
