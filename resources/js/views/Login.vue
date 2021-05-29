<template>
 <body>
  <div class="section"></div>
  <main>
    <center>

      <h5 class="black-text">Панель администратора</h5>
      <div class="section"></div>

      <div class="container">
        <div
          class="z-depth-1 white row"
          style="
            display: inline-block;
            padding: 32px 48px 0px 48px;
            border: 1px solid #eee;
          "
        >
          <form class="col s12" @submit.prevent="submitHandler">
            <div class="row">
              <div class="col s12"></div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input class="validate" type="email" name="email" id="email" />
                <label for="email">Логин</label>
              </div>
              <small
                class="helper-text invalid"
                v-if="$v.email.$dirty && !$v.email.required"
                >Поле Email не должно быть пустым</small
              >
              <small
                class="helper-text invalid"
                v-else-if="$v.email.$dirty && !$v.email.email"
                >Введите корретный Email</small
              >
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input
                  class="validate"
                  type="password"
                  name="password"
                  id="password"
                />
                <label for="password">Пароль</label>
                <small
                  class="helper-text invalid"
                  v-if="$v.password.$dirty && !$v.password.required"
                >
                  Введите пароль
                </small>
              </div>
              <label style="float: right">
                <a class="pink-text" href="#!"><b>Забыли пароль?</b></a>
              </label>
            </div>

            <br />
            <center>
              <div class="row">
                <button
                  type="submit"
                  name="btn_login"
                  class="col s12 btn waves-effect blue darken-1"
                >
                  Войти
                </button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
 </body>
</template>

<script>
import { email, required, minLength } from "vuelidate/lib/validators";

export default {
  name: "login",
  data: () => ({
    email: "",
    password: "",
  }),
  validations: {
    email: { email, required },
    password: { required, minLength: minLength(6) },
  },
  methods: {
    submitHandler() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return;
      }
      const formData = {
        email: this.email,
        password: this.password,
      };

      console.log(formData);
      this.$router.push("/");
    },
  },
};
</script>

<style>
body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}

.section {
    margin-bottom: 100px;
}
main {
  flex: 1 0 auto;
}

body {
  background: #fff;
}

.input-field input[type="date"]:focus + label,
.input-field input[type="text"]:focus + label,
.input-field input[type="email"]:focus + label,
.input-field input[type="password"]:focus + label {
  color: #e91e63;
}

.input-field input[type="date"]:focus,
.input-field input[type="text"]:focus,
.input-field input[type="email"]:focus,
.input-field input[type="password"]:focus {
  border-bottom: 2px solid #e91e63;
  box-shadow: none;
}
</style>